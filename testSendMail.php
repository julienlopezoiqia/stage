<?php
include('Serveur/DBManager.php');
$jours= include('Serveur/jours.config.php');

//----------------------------------------------------------------------------------------
	
function get_Email_List($nb_jours){
		
		$request= "SELECT n.email FROM newsletter n LEFT JOIN formulaire f ON n.email= f.email WHERE DATEDIFF(CURDATE(), n.created_at) = ".$nb_jours." AND f.email IS NULL ";
		$result= getResults($request);
		$emails=array();
		while ($row = $result -> fetch_array( MYSQLI_NUM)){
			
			$emails[]=$row[0];
		}
		return $emails;
}

//----------------------------------------------------------------------------------------

function Send_Email($Email){
	
	
	$sujet = "Email de test";
	$corp = "Salut ceci est un email de test envoyer par un script PHP";
	$headers = "From: email_de_l'entreprise@oiqia.com";
	if (mail($Email, $sujet, $corp, $headers)) {
		echo "Email envoyé avec succès  ...";
	} else {
		echo "echec...";
	}
}
/*$get=get_Email_List(4);
print_r(array_values($get));*/


//----------------------------------------------------------------------------------------

for ($i=0;$i<sizeof($jours);$i++){
	$nb_jours = $jours[$i];
	$emails=get_Email_List($nb_jours);
	for ($j=0;$j<sizeof($emails);$j++){
		Send_Email($emails[$j]);
	}
	
}

  
?>