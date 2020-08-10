<?php
include('Config.php');

//----------------------------------------------------------------------------------------
function get_Newsletter_List()
	{
		//Si date début et fin renseignée
		if( isset($_POST["Debut"])and isset($_POST["Fin"])){
			$debut = $_POST["Debut"];
			$fin = $_POST["Fin"];
			return get_Newsletter_List_by_date($debut,$fin );
		}
		else{ //Aucune date n'est renseignée
			return get_all_Newsletter_List();
		}
	}   
	
//----------------------------------------------------------------------------------------

function get_Newsletter_List_by_date($debut, $fin)
	{
		
		//Si date début et fin renseignée	
			//Connexion à la base de données
			$conn = OpenCon();	
						
			$date_debut = '\''.$debut.'\'';
			$date_fin = '\''.$fin.'\'';
			$request = "SELECT created_at,email FROM newsletter WHERE created_at BETWEEN date_format(".$date_debut.",'%Y-%m-%d') AND date_format(".$date_fin.",'%Y-%m-%d') ORDER BY created_at DESC";
						
			$result = mysqli_query($conn,$request);
			//fermeture de la connexion			
			CloseCon($conn);
			return $result;
					
		
		
	}   

//----------------------------------------------------------------------------------------

function get_all_Newsletter_List()
	{
		//Connexion à la base de données
		$conn = OpenCon();

		$request = "SELECT created_at,email FROM newsletter WHERE created_at ORDER BY created_at DESC ";
		$result = mysqli_query($conn,$request);
		//fermeture de la connexion			
		CloseCon($conn);
		return $result;
	}   

//----------------------------------------------------------------------------------------


?>