<?php
session_start();

require __DIR__.'/vendor/autoload.php';

define('APP_PATH',"/var/www/html/Preeti-projects");

	if($_GET['page'] == 'login') {

		require APP_PATH."/psrMVC/application/view/login.php";
  }

	if($_GET['page'] == 'adminLogin') {
 		$viewObj = new Compassite\controller\AdminController();
 		$viewObj->getMyview(); 	
  }
  
	if($_GET['page'] == 'userInformation' && !$_GET['action']) {
 		$viewObj = new Compassite\controller\AdminController();
		$viewObj->getUserInformation(); 	
  } 


  if ($_GET['page'] == 'userInformation' && $_GET['action'] =='delete') {
    $viewObj = new Compassite\controller\AdminController();
		$viewObj->deleteUser(); 	
  }

  if ($_GET['page'] == 'userInformation' && $_GET['action'] =='enable') {
  	$viewObj = new Compassite\controller\AdminController();
		$viewObj->userEnable(); 	
  }

  if ($_GET['page'] == 'userInformation'&& $_GET['action'] =='disable') {
  	$viewObj = new Compassite\controller\AdminController();
		$viewObj->userDisable(); 	
  }

  if($_GET['page'] == 'adminLogout') {
 		$viewObj = new Compassite\controller\AdminController();
 		$viewObj->adminLogout(); 	
  }

  if($_GET['page'] == 'userInformation'&& $_GET['action'] =='makeAdmin') {
 		$viewObj = new Compassite\controller\AdminController();
 		$viewObj->makeUserTOAdmin(); 	
  }
  if($_GET['page'] == 'userInformation'&& $_GET['action'] =='profileEdit') {
    $viewObj = new Compassite\controller\AdminController();
    $viewObj->editProfileOfUser();  
  }

	if($_GET['page'] == 'user') {
		$viewObj = new Compassite\controller\UserController();
		$viewObj->loginValidation(); 	
 	} 
  
  if($_GET['page'] == 'userRegistration') {
 		$viewObj = new Compassite\controller\UserController();
		$viewObj->userInfoValidation(); 	
  } 
  