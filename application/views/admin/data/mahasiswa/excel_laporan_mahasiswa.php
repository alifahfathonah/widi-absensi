<?php 
	$spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
	$worksheet = $spreadsheet->getActiveSheet();

	$worksheet->setCellValueByColumnAndRow(1, 1, 'LAPORAN DATA MAHASISWA');	
	$worksheet->getStyle('A1')->getFont()->setBold(true);
	$worksheet->getStyle('A1')->getFont()->setSize(12);
	$worksheet->mergeCells('A1:F1');

	$row = 3;
	$worksheet->mergeCells("A${row}:B${row}");
	$worksheet->mergeCells("C${row}:J${row}");
	$worksheet->getStyle("A${row}:J${row}")->getFont()->setBold(true);
	foreach ($data_filter as $name => $value) {
		$worksheet->setCellValueByColumnAndRow(1, $row ,$name);
		$worksheet->setCellValueByColumnAndRow(3, $row ,':' . $value);
		$row++;
	}

	$row++;
	$row++;

	$worksheet->setCellValueByColumnAndRow(1, $row, '#');
	$worksheet->setCellValueByColumnAndRow(2, $row, 'NIM');
	$worksheet->setCellValueByColumnAndRow(3, $row, 'Nama Lengkap');
	$worksheet->setCellValueByColumnAndRow(4, $row, 'Tempat Lahir');
	$worksheet->setCellValueByColumnAndRow(5, $row, 'Tanggal Lahir');
	$worksheet->setCellValueByColumnAndRow(6, $row, 'Agama');
	$worksheet->setCellValueByColumnAndRow(7, $row, 'Warga Negara');
	$worksheet->setCellValueByColumnAndRow(8, $row, 'No Telepon');
	$worksheet->setCellValueByColumnAndRow(9, $row, 'No HP');
	$worksheet->setCellValueByColumnAndRow(10, $row, 'Email');
	$worksheet->setCellValueByColumnAndRow(11, $row, 'Program Studi');
	$worksheet->setCellValueByColumnAndRow(12, $row, 'Username');
	$worksheet->setCellValueByColumnAndRow(13, $row, 'Password');
	$worksheet->getStyle("A${row}:M${row}")->getFont()->setBold(true);
	$row++;
	$no = 1;
	foreach ($data_filtered as $mhs) {
		$prodi = $this->ProgramStudiModel->single('id', $mhs->program_studi_id, 'object');
		$worksheet->setCellValueByColumnAndRow(1, $row, $no++);
		$worksheet->setCellValueExplicitByColumnAndRow(2, $row, $mhs->nim, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
		$worksheet->setCellValueByColumnAndRow(3, $row, $mhs->nama_lengkap);
		$worksheet->setCellValueByColumnAndRow(4, $row, $mhs->tempat_lahir);
		$worksheet->setCellValueByColumnAndRow(5, $row, $mhs->tanggal_lahir);
		$worksheet->setCellValueByColumnAndRow(6, $row, $mhs->agama);
		$worksheet->setCellValueByColumnAndRow(7, $row, $mhs->warga_negara);
		$worksheet->setCellValueByColumnAndRow(8, $row, $mhs->telepon);
		$worksheet->setCellValueByColumnAndRow(9, $row, $mhs->no_hp);
		$worksheet->setCellValueByColumnAndRow(10, $row, $mhs->email);
		$worksheet->setCellValueByColumnAndRow(11, $row, (($prodi != '') ? $prodi->program_studi : '-'));
		$worksheet->setCellValueByColumnAndRow(12, $row, $mhs->username);
		$worksheet->setCellValueByColumnAndRow(13, $row, $mhs->password);
		$row++;
	}

	$worksheet->getColumnDimension('B')->setAutoSize(true);
	$worksheet->getColumnDimension('C')->setAutoSize(true);
	$worksheet->getColumnDimension('D')->setAutoSize(true);
	$worksheet->getColumnDimension('E')->setAutoSize(true);
	$worksheet->getColumnDimension('F')->setAutoSize(true);
	$worksheet->getColumnDimension('G')->setAutoSize(true);
	$worksheet->getColumnDimension('H')->setAutoSize(true);
	$worksheet->getColumnDimension('I')->setAutoSize(true);
	$worksheet->getColumnDimension('J')->setAutoSize(true);
	$worksheet->getColumnDimension('K')->setAutoSize(true);
	$worksheet->getColumnDimension('L')->setAutoSize(true);
	$worksheet->getColumnDimension('M')->setAutoSize(true);


	$filename = 'laporan-data-mahasiswa';

	header('Content-Type: application/vnd.ms-excel');
	header('Content-Disposition: attachment;filename="'. $filename .'.xls"'); 
	header('Cache-Control: max-age=0');
	$writer = new \PhpOffice\PhpSpreadsheet\Writer\Xls($spreadsheet);
	$writer->save('php://output');
?>