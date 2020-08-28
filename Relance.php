<?php
include('Serveur/SendMail.php');
$jours= include('/Serveur/jours.config.php');
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>	SendMail </title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/styles.css" rel="stylesheet">
	</head> 
<body> 
	
	
	<div class="email-div">
		<?php	
		

			function Send_Email($Email){
				$sujet = "Email de test";
				$corp = "Salut ceci est un email de test envoyer par un script PHP";
				$headers = "From: email_de_l'entreprise@oiqia.com";
				if (mail($Email, $sujet, $corp, $headers)) {
		
				echo "<br>Email envoyé avec succès à $Email " ;
				} 
				else {
				echo "<br>echec d'envoi à $Email";
				}
			}
			
			function relance($email){
				//envoi de mail
				Send_Email($email);
				//Mise à jour de la table relance
				insert_relance($email);
				
				
			}


//----------------------------------------------------------------------------------------
	
			for ($i=0;$i<sizeof($jours);$i++){
			$nb_jours = $jours[$i];
			$emails=get_Email_List($nb_jours);
				for ($j=0;$j<sizeof($emails);$j++){
					relance($emails[$j]);
				}
	
			}

		?>
		<br>
		
		<input type="button" value="Retour" onclick="self.location.href='SendMail.php'" >
		
	</div>
</body>
</html>