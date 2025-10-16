<?php

namespace app\controllers;

use Yii;
use yii\base\Controller;
use yii\web\NotFoundHttpException;
use app\models\Employee;
use yii\web\BadRequestHttpException;
use yii\web\Response;

class EmployeeController extends Controller
{
  public $layout = "main";

  public function actionView()
  {
    $id = Yii::$app->request->get("id");
    $model = Employee::findOne($id);

    if (!$model) {
      throw new NotFoundHttpException("Employee not found.");
    }

    return $this->render("view", [
      "model" => $model
    ]);
  }

  public function actionAdd()
  {
    $model = new Employee();

    if ($this->request->isAjax) {
      $this->response->format = Response::FORMAT_JSON;
      if ($model->load($this->request->post()) && $model->save()) {
        return [
          "success" => true,
          "id" => $model->id
        ];
      }

      return ["success" => false, "message" => $model->getErrors()];
    }
  }

  public function actionDelete()
  {
    if ($this->request->isAjax) {
      $this->response->format = Response::FORMAT_JSON;
      $model = Employee::findOne($this->request->post("id"));

      if (!$model) {
        return ["success" => false, "message" => "Employee not found"];
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
