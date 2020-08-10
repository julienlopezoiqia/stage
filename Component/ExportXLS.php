<?php
//TODO: importer correctement / composer
	include '../vendor/phpoffice/phpexcel/Classes/PHPExcel.php';
	include '../Serveur/Config.php';

	$conn = OpenCon();
	
	
  
	$filename = "Liste_Newsletter_" . date('d-m-Y') . ".xls";

	
	$request = "SELECT created_at,email FROM newsletter WHERE created_at ORDER BY created_at DESC ";
	$result = mysqli_query($conn,$request);
	
	$phpExcel = new PHPExcel;

	$phpExcel->getDefaultStyle()->getFont()->setSize(12);
	$writer = PHPExcel_IOFactory::createWriter($phpExcel, "Excel5");
	$sheet = $phpExcel ->getActiveSheet();
	// Setting title of the sheet
	$sheet->setTitle('My product list');
	// Creating spreadsheet header
	$sheet ->getCell('A1')->setValue('Date');
	$sheet ->getCell('B1')->setValue('Email');
	
	$sheet->getColumnDimension('A')->setAutoSize(true);
	$sheet->getColumnDimension('B')->setAutoSize(true);
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
	
	CloseCon($conn);
	
?>

