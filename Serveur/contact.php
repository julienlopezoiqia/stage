<?php
include('DBManager.php');

//----------------------------------------------------------------------------------------
function get_contact()
	{
		//Si date début et fin renseignée
		if( isset($_POST["Debut"])and isset($_POST["Fin"])){
			$debut = $_POST["Debut"];
			$fin = $_POST["Fin"];
			return get_contact_by_date($debut,$fin );
		}
		elseif(isset($_GET['Recherche']) AND !empty($_GET['Recherche'])) {
			$Recherche = htmlspecialchars($_GET['Recherche']);
			return search($Recherche);
		}
		else{ //Aucune date n'est renseignée
			return get_all_contact();
		}
	}   
	
//----------------------------------------------------------------------------------------

function get_contact_by_date($debut, $fin)
	{
		    //Si date début et fin renseignée
			$date_debut = '\''.$debut.'\'';
			$date_fin = '\''.$fin.'\'';
			$request = "SELECT created_at,email,nom,prenom,telephone,message FROM contact_form WHERE created_at BETWEEN date_format(".$date_debut.",'%Y-%m-%d') AND date_format(".$date_fin.",'%Y-%m-%d') ORDER BY created_at DESC ";
            $result = getResults($request);
			return $result;
	}

//----------------------------------------------------------------------------------------

function get_all_contact()
	{
		$request = "SELECT created_at,email,nom,prenom,telephone,message FROM contact_form ORDER BY created_at DESC ";
		$result = getResults($request);

		return $result;
	}   

//----------------------------------------------------------------------------------------

function search($Recherche)
	{
		$request = "SELECT * FROM contact_form WHERE email LIKE" .$Recherche." ORDER BY id DESC";
		$result = getResults($request);

		return $result;
	}   



?>