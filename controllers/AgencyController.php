<?php

namespace app\controllers;

use Yii;
use yii\base\Controller;
use app\models\Agency;
use yii\web\NotFoundHttpException;

class AgencyController extends Controller
{
  public $layout = "main";

  public function actionIndex()
  {
    $models = Agency::find()->all();

    return $this->render("index", [
      "models" => $models
    ]);
  }

  public function actionView()
  {
    $id = Yii::$app->request->get("id");
    $model = Agency::findOne($id);

    if (!$model) {
      throw new NotFoundHttpException("Agency not found.");
    }

    return $this->render("view", [
      "model" => $model
    ]);
  }
}
