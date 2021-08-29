<?php

/*class Database{
	public $dbservername="tcp:chisomjude.database.windows.net,1433";
	public $dbusername="chisomjude";
	public $dbpassword="Favoured0205";
	public $dbname= "covidcenter";

 function getConnection(){
	$conn = new mysqli($this ->dbservername, $this->dbusername, $this->dbpassword, $this -> dbname);
	if ($conn->connect_error)
	{
	die("Connection Failed:" . $conn->connect_error);
	}
	return $conn;
	}
}
*/


try {
    $conn = new PDO("sqlsrv:server = tcp:chisomjude.database.windows.net,1433; Database = covidcenter", "chisomjude", "Favoured0205");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

// SQL Server Extension Sample Code:
$connectionInfo = array("UID" => "chisomjude", "pwd" => "Favoured0205", "Database" => "covidcenter", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:chisomjude.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);
?>