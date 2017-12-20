<?php
session_start();

require __DIR__.'/vendor/autoload.php';

define('APP_PATH', "/var/www/html/Preeti_project");

	if($_GET['action'] == 'login') {

		require "/var/www/html/phpCodeSnippets/psrMVC/application/view/login.php";
  	
  	}

	if($_GET['action'] == 'adminLogin') {
 		$viewObj = new Compassite\controller\AdminController();

 		$viewObj->getMyview(); 	
  
  	}
  
	if($_GET['action'] == 'usersInformation') {
 		$viewObj = new Compassite\controller\AdminController();
		$viewObj->getUserInformation(); 	
    } 

    if($_GET['page'] == 'adminLogout') {
 		$viewObj = new Compassite\controller\AdminController();

 		$viewObj->adminLogout(); 	
  
  	}

	if($_GET['action'] == 'user') {
 	$viewObj = new Compassite\controller\UserController();
		$viewObj->loginValidation(); 	
  
 	} 
  
  	if($_GET['action'] == 'userRegistration') {
 	$viewObj = new Compassite\controller\UserController();
		$viewObj->userInfoValidation(); 	
  	} 
  