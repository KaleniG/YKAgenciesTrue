<?php

use app\assets\EmployeeAsset;
use yii\helpers\Url;

EmployeeAsset::register($this);

$this->title = $model->name . " " . $model->surname;
?>

<form action="<?= Url::to(["agency/view"]) ?>" method="get">
  <input type="hidden" name="id" value="<?= $model->agency_id ?>">
  <button type="submit" class="edit">Back</button>
</form>
<br>
<h1>Employee: <?= $this->title ?></h1>
<input type="hidden" name="id" value="<?= $model->id ?>" id="id">
<label for="name">Name:
  <input type="text" name="name" data-original="<?= $model->name ?>" value="<?= $model->name ?>" id="name" class="edit">
</label>
<br>
<label for="surname">Surname:
  <input type="text" name="surname" data-original="<?= $model->surname ?>" value="<?= $model->surname ?>" id="surname" class="edit">
</label>
<br>
<label for="ssid">SSID:
  <input type="text" name="ssid" data-original="<?= $model->ssid ?>" value="<?= $model->ssid ?>" id="ssid" class="edit">
</label>
<br>
<label for="agency">Agency:
  <select type="text" name="agency_id" id="agency" class="edit">
    <?php foreach ($agencyModels as $agency): ?>
      <option value="<?= $agency->id ?>" <?= ($agency->id === $model->agency_id) ? "selected" : "" ?>><?= $agency->name ?></option>
    <?php endforeach; ?>
  </select>
</label>