<?php

	ini_set('display_errors',1);
	error_reporting(E_ALL);
	$from="lilybelhocine006@gmail.com";
	$to= "lilybelhocine06@gmail.com";
	$subject="Checking PHP mail";
	$message="sdfghjké";
	$headers= "From:".$from;
	
	if(mail($to, $subject, $message, $headers)){
		echo("Email successfully sent to". $to);
	}
	else{
		echo ("erreur d'envoie");
	}
   
?>