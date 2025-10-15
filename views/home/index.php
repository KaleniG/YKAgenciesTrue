<?php

use yii\helpers\Url;

?>

<form action="<?= Url::to(["agency/index"]) ?>" method="post">
  <input type="hidden" name="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
  <button type="submit" class="home">Agencies</button>
</form>

<form action="<?= Url::to(["employee/index"]) ?>" method="post">
  <input type="hidden" name="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
  <button type="submit" class="home">Employees</button>
</form>