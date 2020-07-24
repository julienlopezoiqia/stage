<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Contacts</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
		<link href="css/bootstrap.min.css" rel="stylesheet">
	</head> 
<body> 

	<div><?php include('navbar.php'); ?></div>
	
	
	<div class ="contact-div">
	<br>
	<br>
		
		<table align = "center" border ="1px"  >
			<?php
				echo '<tr bgcolor="#C0C0C0" ><th width="150px">Date</th><th width="150px">Nom</th><th width="150px">Prénom</th><th width="150px">Email</th><th width="150px">Tel</th><th width="150px">Message</th></tr>';

				include 'CoBdd.php';

				$conn = OpenCon();

				



				$result = mysqli_query($conn,"SELECT created_at,email,nom,prenom,telephone,message FROM contact_form");
				while ($row = $result->fetch_array(MYSQLI_NUM)) {
					printf('<tr bgcolor="#C0C0C0"><td>'.$row[0].'</td><td>'. $row[2].'</td><td>'. $row[3].'</td><td>'. $row[1].'</td><td>'. $row[4].'</td><td>'. $row[5].'</td>');
					echo '</tr>';
				}

		
		
 

				CloseCon($conn);
			?>
		</table>
	</div>
</body>
</html>