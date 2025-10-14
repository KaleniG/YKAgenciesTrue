<?php

namespace app\models;

use yii\db\ActiveRecord;

class Employee extends ActiveRecord
{
  public static function tableName()
  {
    return "employees";
  }

  public function rules()
  {
    return [
      [["ssid"], "unique"],
      [["name", "surname", "ssid"], "string", "max" => 255,  "required"],
      [["agency_id"], "required"],
      [["agency_id"], "integer"],
      [["agency_id"], "exist", "targetClass" => Agency::class, "targetAttribute" => ["agency_id" => "id"]]
    ];
  }

  public function attributeLabels()
  {
    return [
      "name" => "Name",
      "surname" => "Surname",
      "ssid" => "SSID"
    ];
  }

  public function getAgency()
  {
    return $this->hasOne(Agency::class, ["id" => "agency_id"]);
  }
}
