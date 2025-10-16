<?php

namespace app\assets;

use yii\web\AssetBundle;

class EmployeeAsset extends AssetBundle
{
  public $basePath = '@webroot';
  public $baseUrl = '@web';
  public $js = [
    "js/employee/AddEmployee.js",
    "js/employee/DeleteEmployee.js"
  ];
  public $depends = [
    'yii\web\YiiAsset'
  ];
}
