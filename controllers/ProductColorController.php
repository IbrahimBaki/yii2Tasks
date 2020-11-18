<?php

namespace app\controllers;


    use app\models\Category;
    use app\models\Product;
    use app\models\ProductColor;
    use Yii;
    use yii\data\ActiveDataProvider;
    use yii\grid\GridView;
    use yii\web\Controller;
    use yii\web\NotFoundHttpException;
    use yii\web\UploadedFile;
    use yii\widgets\DetailView;
    use yii\widgets\ListView;

    class ProductColorController extends Controller
{


    public function actionIndex()
    {
        $colors = ProductColor ::find() -> all();
        return $this -> render('index', [
            'colors' => $colors
        ]);
    }

    public function actionCreate()
    {
        $products = Product::find() -> all();
        $color = new ProductColor();
        if ($color -> load(Yii::$app -> request -> post())) {
            if ($color -> save()) {
                Yii::$app -> getSession() -> setFlash('message', 'Product options Saved Successfully');
                return $this -> redirect(['index']);
            } else {
                Yii::$app -> getSession() -> setFlash('message', 'Failed to save options');
            }
        } else {
            return $this -> render('create', [
                'model' => $color,
                'products' => $products

            ]);
        }

    }

    public function actionUpdate($id)
    {
        $color = ProductColor ::findOne($id);
        if ($color -> load(Yii::$app -> request -> post())) {
            if ($color -> save()) {
                Yii::$app -> getSession() -> setFlash('message', 'color Updated Successfully');
                return $this -> redirect(['index']);
            } else {
                Yii::$app -> getSession() -> setFlash('message', 'Failed to Update color');
            }
        } else {
            return $this -> render('update', [
                'model' => $color,

            ]);
        }

    }

    public function actionDelete($id)
    {
        $color = ProductColor ::findOne($id);
        if ($color === null)
            throw new NotFoundHttpException('Category Not Exists');
        $color -> delete();
        return $this -> redirect(['index']);

    }

}

