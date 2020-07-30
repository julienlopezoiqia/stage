<?php
	
	
	include 'CoBdd.php';
	$conn = OpenCon();

	$result = mysqli_query($conn,"SELECT created_at,email FROM newsletter ORDER BY created_at DESC");
	$res = mysqli_num_rows($result);
	
	$filefound = true;
	$file_name = 'bdd_newsletter.xls';
	
	
	//Verifier si le fichier exite
	if (!file_exists($file_name)) { 
		$filefound = false;
	}
	
	//si le fichier existe déja, on le supprime 
	if($filefound){
		unlink($file_name);
		
	}
	//ouverture du fichier xls
	$myfile = fopen($file_name, "a")or die("Unable to open file!");
	
	
	fwrite($myfile,"Date".","."Email\n");
	while ($row = $result -> fetch_array( MYSQL_NUM)) {
		fwrite($myfile, $row[0].",". $row[1] ."\n");
		header("Location: newsletter.php");
	}
	
	fclose($myfile); 
	
	CloseCon($conn);
?>
