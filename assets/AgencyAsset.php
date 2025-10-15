<?php

namespace app\assets;

use yii\web\AssetBundle;

class AgencyAsset extends AssetBundle
{
  public $basePath = '@webroot';
  public $baseUrl = '@web';
  public $js = [
    "js/agency/Add.js",
    "js/agency/Delete.js",
  ];
  public $depends = [
    'yii\web\YiiAsset'
  ];
}
