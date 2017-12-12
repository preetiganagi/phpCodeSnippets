<?php
class DBConnection {
	private $host = "localhost";
	private $user = "root";
	private $password = "compass";
	private $database = "adminuser";
	private $conn;
	public $pdo;
	
	public function __construct() 
	{
		$host = "localhost";
		$database = "adminuser";
		$user = "root";
		$password = "compass";
		$this->conn = $this->connectDB();

		 try
        {
            $this->pdo = new PDO("mysql:host=$host;dbname=$database", $user, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e)
        {
            return $e->getMessage();
        }

    }
     public function __destruct()
    {
        $this->pdo = null;
    }
	
	
	function connectDB() 
	{
		$conn = mysqli_connect($this->localhost,
								$this->user,$this->password,
								$this->database);
		if($conn === false)
		{
			die("connection not happening");
		}

		return $conn;
	}
	
	function runQuery($query) 
	{
		$result = mysqli_query($this->conn,$query);
		while($row=mysqli_fetch_assoc($result))
		{
			$resultset[] = $row;
		}		
		if(!empty($resultset))
			return $resultset;
	}
	
	function numRows($query) 
	{
		$result  = mysqli_query($this->conn,$query);
		$rowcount = mysqli_num_rows($result);
		return $rowcount;	
	}
	function runInsertQuery($query) {
		$result = mysqli_query($this->conn,$query);
		return $result;
	}
}
?>
