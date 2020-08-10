<!DOCTYPE html>
<?php
	include 'interested.php';
	
?>
<html lang="fr">
	<head>
		<title>Interested</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<link href="../Client/css/bootstrap.css" rel="stylesheet">
		<link href="../Client/css/style.css" rel="stylesheet">
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
						<form method="GET" action="SearchBar_interested.php ">
							<input type="search" id="search"  name="search" placeholder="Recherche..." />
							<input type="submit" value="Valider" />
						</form>
					</th>
				
					<th width="450px">
					<form  method="post" action="interested.php"><?php include('../Client/dates.php'); ?></form>
					</th>
				
					<th width="350px">
						<form  align="right" action="../Client/interested.php" method="POST">
	
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
					<th width="150px">Nom</th>
					<th width="150px">Prénom</th>
					<th width="150px">Email</th>
					<th width="150px">Tel</th>
					<th width="150px">Agree</th>
					
				</tr>
			</thead>
			<tbody>
				<?php
					
					$SearchBar = SearchBar_interested();
					return $SearchBar;
					
				?>	
				
				
			</tbody>
		</table>
	</div>
</body>
</html>

<?php
function SearchBar_interested()
	{
		$conn = OpenCon();
		if(isset($_GET['search']) ? '%'.$_GET['search'].'%' : '')
		{
			$search = htmlspecialchars($_GET['search']);
			$request = "SELECT * FROM interested where created_at like '%$search%'  OR name like '%$search%' OR lastname like '%$search%'  OR email like '%$search%' OR phone like '%$search%' OR agree like '%$search%' ORDER BY created_at DESC";
			$result = mysqli_query($conn,$request);
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
		}
		
	
	CloseCon($conn);	
}

?>