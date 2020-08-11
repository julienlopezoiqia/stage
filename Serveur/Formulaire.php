<?php
include('DBManager.php');

//----------------------------------------------------------------------------------------
function get_Formulaire_data()
	{
		//Si date début et fin renseignée
		if( isset($_POST["Debut"])and isset($_POST["Fin"])){
			$debut = $_POST["Debut"];
			$fin = $_POST["Fin"];
			return get_Formulaire_data_by_date($debut,$fin );
		}
		else{ //Aucune date n'est renseignée
			return get_all_Formulaire_data();
		}
	}   
	
//----------------------------------------------------------------------------------------

function get_Formulaire_data_by_date($debut, $fin)
	{

		//Si date début et fin renseignée	

			$date_debut = '\''.$debut.'\'';
			$date_fin = '\''.$fin.'\'';
			$request = "SELECT nom, prenom ,adresse, email,telephone, appartement,numero,rue,code_postal,ville,type_logement,surface,chauffage,climatisation,access,porte,type_location,type_connexion,parking,nuit_par_an,nombre_couchage,duree_moyenne,chiffre_affaire,created_at,actutarif FROM formulaire  WHERE created_at BETWEEN date_format(".$date_debut.",'%Y-%m-%d') AND date_format(".$date_fin.",'%Y-%m-%d') ORDER BY created_at DESC ";
			$result =  getResults($request);
			return $result;

	}   

//----------------------------------------------------------------------------------------

function get_all_Formulaire_data()
	{

		$request = "SELECT nom, prenom ,adresse, email,telephone, appartement,numero,rue,code_postal,ville,type_logement,surface,chauffage,climatisation,access,porte,type_location,type_connexion,parking,nuit_par_an,nombre_couchage,duree_moyenne,chiffre_affaire,created_at,actutarif FROM formulaire ORDER BY created_at DESC ";
		$result = getResults($request);
		return $result;
	}   

?>