<?php
$configs = include('config/db.config.php');

function OpenCon()
	{
		global $configs;
		$conn = mysqli_connect($configs['host'], $configs['username'], $configs['pswrd'],$configs['db']) or die("Connect failed: %s\n". $conn -> error);
 
		return $conn;
	}
 

function CloseCon($conn)

	{
		$conn -> close();
	}
   
?>