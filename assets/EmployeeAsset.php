<?php

namespace app\assets;

use yii\web\AssetBundle;

class EmployeeAsset extends AssetBundle
{
  public $basePath = '@webroot';
  public $baseUrl = '@web';
  public $js = [
    "js/employee/Add.js"
  ];
  public $depends = [
    'yii\web\YiiAsset'
  ];
}
