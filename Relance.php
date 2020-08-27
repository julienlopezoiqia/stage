<?php
include('Serveur/SendMail.php');
$jours= include('/Serveur/jours.config.php');

	
	
	
	for ($i=0;$i<sizeof($jours);$i++){
		$nb_jours = $jours[$i];
		$emails=get_Email_List($nb_jours);
		for ($j=0;$j<sizeof($emails);$j++){
			Send_Email($emails[$j]);
		
		}
	
	}

?>