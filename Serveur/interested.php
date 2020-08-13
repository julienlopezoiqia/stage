<?php

include('DBManager.php');


//---------------------------------------------------------------------------------------

function get_list_interested()
	{
		//Si date début et fin renseignée
		if( isset($_POST["Debut"])and isset($_POST["Fin"])){
			$debut = $_POST["Debut"];
			$fin = $_POST["Fin"];
			return get_list_interested_by_date($debut,$fin );
		}
		elseif(isset($_GET['search']) ? '%'.$_GET['search'].'%' : '')
		{
			$search = htmlspecialchars($_GET['search']);
			return SearchBar_interested($search);
		}	
		else{ //Aucune date n'est renseignée
			return get_all_list_interested();
		}
	}   

//---------------------------------------------------------------------------------------

function get_list_interested_by_date($debut, $fin)
	{
		
		//Si date début et fin renseignée	

			$date_debut = '\''.$debut.'\'';
			$date_fin = '\''.$fin.'\'';
			$request = "SELECT created_at,name,lastname,email,phone,agree FROM interested WHERE created_at BETWEEN date_format(".$date_debut.",'%Y-%m-%d') AND date_format(".$date_fin.",'%Y-%m-%d') ORDER BY created_at DESC  ";
						
			$result = getResults($request);
			while ($row = $result -> fetch_array( MYSQLI_NUM)) {
						if ($row[5]==1){
								$row[5]="Oui";
							}
							else{
								$row[5]="Non";
							}
						printf('<tr bgcolor="#C0C0C0"><td>'.$row[0].'</td><td>'. $row[1].'</td><td>'. $row[2].'</td><td>'. $row[3].'</td><td>'. $row[4].'</td><td>'. $row[5].'</td>');
						echo '</tr>';
			}

			return $result;
					
		
		
	}   

//----------------------------------------------------------------------------------------

function get_all_list_interested()
	{
		$request = "SELECT created_at,name,lastname,email,phone,agree FROM interested ORDER BY created_at DESC ";
		$result = getResults($request);
		while ($row = $result -> fetch_array( MYSQLI_NUM)) {
						if ($row[5]==1){
								$row[5]="Oui";
							}
							else{
								$row[5]="Non";
							}
						printf('<tr bgcolor="#C0C0C0"><td>'.$row[0].'</td><td>'. $row[1].'</td><td>'. $row[2].'</td><td>'. $row[3].'</td><td>'. $row[4].'</td><td>'. $row[5].'</td>');
						echo '</tr>';
		}
		return $result;
	}   
	
	
//----------------------------------------------------------------------------------------	

function SearchBar_interested($search)
	{
		
			$request = "SELECT * FROM interested where created_at like '%$search%'  OR name like '%$search%' OR lastname like '%$search%'  OR email like '%$search%' OR phone like '%$search%' OR agree like '%$search%' ORDER BY created_at DESC";
			$result = getResults($request);
			$queryResult= mysqli_num_rows($result);
			if ($queryResult>0){
	
				while ($row = mysqli_fetch_assoc($result)) {
					if ($row["agree"]==1){
						$row["agree"]="Oui";
					}
					else{
						$row["agree"]="Non";
					}
					echo "<div id='link' onClick='addText(\"".$row['email']."\");'>" ;
					printf('<tr bgcolor="#C0C0C0"><td>' . $row['created_at'].'</td><td>'. $row['name'].'</td><td>'.$row['lastname'].'</td><td>'.$row['email'].'</td><td>'.$row['phone'].'</td><td>'.$row['agree'].'</td>'."</div>");  
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