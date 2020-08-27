<?php
include('DBManager.php');
$jours= include('jours.config.php');

//----------------------------------------------------------------------------------------
	
function get_Email_List($nb_jours){
		
		$request= "SELECT i.email FROM interested i LEFT JOIN formulaire f ON i.email= f.email WHERE DATEDIFF(CURDATE(), i.created_at) = ".$nb_jours." AND f.email IS NULL ";
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
		
		echo "<br>Email envoyé avec succès à $Email " ;
	} else {
		echo "<br>echec d'envoi à $Email";
	}
}
/*$get=get_Email_List(8);
print_r(array_values($get));*/


//----------------------------------------------------------------------------------------

function get_Emails_List(){
	//global permet de declarer la variable $jours
	global $jours;
	$emails=array();
	for ($i=0;$i<sizeof($jours);$i++){
		$nb_jours = $jours[$i];
		
		
		$emails=array_merge ($emails, get_Email_List($nb_jours));
		
	}
	
	
	return $emails;

	
}
//----------------------------------------------------------------------------------------


function insert_relance($email,$relanceNum){
		$_email = '\''.$email.'\'';
		$request="INSERT INTO relance (email,Relance_number,Relance_date) VALUES(".$_email.",".$relanceNum.",now())";
		insertData($request);
		
	}
	
	
//----------------------------------------------------------------------------------------

/*function commit($conn){
	
	if (mysqli_commit($conn)){
		echo "Commit transaction ok";
		
	}
	else{
		echo "ko"; 
	}
	
	CloseCon($conn);
}*/

//------------------------insert data in bdd----------------------------------------------

function insertData($request)
 {
    //Connexion à la base de données
	$conn = OpenCon();
	
	if(mysqli_query($conn,$request)){
		printf("Insertion avec succès.\n");
		CloseCon($conn);
		
	}
	else{
		printf("erreur");
	}
	
   
   
}

	
//----------------------------------------------------------------------------------------



?>