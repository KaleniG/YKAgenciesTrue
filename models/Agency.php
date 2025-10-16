<?php

namespace app\models;

use yii\db\ActiveRecord;

class Agency extends ActiveRecord
{
  public static function tableName()
  {
    return "agencies";
  }

  public function rules()
  {
    return [
      [["name"], "required"],
      [["description"], "default", "value" => null],
      [["name", "description"], "string", "max" => 255]
    ];
  }

  public function beforeSave($insert)
  {
    if (parent::beforeSave($insert)) {
      $this->name = trim($this->name);
      $this->description = trim($this->description);
      return true;
    }
    return false;
  }

  public function attributeLabels()
  {
    return [
      "name" => "Name",
      "description" => "Description"
    ];
  }

  public function getEmployees()
  {
    return $this->hasMany(Employee::class, ["agency_id" => "id"]);
  }
}
