<form action="/YKAgenciesTrue/web/agency/index" method="post">
  <input type="hidden" name="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
  <button type="submit" class="home">Agencies</button>
</form>

<form action="/YKAgenciesTrue/web/employee/index" method="post">
  <input type="hidden" name="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
  <button type="submit" class="home">Employees</button>
</form>