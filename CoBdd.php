<?php

function OpenCon()
	{
		$dbhost = "localhost";
		$dbuser = "root";
		$dbpass = "LILY081196@t";
		$db = "test";
		$conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
 
		return $conn;
	}
 

function CloseCon($conn)

	{
		$conn -> close();
	}
   
?>