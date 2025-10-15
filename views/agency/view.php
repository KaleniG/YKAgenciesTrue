<?php

use app\assets\EmployeeAsset;
use yii\helpers\Html;
use yii\helpers\Url;

EmployeeAsset::register($this);

$this->title = $model->name;
?>

<form action="<?= Url::to(["agency/index"]) ?>" method="get">
  <button type="submit" class="edit">Back</button>
</form>
<br>
<div class="table-container">
  <div class="table-wrapper-2">
    <h1>Agency: <?= $model->name ?></h1>
    <label for="agency-name">Name:
      <input type="text" name="agency-name" value="<?= $model->name ?>" id="agency-name" class="edit">
    </label>
    <br>
    <label for="agency-description">Description:
      <textarea type="text" name="agency-description" id="agency-description" class="edit"><?= Html::decode($model->description) ?></textarea>
    </label>
    <br>
    <br>
    <h1>Add Employee:</h1>
    <form id="add-form" action="<?= Url::to(["employee/add"]) ?>" method="post">
      <input type="hidden" name="Employee[agency_id]" value="<?= $model->id ?>">
      <label for="employee-name">Name:
        <input type="text" name="Employee[name]" id="employee-name" class="edit">
      </label>
      <br>
      <label for="employee-surname">Surname:
        <input type="text" name="Employee[surname]" id="employee-surname" class="edit">
      </label>
      <br>
      <label for="employee-ssid">SSID:
        <input type="text" name="Employee[ssid]" id="employee-ssid" class="edit">
      </label>
      <br><br>
      <button type="submit" class="edit">Add</button>
    </form>
  </div>
  <div class="table-wrapper-1">
    <h1>Employees:</h1>
    <table class="edit">
      <thead>
        <tr>
          <th>Name</th>
          <th>Surname</th>
          <th>SSID</th>
          <th>Operations</th>
        </tr>
        <tr>
          <td><input type="text" id="name-col-search" class="edit"></td>
          <td><input type="text" id="surname-col-search" class="edit"></td>
          <td><input type="text" id="ssid-col-search" class="edit"></td>
          <td></td>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($model->employees as $employee): ?>
          <tr data-id="<?= $employee->id ?>">
            <td><input type="text" name="name" value="<?= $employee->name ?>" class="edit"></td>
            <td><input type="text" name="surname" value="<?= $employee->surname ?>" class="edit"></td>
            <td><input type="text" name="ssid" value="<?= $employee->ssid ?>" class="edit"></td>
            <td>
              <button type="button" name="delete" class="edit">Delete</button>
              <form action="<?= Url::to(["employee/view"]) ?>" method="get">
                <input type="hidden" name="id" value="<?= $employee->id ?>">
                <button type="submit" class="edit">View</button>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>