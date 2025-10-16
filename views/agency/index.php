<?php

use app\assets\AgencyAsset;
use yii\helpers\Html;
use yii\helpers\Url;

AgencyAsset::register($this);

$this->title = "Agencies";
?>

<div id="context-menu">
  <ul>
    <li id="delete">Delete</li>
    <li id="view">View</li>
  </ul>
</div>

<div class="table-container">
  <div class="table-wrapper-1">
    <h1>Agencies</h1>
    <div class="edit navbar">
      <form id="op-form" action="<?= Url::to(["agency/view"]) ?>" method="get">
        <input type="hidden" name="id">
        <button type="button" name="delete" class="edit">Delete</button>
        <button type="submit" class="edit">View</button>
      </form>
    </div>
    <br>
    <table class="edit" id="agencies-table">
      <thead>
        <tr>
          <th>Select</th>
          <th class="sortable">Name</th>
          <th class="sortable">Description</th>
        </tr>
        <tr>
          <td></td>
          <td><input type="text" id="name-col-search" class="edit"></td>
          <td><input type="text" id="description-col-search" class="edit"></td>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($models as $model): ?>
          <tr data-id="<?= $model->id ?>">
            <td><input type="checkbox" name="op-enabled" class="edit"></td>
            <td><input type="text" name="name" data-original="<?= $model->name ?>" value="<?= $model->name ?>" class="edit" disabled></td>
            <td><textarea type="text" name="description" data-original="<?= $model->description ?>" class="edit" disabled><?= Html::decode($model->description) ?></textarea></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <div class="table-wrapper-2">
    <h1>Add Agency</h1>
    <form id="add-form" action="<?= Url::to(["agency/add"]) ?>">
      <label for="name">Name:
        <input type="text" name="Agency[name]" id="name" class="edit">
      </label>
      <br>
      <label for="description">Description:
        <textarea type="text" name="Agency[description]" id="description" class="edit"></textarea>
      </label>
      <br>
      <button type="submit" class="edit">Add</button>
    </form>
  </div>
</div>