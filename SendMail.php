<?php
include('/Serveur/SendMail.php');

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
	
	<br>
		<table class="table table-bordered">
			<thead>
				<tr bgcolor='#EAEDED'><th>Email</th></tr>
			</thead>
			<thead>
				<tbody>
					<?php
						$emails=get_Emails_List();
						for ($i=0;$i<sizeof($emails);$i++){
							echo "<tr bgcolor='#EAEDED'><td> ".$emails[$i]."</td></tr>";
						}
					
					
		
  
					?>
				</tbody>
			</thead>
		</table>
		
		<form  action="form.php" method="POST">
		
			<input id="send" type="submit" class="btn btn-info" value="Envoyer"/>
		
		</form>	
	</div>
</body>
</html>