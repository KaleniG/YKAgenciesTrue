<?php

namespace app\assets;

use yii\web\AssetBundle;

class AgencyAsset extends AssetBundle
{
  public $basePath = '@webroot';
  public $baseUrl = '@web';
  public $js = [
    "js/agency/AddAgency.js",
    "js/agency/AgencyContextMenu.js",
    "js/agency/SearchAgency.js",
    "js/agency/EnableAgency.js",
    "js/agency/UpdateAgencyTable.js"
  ];
  public $depends = [
    'yii\web\YiiAsset'
  ];
}
