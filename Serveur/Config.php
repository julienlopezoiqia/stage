<?php
$configs = include('../Serveur/db.config.php');

//----------------------------------------------------------------------------------------

function OpenCon()
	{
		global $configs;
		
		$conn = mysqli_connect($configs['host'], $configs['username'], $configs['pswrd'],$configs['db']);
		if (!$conn){
			error_log("Connect failed");
		}
		$conn->set_charset('utf8');
 
		return $conn;
	}
	
//----------------------------------------------------------------------------------------

function CloseCon($conn)

	{
		$conn -> close();
	}


//----------------------------------------------------------------------------------------
 




//----------------------------------------------------------------------------------------








?>