<?php
include('DBManager.php');

//----------------------------------------------------------------------------------------
function get_Formulaire_data()
	{
		//Si date début et fin renseignée
		if( isset($_POST["Debut"])and isset($_POST["Fin"])){
			$debut = $_POST["Debut"];
			$fin = $_POST["Fin"];
			return get_Formulaire_data_by_date($debut,$fin );
		}
		elseif(isset($_GET['search']) ? '%'.$_GET['search'].'%' : '')
		{
			$search = htmlspecialchars($_GET['search']);
			return SearchBar_formulaire($search);
		}
		else{ //Aucune date n'est renseignée
			return get_all_Formulaire_data();
		}
	}   
	
//----------------------------------------------------------------------------------------

function get_Formulaire_data_by_date($debut, $fin)
	{

		//Si date début et fin renseignée	

			$date_debut = '\''.$debut.'\'';
			$date_fin = '\''.$fin.'\'';
			$request = "SELECT nom, prenom ,adresse, email,telephone, appartement,numero,rue,code_postal,ville,type_logement,surface,chauffage,climatisation,access,porte,type_location,type_connexion,parking,nuit_par_an,nombre_couchage,duree_moyenne,chiffre_affaire,created_at,actutarif FROM formulaire  WHERE created_at BETWEEN date_format(".$date_debut.",'%Y-%m-%d') AND date_format(".$date_fin.",'%Y-%m-%d') ORDER BY created_at DESC ";
			$result =  getResults($request);
			while ($row = $result -> fetch_array( MYSQLI_NUM)) {
							if ($row[13]==1)
							{
								
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
			return $result;

	}   

//----------------------------------------------------------------------------------------

function get_all_Formulaire_data()
	{

		$request = "SELECT nom, prenom ,adresse, email,telephone, appartement,numero,rue,code_postal,ville,type_logement,surface,chauffage,climatisation,access,porte,type_location,type_connexion,parking,nuit_par_an,nombre_couchage,duree_moyenne,chiffre_affaire,created_at,actutarif FROM formulaire ORDER BY created_at DESC ";
		$result = getResults($request);
		while ($row = $result -> fetch_array( MYSQLI_NUM)) {
							if ($row[13]==1)
							{
								
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
		return $result;
	}   


//----------------------------------------------------------------------------------------

function SearchBar_formulaire($search)
	{
		
			$request = "SELECT * FROM formulaire where nom like '%$search%'  OR prenom like '%$search%' OR adresse like '%$search%'  OR email like '%$search%' OR telephone like '%$search%' OR appartement like '%$search%' 
						OR numero like '%$search%' OR rue like '%$search%' OR code_postal like '%$search%' OR ville like '%$search%' OR type_logement like '%$search%' OR surface like '%$search%' OR chauffage like '%$search%'
						OR climatisation like '%$search%' OR access like '%$search%' OR porte like '%$search%' OR type_location like '%$search%' OR type_connexion like '%$search%' OR parking like '%$search%' 
						OR nuit_par_an like '%$search%' OR nombre_couchage like '%$search%' OR duree_moyenne like '%$search%' OR chiffre_affaire like '%$search%' OR created_at like '%$search%' OR actutarif like '%$search%'
						ORDER BY created_at DESC";
			$result = getResults($request);
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
		
		
		return $queryResult;
}
?>