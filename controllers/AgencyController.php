<?php

namespace app\controllers;

use Yii;
use yii\base\Controller;
use app\models\Agency;
use yii\web\BadRequestHttpException;
use yii\web\NotFoundHttpException;
use yii\web\Response;

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

  public function actionAdd()
  {
    if ($this->request->isAjax) {
      $this->response->format = Response::FORMAT_JSON;
      $model = new Agency();
      if ($model->load($this->request->post()) && $model->save()) {
        return [
          "success" => true,
          "id" => $model->id
        ];
      }

      return ["success" => false];
    }
  }

  public function actionDelete()
  {
    if ($this->request->isAjax) {
      $this->response->format = Response::FORMAT_JSON;
      $model = Agency::findOne($this->request->post("id"));

      if (!$model) {
        return ["success" => false, "message" => "Agency not found"];
      }

      if ($model->delete()) {
        return [
          "success" => true
        ];
      }

      return ["success" => false, "message" => $model->getErrors()];
    }

    throw new BadRequestHttpException("Invalid request");
  }
}
