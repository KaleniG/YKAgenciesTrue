<?php

namespace app\controllers;

use app\models\Agency;
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
    $agencyModels = Agency::find()->orderBy(["id" => SORT_ASC])->all();

    if (!$model) {
      throw new NotFoundHttpException("Employee not found.");
    }

    return $this->render("view", [
      "model" => $model,
      "agencyModels" => $agencyModels
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

  public function actionUpdate()
  {
    if ($this->request->isAjax) {
      $this->response->format = Response::FORMAT_JSON;
      $model = Employee::findOne($this->request->post("id"));

      if (!$model) {
        return ["success" => false, "message" => "Agency not found"];
      }

      if ($this->request->post("name") !== null)
        $model->name = $this->request->post("name");
      if ($this->request->post("surname") !== null)
        $model->surname = $this->request->post("surname");
      if ($this->request->post("ssid") !== null)
        $model->ssid = $this->request->post("ssid");
      if ($this->request->post("agency_id") !== null)
        $model->agency_id = $this->request->post("agency_id");

      if ($model->save()) {
        return [
          "success" => true
        ];
      }

      return ["success" => false, "message" => $model->getErrors()];
    }

    throw new BadRequestHttpException("Invalid request");
  }
}
