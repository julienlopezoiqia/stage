

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

function relanceNum($email){
	$_email = '\''.$email.'\'';
	$request="SELECT MAX(Relance_number) FROM relance WHERE email=".$_email;
	$result= getResults($request);
	while ($row = $result -> fetch_array( MYSQLI_NUM)){	
			return $row[0];	
		}
	
	
}


//----------------------------------------------------------------------------------------

function insert_relance($email){
		$_email = '\''.$email.'\'';
		$relance_number = relanceNum($email)+1;
		
		$request="INSERT INTO relance (email,Relance_number,Relance_date) VALUES(".$_email.",".$relance_number.",now())";
		
		insertData($request);
		
	}


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