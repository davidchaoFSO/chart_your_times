<?php

require_once "db/db.php";
require_once "models/DataModel.php";
require_once "views/DataView.php";
$model = new DataModel(MY_DSN, MY_USER, MY_PASS);

$username = 'testUser';
$view = new DataView();
$view->show('templates/header');
if (isset ($_POST['activity']) && isset($_POST['record'])){
	$activity = mysql_real_escape_string(empty($_POST['activity']) ? '' : (trim($_POST['activity'])));
	$rating = mysql_real_escape_string(empty($_POST['record']) ? '' : (trim($_POST['record'])));
	$create = $model->createGame($activity,$record,$username);
	echo "<p class='success'>Entry created! Return to the home page to see your new entry.</p>";
}
$view->show('NewActivity');
echo "<hr /><a href='~/index.php'>Back to Home</a>";
$view->show('templates/footer');

?>