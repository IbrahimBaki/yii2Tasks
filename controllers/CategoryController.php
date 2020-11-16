<?php


namespace app\controllers;

use app\models\Category;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

class CategoryController extends Controller
{
    public function actionIndex()
    {
        $categories = Category::find()->all();
        return $this->render('index', [
            'categories'=>$categories,
        ]);

    }

    public function actionCreate()
    {

        $category = new Category();
        if ($category->load(Yii::$app->request->post())) {
            $category->image = UploadedFile::getInstance($category,'image');
            if ($category->save()) {
                $category->image->saveAs('uploads/' . $category->image->baseName . '.' . $category->image->extension);
                Yii::$app->getSession()->setFlash('message', 'Category Created Successfully');
                return $this->redirect(['index']);
            } else {
                Yii::$app->getSession()->setFlash('message', 'Failed to create Category');
            }
        } else {
            return $this->render('create', [
                'model' => $category,

            ]);
        }


    }

    public function actionUpdate($id)
    {
        $category = Category::findOne($id);

        if ($category->load(Yii::$app->request->post())) {
            $category->image = UploadedFile::getInstance($category,'image');
            if ($category->save()) {
                $category->image->saveAs('uploads/' . $category->image->baseName . '.' . $category->image->extension);
                Yii::$app->getSession()->setFlash('message', 'Category Created Successfully');
                return $this->redirect(['index']);
            } else {
                Yii::$app->getSession()->setFlash('message', 'Failed to create Category');
            }
        } else {
            return $this->render('update', [
                'model' => $category,

            ]);
        }


    }

    public function actionDelete($id)
    {
        $category = Category::findOne($id);
        if($category === null)
            throw new NotFoundHttpException('Category Not Exists');
        $filepath='uploads/'. $category->image;
        unlink($filepath);
        $category->delete();
        return $this->redirect(['index']);


    }

}