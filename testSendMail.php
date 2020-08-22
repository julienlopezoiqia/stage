
<?php
include('Serveur/DBManager.php');
	
	
	
function get_Email_List(){
		
		$request= "SELECT * FROM newsletter n LEFT JOIN formulaire f ON n.email= f.email WHERE DATEDIFF(CURDATE(), n.created_at)>2 AND f.email IS NULL ORDER BY n.created_at DESC";
		$result= getResults($request);
		while ($row = $result -> fetch_array( MYSQLI_NUM)) {
						printf('<tr bgcolor="#C0C0C0"><td>' .$row[1].'</td><td>'. $row[2].'</td> <br>');
							echo '</tr>';
					}

			return $result;
	}
$EList = get_Email_List();
return $EList;




function Send_Email($EList){
		
		ini_set('display_errors',1);
		error_reporting(E_ALL);
		$from="lilybelhocine006@gmail.com";
		$subject="Checking PHP mail";
		$message="sdfghjké";
		$headers= "From:".$from;
	
		if(mail($EList, $subject, $message, $headers)){
			echo("Email successfully sent");
		}
		else{
			echo ("erreur d'envoie");
		}
   
}
$SEmail=Send_Email_List();
return $SEmail;

	
?>