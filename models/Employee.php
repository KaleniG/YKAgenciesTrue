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
      [["ssid"], "string", "length" => 16],
      [["ssid"], "match", "pattern" => "/^[A-Z]{6}[0-9]{2}[A-Z][0-9]{2}[A-Z0-9]{4}[A-Z]$/i", "message" => "Invalid SSID"],
      [["agency_id"], "integer"],
      [["agency_id"], "exist", "targetClass" => Agency::class, "targetAttribute" => ["agency_id" => "id"]],
      [["name", "surname", "ssid", "agency_id"], "required"],
      [["name", "surname"], "string", "max" => 255]
    ];
  }

  public function beforeValidate()
  {
    $this->ssid = strtoupper(trim($this->ssid));
    return parent::beforeValidate();
  }

  public function beforeSave($insert)
  {
    if (parent::beforeSave($insert)) {
      $this->ssid = strtoupper($this->ssid);
      $this->name = trim($this->name);
      $this->surname = trim($this->surname);
      return true;
    }
    return false;
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
