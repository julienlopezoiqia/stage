<?php

	include '../vendor/phpoffice/phpexcel/Classes/PHPExcel.php';
	include 'DBManager.php';

	
	
	
	
	$request = "SELECT created_at,name,lastname,email,phone,agree FROM interested ORDER BY created_at DESC ";
	$result =getResults($request);
	
	function exportXLS($result){
		
		$filename = "Liste_Interested_" . date('d-m-Y') . ".xls";

		$phpExcel = new PHPExcel;

		$phpExcel->getDefaultStyle()->getFont()->setSize(12);
		$writer = PHPExcel_IOFactory::createWriter($phpExcel, "Excel5");
		$sheet = $phpExcel ->getActiveSheet();
	
	
	
		// Titre de la feuille
	
		$sheet->setTitle('My interested list');
	
	
		// Créer l'en-tête du tableau 
	
		$sheet ->getCell('A1')->setValue('Date');
		$sheet ->getCell('B1')->setValue('Nom');
		$sheet ->getCell('C1')->setValue('Prénom');
		$sheet ->getCell('D1')->setValue('Email');
		$sheet ->getCell('E1')->setValue('Téléphone');
		$sheet ->getCell('F1')->setValue('Agree');
	
		// 
		$sheet->getColumnDimension('A')->setAutoSize(true);
		$sheet->getColumnDimension('B')->setAutoSize(true);
		$sheet->getColumnDimension('C')->setAutoSize(true);
		$sheet->getColumnDimension('D')->setAutoSize(true);
		$sheet->getColumnDimension('E')->setAutoSize(true);
		$sheet->getColumnDimension('F')->setAutoSize(true);
		
		
		$row = 2; // 1-based index
		while($row_data = mysqli_fetch_assoc($result)) {
			$col = 0;
			foreach($row_data as $key=>$value) {
				$phpExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $value);
				$col++;
			}
			$row++;
		}

		header("Content-Disposition: attachment; filename=\"$filename\"");
		header("Content-Type: application/vnd.ms-excel");
		$writer->save('php://output');
		exit;
	
		
		
		
	}
	
	echo exportXLS($result);
	

	
?>

