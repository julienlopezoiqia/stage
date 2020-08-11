<?php
//TODO : gerer la dépendaance proprement type require __DIR__ . '/vendor/autoload.php';
//TODO : optimisation connection BDD
//TODO : gérer les exceptions
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
 function getResults($request)
 {
    //Connexion à la base de données
     $conn = OpenCon();

     $result = mysqli_query($conn,$request);
     //fermeture de la connexion
     CloseCon($conn);
     return $result;
 }




//----------------------------------------------------------------------------------------








?>