<?php

// Class Database{
//  // Here we have the database type and the host and the database name.
// 	public $server = "mysql:host=localhost;dbname=whizzyTunes";
// 	private $username = "root";
//   private $password = "";
//   // options on how I want to handle errors and fetch data.
// 	private $options  = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,);
//   // then we have a protected connection property
//   protected $conn;
//  	//then we have a method
// 	public function open(){
//  		try{
//     //this class 
//  			$this->conn = new PDO($this->server, $this->username, $this->password, $this->options);
//       return $this->conn;
//     }
//     // and catch if there is a problem with a message
//  		catch (PDOException $e){
//  			echo "There is some problem in connection: " . $e->getMessage();
//  		}
 
//   }
//   // then close connection
// 	public function close(){
//     //The var has not been initialized.
//    	$this->conn = null;
//  	}
// }

// // pdo is an instance of the database class
// $pdo = new Database();

// SECURE CONNECTION

$serverName = "localhost";
$username = "root";
$password = "";
$databaseName = "whizzyTunes"; 

// db array assigned to value's
$db['db_host'] = $serverName;
$db['db_user'] = $username;
$db['db_pass'] = $password;
$db['db_name'] = $databaseName;

// foreach array use key name and loop through each value.
foreach($db as $key => $value){

  define(strtoupper($key),$value);

}

//assign variable to open a new connection to server with contants
$connection = mysqli_connect(DB_HOST, DB_USER,DB_PASS,DB_NAME);

?>