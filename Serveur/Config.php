<?php
//TODO : gerer la dépendaance proprement type require __DIR__ . '/vendor/autoload.php';

$configs = include('db.config.php');

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