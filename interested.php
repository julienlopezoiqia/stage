<!DOCTYPE html>
<?php
	include 'Serveur/interested.php';
	
?>
<html lang="fr">
	<head>
		<title>Interested</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
	</head> 
	
<body id ="interested"> 

	<div><?php include('Component/navbar.php'); ?></div>
	<div class ="container">
	<br>
	<br>
		<table align="left">
			<thead> 
				<tr bgcolor="#C0C0C0">
					<th width="350px">
						<form method="GET" action="interested.php ">
							<input type="search" id="search"  name="search" placeholder="Recherche..." />
							<input type="submit" value="Valider" />
						</form>
					</th>
				
					<th width="650px">
					<form  method="post" action="interested.php"><?php include('Component/dates.php'); ?></form>
					</th>
					
					
					<th width="250px">
						<form align="right" action="Serveur/Interested_ExportXLS.php" method="POST">
		
							<input id="create_excel" type="submit" class="btn btn-info" value="Export to Excel"/>
		
						</form>	
					</th>
					
					
					<th width="250px">
						<form align="right" action="interested.php" method="POST">
	
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
					
					$interested = get_list_interested();
					return $interested;
				?>	
				
				
			</tbody>
		</table>
	</div>
</body>
</html>