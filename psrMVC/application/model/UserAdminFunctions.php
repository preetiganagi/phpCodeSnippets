<?php

namespace Compassite\model;

interface UserAdminFunctions
{
	public function editProfile($id,$name=null,$email=null,$phNum=null);
	public function information($name);
}