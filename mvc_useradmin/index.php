<?php

require __DIR__.'/vendor/autoload.php';

	
	$viewObj = new Compassite\controller\UserController();

	if($_GET['action'] == 'login') {
 		$viewObj = new Compassite\controller\AdminController();

 		$viewObj->getMyview(); 	
  
  	}
  
	if($_GET['action'] == 'userInformation') {
 	$viewObj = new Compassite\controller\AdminController();
		$viewObj->getUserInformation(); 	
    } 

	if($_GET['action'] == 'user') {
 	
		$viewObj->loginValidation(); 	
  
 	} 
  
  	if($_GET['action'] == 'userRegistration') {
 	
		$viewObj->userInfoValidation(); 	
  	} 
  