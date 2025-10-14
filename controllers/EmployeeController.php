<?php

namespace app\controllers;

use yii\base\Controller;

class EmployeeController extends Controller
{
  public $layout = "main";

  public function actionIndex()
  {
    return $this->render("index");
  }
}
