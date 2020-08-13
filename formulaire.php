<!DOCTYPE html>
<?php
	include 'Serveur/Formulaire.php';
?>
<html lang="fr">
	<head>
		<title>Formulaire</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">	
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
		
	</head> 
	
	
<body id ="formulaire"> 
	
	
	<div><?php include('Component/navbar.php'); ?></div>
	
	<div class ="scrollmenu">
	<br>
	<br>
		<table align="left">
			<thead> 
				<tr bgcolor="#C0C0C0">
					<th width="350px">
						<form method="GET" action="formulaire.php ">
							<input type="search" id="search"  name="search" placeholder="Recherche..." />
							<input type="submit" value="Valider" />
						</form>
					</th>
				
					<th width="450px">
					<form  method="post" action="formulaire.php"><?php include('Component/dates.php'); ?></form>
					</th>
				
					<th width="350px">
						<form align="right" action="formulaire.php" method="POST">
	
							<input id="Refresh_Database" type="submit" class="btn btn-info" value="Refresh Database"/>
	
						</form>
					</th>
				</tr>
			</thead> 
		
		</table>
	</div>
	
	
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
					$form = get_Formulaire_data();
					return $form;
					
					
				?>
			
			
			</tbody>
		
		</table>
	
	
	
	
	
	</div>
</body>
</html>
	
	
	
</body>
</html>