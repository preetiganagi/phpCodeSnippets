<?php

namespace Compassite\model;

class DBConnection 
{

	private $host = "localhost";

	private $user = "root";

	private $password = "compass";

	private $database = "adminuserdatabase";

	public $pdo;
	
	
	public function __construct() 
	{
		echo "init DB connection";
		try
        {
        	$this->pdo = new \PDO("mysql:host=localhost;dbname=adminuserdatabase",
        		"root", "compass");
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch(\PDOException $e){
             $e->getMessage();
        }

    }
  
     public function __destruct()
    
    {
         $this->pdo = null;
    }
}
