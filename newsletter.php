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

					$conn = OpenCon();

				



					$result = mysqli_query($conn,"SELECT created_at,email FROM newsletter");
					while ($row = $result-> fetch_array(MYSQLI_NUM)) {
						printf('<tr bgcolor="#C0C0C0"><td>' .$row[0].'</td><td>'. $row[1].'</td>');
						echo '</tr>';
					}

		
		
 

				CloseCon($conn);
			?>
			</tbody>
		</table>
	</div>
</body>
</html>
