<!DOCTYPE html>
<?php
	include 'Newsletter.php';

	?>
<html lang="fr">
	<head>
		<title>Newsletter</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<link href="../css/bootstrap.css" rel="stylesheet">
		<link href="../css/style.css" rel="stylesheet">
	</head> 
	
<body> 

	<div><?php include('../Client/navbar.php'); ?></div>
	<div class ="container">
	<br>
	<br>
		<table align="left">
			<thead> 
				<tr bgcolor="#C0C0C0">
					<th width="350px">
						<form method="GET" action="SearchBar_newsletter.php ">
							<input type="search" id="search"  name="search" placeholder="Recherche..." />
							<input type="submit" value="Valider" />
						</form>
					</th>
				
					<th width="450px">
					<form  method="post" action="Newsletter.php"><?php include('../Client/dates.php'); ?></form>
					</th>
				
					<th width="350px">
						<form align="right" action="../newsletter.php" method="POST">
	
							<input id="Refresh_Database" type="submit" class="btn btn-info" value="Refresh Database"/>
	
						</form>
					</th>
				</tr>
			</thead> 
		
		</table>
	</div>

	
	<div class ="container">
	<br>
	<br>
		<table  class = "table" align = "center" border ="1px">
			<thead> 
			
				<tr bgcolor="#C0C0C0">
					<th width="150px">Date</th>
					<th width="150px">Email</th>
					
				</tr>
			</thead>
			<tbody>
				<?php
					
					$SearchBar = SearchBar_newsletter();
					return $SearchBar;
					
				?>	

			</tbody>
		</table>
	</div>
</body>
</html>

<?php
function SearchBar_newsletter()
	{
		if(isset($_GET['search']) ? '%'.$_GET['search'].'%' : '')
		{
			$search = htmlspecialchars($_GET['search']);
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
		}
		
	}

?>