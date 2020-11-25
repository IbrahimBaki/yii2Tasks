<?php

namespace app\controllers;

use app\models\Category;
use app\models\ProductColor;
use Yii;
use app\models\Product;
use app\models\ProductSearch;
use yii\base\Model;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Product model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $categories = Category::find()->all();
        $catList = ArrayHelper::map($categories,'id','title');
        $model = new Product();
        $prdColor = new ProductColor();
        $productColor = new ProductColor();
        if ($model->load(Yii::$app->request->post()) && $prdColor->load(Yii::$app->request->post())) {
            $model -> image = UploadedFile ::getInstance($model, 'image');
            if ($model -> save()) {
                $model -> upload();
            }

            foreach ($prdColor -> schedule as $index1 => $values) {
                $prdColor -> product_id = $model -> id;
                $prdColor -> color = $values['color'];
                $prdColor -> price = $values['price'];
                $prdColor->schedule = \yii\helpers\Json::encode($values);
                $prdColor -> save();
                $prdColor= new ProductColor();

            }
            return $this -> redirect(['view', 'id' => $model -> id]);
        }
        return $this->render('create', [
            'model' => $model,
            'catList' => $catList,
            'prdColor' => $prdColor,
        ]);
    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $categories = Category::find()->all();
        $catList = ArrayHelper::map($categories,'id','title');
//        $prdColor = new ProductColor();
        $prdColor = ProductColor::find()->indexBy('id')->all();
        if ($model->load(Yii::$app->request->post())){
            $model->image = UploadedFile::getInstance($model , 'image');
            if($model->save()){
                $model->upload();
            }

            if(Model::loadMultiple($prdColor,Yii::$app->request->post()) && Model::validateMultiple($prdColor)){

                foreach ($prdColor as  $values) {
                    $prdColor -> product_id = $model -> id;
                    $prdColor -> color = $values['color'];
                    $prdColor -> price = $values['price'];
                    $prdColor -> save(false);
                    $prdColor= new ProductColor();
                }
            }


            return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('update', [
            'model' => $model,
            'catList' => $catList,
            'prdColor' => $prdColor,
        ]);
    }

    /**
     * Deletes an existing Product model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
