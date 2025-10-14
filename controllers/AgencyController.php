<?php

namespace app\controllers;

use yii\base\Controller;

class AgencyController extends Controller
{
  public $layout = "main";

  public function actionIndex()
  {
    return $this->render("index");
  }
}
