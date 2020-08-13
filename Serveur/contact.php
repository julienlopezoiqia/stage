<?php
include('DBManager.php');

//----------------------------------------------------------------------------------------
function get_contact()
	{
		//Si date début et fin renseignée
		if( isset($_POST["Debut"])and isset($_POST["Fin"])){
			$debut = $_POST["Debut"];
			$fin = $_POST["Fin"];
			return get_contact_by_date($debut,$fin );
		}
		elseif(isset($_GET['search']) ? '%'.$_GET['search'].'%' : '')
		{
			$search = htmlspecialchars($_GET['search']);
			return SearchBar_contact($search);
		}
		else
		{
		   return get_all_contact();
		}
		
	}   
	
//----------------------------------------------------------------------------------------

function get_contact_by_date($debut, $fin)
	{
		    //Si date début et fin renseignée
			$date_debut = '\''.$debut.'\'';
			$date_fin = '\''.$fin.'\'';
			$request = "SELECT created_at,email,nom,prenom,telephone,message FROM contact_form WHERE created_at BETWEEN date_format(".$date_debut.",'%Y-%m-%d') AND date_format(".$date_fin.",'%Y-%m-%d') ORDER BY created_at DESC ";
            $result = getResults($request);
			while ($row = $result -> fetch_array( MYSQLI_NUM)) {
						printf('<tr bgcolor="#C0C0C0"><td>'.$row[0].'</td><td>'. $row[2].'</td><td>'. $row[3].'</td><td>'. $row[1].'</td><td>'. $row[4].'</td><td>'. $row[5].'</td>');
						echo '</tr>';
					}
			return $result;
	}

//----------------------------------------------------------------------------------------

function get_all_contact()
	{
		$request = "SELECT created_at,email,nom,prenom,telephone,message FROM contact_form ORDER BY created_at DESC ";
		$result = getResults($request);
		
		while ($row = $result -> fetch_array( MYSQLI_NUM)) {
						printf('<tr bgcolor="#C0C0C0"><td>'.$row[0].'</td><td>'. $row[2].'</td><td>'. $row[3].'</td><td>'. $row[1].'</td><td>'. $row[4].'</td><td>'. $row[5].'</td>');
						echo '</tr>';
					}
		return $result;
	
	}   

//----------------------------------------------------------------------------------------

function SearchBar_contact($search)
	{

		
			$request = "SELECT * FROM contact_form where created_at like '%$search%'  OR nom like '%$search%' OR prenom like '%$search%'  OR email like '%$search%' OR telephone like '%$search%' OR message like '%$search%' ORDER BY created_at DESC";
			$result = getResults($request);
			$queryResult= mysqli_num_rows($result);
			if ($queryResult>0){
	
				while ($row = mysqli_fetch_assoc($result)) {
					
					echo "<div id='link' onClick='addText(\"".$row['email']."\");'>" ;
					printf('<tr bgcolor="#C0C0C0"><td>' . $row['created_at'].'</td><td>'. $row['nom'].'</td><td>'.$row['prenom'].'</td><td>'.$row['email'].'</td><td>'.$row['telephone'].'</td><td>'.$row['message'].'</td>'."</div>");  
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