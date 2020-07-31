<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Newsletter</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
	</head> 
	
	
<body> 

	<div><?php include('navbar.php'); ?></div>
	<form  method="post" action="newsletter.php"><?php include('dates.php'); ?></form>
	
	<form id="XLS" align="right" action="ExportXLS.php" method="POST">
		
		<input id="create_excel" type="submit" class="btn btn-info" value="Export to Excel"/>
		
	</form>
	
	
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
	
					include 'CoBdd.php';

					if( isset($_POST["Debut"])and isset($_POST["Fin"])){
						$conn = OpenCon();
						$debut = $_POST["Debut"];
						$fin = $_POST["Fin"];
						
						$date_debut = '\''.$debut.'\'';
						$date_fin = '\''.$fin.'\'';
						$request = "SELECT created_at,email FROM newsletter WHERE created_at BETWEEN date_format(".$date_debut.",'%Y-%m-%d') AND date_format(".$date_fin.",'%Y-%m-%d') ORDER BY created_at DESC ";
						
						$result = mysqli_query($conn,$request);
						while ($row = $result-> fetch_array(MYSQL_NUM)) {
							printf('<tr bgcolor="#C0C0C0"><td>' .$row[0].'</td><td>'. $row[1].'</td>');
							echo '</tr>';
						}


						CloseCon($conn);
					}
					else{
						$conn = OpenCon();
						
						$request = "SELECT created_at,email FROM newsletter WHERE created_at ORDER BY created_at DESC ";
						
						$result = mysqli_query($conn,$request);
						while ($row = $result-> fetch_array(MYSQL_NUM)) {
							printf('<tr bgcolor="#C0C0C0"><td>' .$row[0].'</td><td>'. $row[1].'</td>');
							echo '</tr>';
						}


						CloseCon($conn);
						
					}
				?>
			</tbody>
		</table>
	</div>
</body>
</html>