<?php


namespace app\controllers;


use app\models\Category;
use app\models\Product;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

class ProductController extends Controller
{


    public function actionIndex()
    {
        $products = Product::find()->all();
        return $this->render('index',[
            'products'=>$products
        ]);
    }
    public function actionCreate()
    {
        $categories = Category::find()->all();
        $product = new Product();
        if($product->load(Yii::$app->request->post())){
            $product->image = UploadedFile::getInstance($product,'image');
            if($product->save()){
                $product->image->saveAs('uploads/' . $product->image->baseName . '.' . $product->image->extension);
                Yii::$app->getSession()->setFlash('message', 'Product Saved Successfully');
                return $this->redirect(['index']);
            }else {
                Yii ::$app -> getSession() -> setFlash('message', 'Failed to save Product');
            }
        }else{
            return $this->render('create', [
                'model' => $product,
                'categories'=> $categories

            ]);
        }

    }
    public function actionUpdate($id)
    {
        $product = Product::findOne($id);

        if ($product->load(Yii::$app->request->post())) {
            $product->image = UploadedFile::getInstance($product,'image');
            if ($product->save()) {
                $product->image->saveAs('uploads/' . $product->image->baseName . '.' . $product->image->extension);
                Yii::$app->getSession()->setFlash('message', 'Product Updated Successfully');
                return $this->redirect(['index']);
            } else {
                Yii::$app->getSession()->setFlash('message', 'Failed to Update Product');
            }
        } else {
            return $this->render('update', [
                'model' => $product,

            ]);
        }

    }
    public function actionDelete($id)
    {
        $product = Product::findOne($id);
        if($product === null)
            throw new NotFoundHttpException('Category Not Exists');
        $filepath='uploads/'. $product->image;
        unlink($filepath);
        $product->delete();
        return $this->redirect(['index']);

    }

}