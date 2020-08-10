<?php

include('Config.php');

//---------------------------------------------------------------------------------------

function get_list_interested()
	{
		//Si date début et fin renseignée
		if( isset($_POST["Debut"])and isset($_POST["Fin"])){
			$debut = $_POST["Debut"];
			$fin = $_POST["Fin"];
			return get_list_interested_by_date($debut,$fin );
		}
		else{ //Aucune date n'est renseignée
			return get_all_list_interested();
		}
	}   

//---------------------------------------------------------------------------------------

function get_list_interested_by_date($debut, $fin)
	{
		
		//Si date début et fin renseignée	
			//Connexion à la base de données
			$conn = OpenCon();	
						
			$date_debut = '\''.$debut.'\'';
			$date_fin = '\''.$fin.'\'';
			$request = "SELECT created_at,name,lastname,email,phone,agree FROM interested WHERE created_at BETWEEN date_format(".$date_debut.",'%Y-%m-%d') AND date_format(".$date_fin.",'%Y-%m-%d') ORDER BY created_at DESC  ";
						
			$result = mysqli_query($conn,$request);
			//fermeture de la connexion			
			CloseCon($conn);
			return $result;
					
		
		
	}   

//----------------------------------------------------------------------------------------

function get_all_list_interested()
	{
		//Connexion à la base de données
		$conn = OpenCon();

		$request = "SELECT created_at,name,lastname,email,phone,agree FROM interested ORDER BY created_at DESC ";
		$result = mysqli_query($conn,$request);
		//fermeture de la connexion			
		CloseCon($conn);
		return $result;
	}   
	
	
//----------------------------------------------------------------------------------------	
	
	


?>