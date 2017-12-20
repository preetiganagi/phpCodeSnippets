<?php
namespace Compassite\controller;

use Compassite\model\User;

class UserController
{

    public function __construct()
    {
        echo " hey you are  welcome!!!<br>";
    }

    public function loginValidation()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") 
        {
            $name = $_POST['name'];
          $userObj = new User();
          $result = $userObj->information($name);

            if(sizeof($result)>0)
            {   
                foreach ($result as $key => $value) 
                {
                    if($value['username'] == $name && $value['password'] == md5($_POST['password'])) 
                    {
                    session_start();
                    $_SESSION['userName'] = $name;
                    header("location:userList.php");
                    }
                    else {
                        $passwordErr ="password not matched";
                    }
                }
            }
            if (empty($name) || empty($_POST['password'])) 
            {
                $passwordErr ="password not matched";
            }
        }   
        if ($_SERVER["REQUEST_METHOD"] == "POST") 
        {
            echo "<h2>logged out successfully</h2>";
        }
        require(APP_PATH."/application/view/userLogin.php");
    }

    public function userInfoValidation()
    {
        $nameErr = $emailErr =$pwdErr = $cpwdErr =  $phoneNumberErr = $contryCode = "";
        $name = $email =$pwd = $cpwd = $phoneNumber = $contryCode ="";
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") 
        {
            if (empty($_POST["name"])) 
            {
                $nameErr = "Name is required";
            } 
            else{
                    $name =($_POST["name"]);
                    // check if name only contains letters and whitespace
                    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
                        $nameErr = "Only letters and white space allowed"; 
                    }
                }
            if (empty($_POST["email"])) 
            {
                $emailErr = "Email is required";
            } 
             $email =($_POST["email"]);
            // check if e-mail address is well-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format"; 
            }
                    
            if (empty($_POST["phoneNumber"])) {
                $phoneNumberErr = "phone number is required";
            } 
            elseif(!preg_match('/^[0-9]{3}[0-9]{3}[0-9]{4}$/', $_POST['phoneNumber']))
            {
                $phoneNumberErr = 'Invalid Number!';
            } 
            else {
                $phoneNumber =($_POST["phoneNumber"]);
            }

            if (empty($_POST["contryCode"])) {
                $contryCodeErr = "Country code is required";
            }
            elseif(!preg_match('/[+][0-9]{2}$/', $_POST['contryCode']))
            {
                $contryCodeErr = 'country code is not correct!';
            } 
            else {
                $contryCode =($_POST["contryCode"]);
            }
            if (empty($_POST["password"])) {
                $pwdErr = "password is required";
            }
            else {
                $pwd =md5($_POST["password"]);
              
            }
            if (empty($_POST["confirmPassword"]) || $pwd != md5($_POST["confirmPassword"])) {
                $passwordMsg="Your passwords do not match. Please type carefully.";
            } else {
                $cpwd =($_POST["confirmPassword"]);
            }
            $userObj1 = new User($name,$email,$phoneNumber,$pwd,2,$contryCode,1);
            $success= $userObj1->registration($userObj1);

            if($success)
            {   
               
                header("location:../view/userLogin.php?msg=success fully registered");
                //echo "registered successfully";
            }
            else
            {
                echo "not registered";
            }
        }
        require(APP_PATH."/application/view/userRegistration.php");
    }

}

	