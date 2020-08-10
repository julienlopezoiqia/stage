<!DOCTYPE html>
<?php
	include 'Formulaire.php';
?>
<html lang="fr">
	<head>
		<title>Formulaire</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">	
		<link href="../css/bootstrap.css" rel="stylesheet">
		<link href="../css/style.css" rel="stylesheet">
		
	</head> 
	
	
<body> 
	
	
	<div><?php include('../Client/navbar.php'); ?></div>
	
	<div class ="scrollmenu">
	<br>
	<br>
		<table align="left">
			<thead> 
				<tr bgcolor="#C0C0C0">
					<th width="350px">
						<form method="GET" action="SearchBar_formulaire.php ">
							<input type="search" id="search"  name="search" placeholder="Recherche..." />
							<input type="submit" value="Valider" />
						</form>
					</th>
				
					<th width="450px">
					<form  method="post" action="formulaire.php"><?php include('../Client/dates.php'); ?></form>
					</th>
				
					<th width="350px">
						<form align="right" action="../formulaire.php" method="POST">
	
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
					$SearchBar = SearchBar_formulaire();
					return $SearchBar;
					
					
				?>
			
			
			</tbody>
		
		</table>
	
	
	
	
	
	</div>
</body>
</html>
		
</body>
</html>
<?php
function SearchBar_formulaire()
	{
		$conn = OpenCon();
		if(isset($_GET['search']) ? '%'.$_GET['search'].'%' : '')
		{
			$search = htmlspecialchars($_GET['search']);
			$request = "SELECT * FROM formulaire where nom like '%$search%'  OR prenom like '%$search%' OR adresse like '%$search%'  OR email like '%$search%' OR telephone like '%$search%' OR appartement like '%$search%' 
						OR numero like '%$search%' OR rue like '%$search%' OR code_postal like '%$search%' OR ville like '%$search%' OR type_logement like '%$search%' OR surface like '%$search%' OR chauffage like '%$search%'
						OR climatisation like '%$search%' OR access like '%$search%' OR porte like '%$search%' OR type_location like '%$search%' OR type_connexion like '%$search%' OR parking like '%$search%' 
						OR nuit_par_an like '%$search%' OR nombre_couchage like '%$search%' OR duree_moyenne like '%$search%' OR chiffre_affaire like '%$search%' OR created_at like '%$search%' OR actutarif like '%$search%'
						ORDER BY created_at DESC";
			$result = mysqli_query($conn,$request);
			$queryResult= mysqli_num_rows($result);
			if ($queryResult>0){
	
				while ($row = mysqli_fetch_assoc($result)) {
					
					if ($row["climatisation"]==1){
								
						$row["climatisation"]="Oui";
						
					}
					else{
								
					$row["climatisation"]="Non";
						
					}
					if ($row["parking"]==1){
								
					$row["parking"]="Oui";
					}
					else{
						
						$row["parking"]="Non";
					}
					echo "<div id='link' onClick='addText(\"".$row['email']."\");'>" ;
					printf('<tr bgcolor="#C0C0C0"><td>' . $row['nom'].'</td><td>'. $row['prenom'].'</td><td>'.$row['adresse'].'</td><td>'.$row['email'].'</td><td>'.$row['telephone'].'</td><td>'.$row['appartement'].'</td><td>'
							.$row['numero'].'</td><td>'.$row['rue'].'</td><td>'.$row['code_postal'].'</td><td>'.$row['ville'].'</td><td>'.$row['type_logement'].'</td><td>'.$row['surface'].'</td><td>'.$row['chauffage'].'</td><td>'
							.$row['climatisation'].'</td><td>'.$row['access'].'</td><td>'.$row['porte'].'</td><td>'.$row['type_location'].'</td><td>'.$row['type_connexion'].'</td><td>'.$row['parking'].'</td><td>'
							.$row['nuit_par_an'].'</td><td>'.$row['nombre_couchage'].'</td><td>'.$row['duree_moyenne'].'</td><td>'.$row['chiffre_affaire'].'</td><td>'.$row['created_at'].'</td><td>'.$row['actutarif'].'</td>'."</div>");  
					echo '</tr>';
				}
			}
			else
			{
				echo" Pas de resultat! </br>";
				echo"<b>Astuce:</b></br>-Faites des recherche uniquement de 'nom ou prénom ou adresse email ou numero de téléphone,...'. Si vous collez le nom et prénom par exemple, ça ne va pas marcher.
					</br>-Si vous effectuez une recherche sur les demandes acceptées, il faudra écrire '1' pour trouver celles accéptées et '0' pour celles refusées.";
			}
		}
		
	
	CloseCon($conn);	
}

?>
