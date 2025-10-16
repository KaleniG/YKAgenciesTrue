<?php

use app\assets\AgencyAsset;
use yii\helpers\Html;
use yii\helpers\Url;

AgencyAsset::register($this);

$this->title = "Agencies";
?>

<div class="table-container">
  <div class="table-wrapper-1">
    <h1>Agencies</h1>
    <table class="edit" id="agencies-table">
      <thead>
        <tr>
          <th>Name</th>
          <th>Description</th>
          <th>Operations</th>
        </tr>
        <tr>
          <td><input type="text" id="name-col-search" class="edit"></td>
          <td><input type="text" id="description-col-search" class="edit"></td>
          <td></td>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($models as $model): ?>
          <tr data-id="<?= $model->id ?>">
            <td><input type="text" name="name" data-original="<?= $model->name ?>" value="<?= $model->name ?>" class="edit"></td>
            <td><textarea type="text" name="description" data-original="<?= $model->description ?>" class="edit"><?= Html::decode($model->description) ?></textarea></td>
            <td>
              <button type="button" name="delete" class="edit">Delete</button>
              <form action="<?= Url::to(["agency/view"]) ?>" method="get">
                <input type="hidden" name="id" value="<?= $model->id ?>">
                <button type="submit" class="edit">View</button>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <div class="table-wrapper-2">
    <h1>Add Agency:</h1>
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