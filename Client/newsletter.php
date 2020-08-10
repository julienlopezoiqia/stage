<!DOCTYPE html>
<?php
	include '../Serveur/Newsletter.php';
?>
<html lang="fr">
	<head>
		<title>Newsletter</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
	</head> 
	
	
<body> 

	<div><?php include('navbar.php'); ?></div>

	
	<div class ="container" >
	<br>
	<br>
		<table align="left">
			<thead> 
				<tr bgcolor="#C0C0C0">
					<th width="350px">
						<form method="GET" action="../Serveur/SearchBar_newsletter.php ">
							<input type="search" id="search"  name="search" placeholder="Recherche..." />
							<input type="submit" value="Valider" />
						</form>
					</th>
				
					<th width="650px">
					<form  method="post" action="newsletter.php"><?php include('dates.php'); ?></form>
					</th>
					
					<th width="250px">
						<form  align="right" action="ExportXLS.php" method="POST">
		
							<input id="create_excel" type="submit" class="btn btn-info" value="Export to Excel"/>
		
						</form>	
					</th>
					
					<th width="250px">
						<form  align="right" action="newsletter.php" method="POST">
	
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
				
					$Newsletter = get_Newsletter_List();
					while ($row = $Newsletter -> fetch_array( MYSQLI_NUM)) {
						printf('<tr bgcolor="#C0C0C0"><td>' .$row[0].'</td><td>'. $row[1].'</td>');
							echo '</tr>';
					}

					
						
				?>
			</tbody>
		</table>
	</div>
</body>
</html>