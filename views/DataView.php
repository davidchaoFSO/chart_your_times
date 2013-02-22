<?php

class DataView{
	public function show($template, $data=array()){
		$templatePath = "views/${template}.php";
		if(file_exists($templatePath)){
			include $templatePath;
		}
	}
}
?>