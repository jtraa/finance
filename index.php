<?php
session_start();


spl_autoload_register(function($className) {
	include_once $_SERVER['DOCUMENT_ROOT'] . '/finance/classes/' . $className . '.php';
});


		
		$redirect = new Redirect;

		$redirect->Gotologin();
	

?>
