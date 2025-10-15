<?php

namespace app\controllers;

use Yii;
use yii\base\Controller;
use yii\web\NotFoundHttpException;
use app\models\Employee;

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
}
