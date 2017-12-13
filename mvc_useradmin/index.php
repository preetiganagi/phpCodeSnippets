<?php

require __DIR__.'/vendor/autoload.php';


  if($_GET['action'] == 'login') {
 	$viewObj = new Compassite\controller\AdminController();

	$viewObj->getMyview(); 	
  }

 if($_GET['action'] == 'user') {
 	$viewObj = new Compassite\controller\UserController();

	$viewObj->getView(); 	
  } 