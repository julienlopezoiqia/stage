<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Formulaire</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">	
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
		
	</head> 
	
	
<body> 
	
	
	<div><?php include('navBar.php'); ?></div>
	<form  method="post" action="formulaire.php"><?php include('dates.php'); ?></form>
	
	
	<div class="scrollmenu">
	<br>
	<br>
		<table align = "center" border ="1px" id="scrollHorizontal" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
		
			<thead > 
			
				<tr bgcolor="#C0C0C0">
					<th width="150px">Nom</th>
					<th width="150px">Prenom</th>
					<th width="150px">Adresse</th>
					<th width="150px">Email</th>
					<th width="150px">Telephone</th>
					<th width="150px">Appartement</th>
					<th width="150px">Numéro</th>
					<th width="150px">Rue</th>
					<th width="150px">Code_Postal</th>
					<th width="150px">Ville</th>
					<th width="150px">Type_logement</th>
					<th width="150px">Surface</th>
					<th width="150px">Chauffage</th>
					<th width="150px">Climatisation</th>
					<th width="150px">Access</th>
					<th width="150px">Porte</th>
					<th width="150px">Type_location</th>
					<th width="150px">type_connexion</th>
					<th width="150px">Parking</th>
					<th width="150px">Nuit_par_an</th>
					<th width="150px">Nombre_cauchage</th>
					<th width="150px">Durée_moyenne</th>
					<th width="150px">Chiffre_affaire</th>
					<th width="150px">Created_at</th>
					<th width="150px">Actutarif</th>
					
					
				</tr>
			</thead>
			
			
			<tbody>
				<?php
					include 'CoBdd.php';
					
					
					
					if( isset($_POST["Debut"])and isset($_POST["Fin"])){
						$conn = OpenCon();
						$debut = $_POST["Debut"];
						$fin = $_POST["Fin"];
						
						$date_debut = '\''.$debut.'\'';
						$date_fin = '\''.$fin.'\'';
						$request = "SELECT nom, prenom ,adresse, email,telephone, appartement,numero,rue,code_postal,ville,type_logement,surface,chauffage,climatisation,access,porte,type_location,type_connexion,parking,nuit_par_an,nombre_couchage,duree_moyenne,chiffre_affaire,created_at,actutarif FROM formulaire  WHERE created_at BETWEEN date_format(".$date_debut.",'%Y-%m-%d') AND date_format(".$date_fin.",'%Y-%m-%d') ORDER BY created_at DESC ";
						
						$result = mysqli_query($conn,$request);
						while ($row = $result-> fetch_array( MYSQLI_NUM)) {
						
							if ($row[13]==1){
								
								$row[13]="Oui";
						
							}
							else{
								
								$row[13]="Non";
						
							}
							if ($row[18]==1){
								
								$row[18]="Oui";
							}
							else{
						
								$row[18]="Non";
							}
							printf('<tr bgcolor="#C0C0C0"><td>'.$row[0].'</td><td>'. $row[1].'</td><td>'. $row[2].'</td><td>'. $row[3].'</td><td>'. $row[4].'</td><td>'. $row[5].'</td><td>'. $row[6].'</td><td>'. $row[7].'</td><td>'. $row[8].'</td><td>'. $row[9].'</td><td>'. $row[10].'</td><td>'. $row[11].'</td><td>'. $row[12].'</td><td>'. $row[13].'</td><td>'. $row[14].'</td><td>'. $row[15].'</td><td>'. $row[16].'</td><td>'. $row[17].'</td><td>'. $row[18].'</td><td>'. $row[19].'</td><td>'. $row[20].'</td><td>'. $row[21].'</td><td>'. $row[22].'</td><td>'. $row[23].'</td><td>'. $row[24].'</td>');
							echo '</tr>';
						}

		
						CloseCon($conn);
					}
					else{
						$conn = OpenCon();
						$request = "SELECT nom, prenom ,adresse, email,telephone, appartement,numero,rue,code_postal,ville,type_logement,surface,chauffage,climatisation,access,porte,type_location,type_connexion,parking,nuit_par_an,nombre_couchage,duree_moyenne,chiffre_affaire,created_at,actutarif FROM formulaire ORDER BY created_at DESC ";
						
						$result = mysqli_query($conn,$request);
						while ($row = $result-> fetch_array( MYSQLI_NUM)) {
						
							if ($row[13]==1){
								
								$row[13]="Oui";
						
							}
							else{
								
								$row[13]="Non";
						
							}
							if ($row[18]==1){
								
								$row[18]="Oui";
							}
							else{
						
								$row[18]="Non";
							}
							printf('<tr bgcolor="#C0C0C0"><td>'.$row[0].'</td><td>'. $row[1].'</td><td>'. $row[2].'</td><td>'. $row[3].'</td><td>'. $row[4].'</td><td>'. $row[5].'</td><td>'. $row[6].'</td><td>'. $row[7].'</td><td>'. $row[8].'</td><td>'. $row[9].'</td><td>'. $row[10].'</td><td>'. $row[11].'</td><td>'. $row[12].'</td><td>'. $row[13].'</td><td>'. $row[14].'</td><td>'. $row[15].'</td><td>'. $row[16].'</td><td>'. $row[17].'</td><td>'. $row[18].'</td><td>'. $row[19].'</td><td>'. $row[20].'</td><td>'. $row[21].'</td><td>'. $row[22].'</td><td>'. $row[23].'</td><td>'. $row[24].'</td>');
							echo '</tr>';
						}

		
						CloseCon($conn);
						
					}
					
				?>
			
			
			</tbody>
		
		</table>
	
	
	
	
	
	</div>
</body>
</html>
	
	
	
</body>
</html>