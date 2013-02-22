
<?php
require_once "db/db.php";
require_once "models/DataModel.php";
require_once "views/DataView.php";
$model = new DataModel(MY_DSN, MY_USER, MY_PASS);
$username = 'testUser';
$rows = $model->getActivityList($username);

$contentPage = 'ActivityList';

$view = new DataView();
$view->show('templates/header');
echo "<div class='row-fluid'><div class='span4 offset4'><a href='ActivityCreate.php'>Add Activity</a></div></div>";
$view->show($contentPage, $rows);
$view->show('templates/footer');

?>