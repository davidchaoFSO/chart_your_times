<?php

require_once "db/db.php";
require_once "models/DataModel.php";
require_once "views/DataView.php";
$model = new DataModel(MY_DSN, MY_USER, MY_PASS);
$view = new DataView();
$view->show('header');
if (isset ($_POST['title']) && isset($_POST['rating'])){
	$title = mysql_real_escape_string(empty($_POST['title']) ? '' : (trim($_POST['title'])));
	$rating = mysql_real_escape_string(empty($_POST['rating']) ? '' : (trim($_POST['rating'])));
	$create = $model->createGame($title,$rating);
	echo "<p class='success'>Entry created! Return to the home page to see your new entry.</p>";
}
$view->showForm();
echo "<hr /><a href='index.php'>Back to Home</a>";
$view->showFooter();

?>