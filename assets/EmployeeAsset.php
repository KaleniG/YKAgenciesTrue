<?php

namespace app\assets;

use yii\web\AssetBundle;

class EmployeeAsset extends AssetBundle
{
  public $basePath = '@webroot';
  public $baseUrl = '@web';
  public $js = [
    "js/agency/UpdateAgency.js",
    "js/employee/AddEmployee.js",
    "js/employee/DeleteEmployee.js",
    "js/employee/UpdateEmployee.js",
    "js/employee/UpdateEmployeeTable.js"
  ];
  public $depends = [
    'yii\web\YiiAsset'
  ];
}
