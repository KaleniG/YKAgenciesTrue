<?php

use yii\helpers\Url;

$this->title = $model->name . " " . $model->surname;
?>

<form action="<?= Url::to(["agency/view"]) ?>" method="get">
  <input type="hidden" name="id" value="<?= $model->agency_id ?>">
  <button type="submit" class="edit">View</button>
</form>
<br>
<h1>Employee: <?= $this->title ?></h1>
<label for="name">Name:
  <input type="text" name="name" value="<?= $model->name ?>" id="name" class="edit">
</label>
<br>
<label for="surname">Surname:
  <input type="text" name="surname" value="<?= $model->surname ?>" id="surname" class="edit">
</label>
<br>
<label for="ssid">SSID:
  <input type="text" name="ssid" value="<?= $model->ssid ?>" id="ssid" class="edit">
</label>
<br>
<label for="agency">Agency:
  <input type="text" name="agency" value="<?= $model->agency->name ?>" id="agency" class="edit">
</label>