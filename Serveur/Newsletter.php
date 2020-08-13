<?php
include('DBManager.php');

//----------------------------------------------------------------------------------------
function get_Newsletter_List()
	{
		//Si date début et fin renseignée
		if( isset($_POST["Debut"])and isset($_POST["Fin"])){
			$debut = $_POST["Debut"];
			$fin = $_POST["Fin"];
			return get_Newsletter_List_by_date($debut,$fin );
		}
		elseif(isset($_GET['search']) ? '%'.$_GET['search'].'%' : '')
		{
			$search = htmlspecialchars($_GET['search']);
			return SearchBar_newsletter($search);
		}
		else
		{
		   return get_all_Newsletter_List();
		}
	}
	
//----------------------------------------------------------------------------------------

function get_Newsletter_List_by_date($debut, $fin)
	{
		
    		//Si date début et fin renseignée

						
			$date_debut = '\''.$debut.'\'';
			$date_fin = '\''.$fin.'\'';
			$request = "SELECT created_at,email FROM newsletter WHERE created_at BETWEEN date_format(".$date_debut.",'%Y-%m-%d') AND date_format(".$date_fin.",'%Y-%m-%d') ORDER BY created_at DESC";
						
			$result = getResults($request);
			while ($row = $result -> fetch_array( MYSQLI_NUM)) {
						printf('<tr bgcolor="#C0C0C0"><td>' .$row[0].'</td><td>'. $row[1].'</td>');
							echo '</tr>';
					}

			return $result;
					
		
		
	}   

//----------------------------------------------------------------------------------------

function get_all_Newsletter_List()
	{

		$request = "SELECT created_at,email FROM newsletter WHERE created_at ORDER BY created_at DESC ";
		$result = getResults($request);
		while ($row = $result -> fetch_array( MYSQLI_NUM)) {
						printf('<tr bgcolor="#C0C0C0"><td>' .$row[0].'</td><td>'. $row[1].'</td>');
							echo '</tr>';
					}
		
		return $result;
	}   

//----------------------------------------------------------------------------------------

function SearchBar_newsletter($search)
	{

			$request = "SELECT * FROM newsletter where created_at like '%$search%'  OR email like '%$search%' ORDER BY created_at DESC";
			$result = getResults($request);
			$queryResult= mysqli_num_rows($result);
			if ($queryResult>0){
	
				while ($row = mysqli_fetch_assoc($result)) {

					echo "<div id='link' onClick='addText(\"".$row['email']."\");'>" ;
					printf('<tr bgcolor="#C0C0C0"><td>' . $row['created_at'].'</td><td>'.$row['email'].'</td>'."</div>");  
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