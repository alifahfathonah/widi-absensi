<?php 
	$spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
	$worksheet = $spreadsheet->getActiveSheet();

	$worksheet->setCellValueByColumnAndRow(1, 1, 'LAPORAN DATA DOSEN');	
	$worksheet->getStyle('A1')->getFont()->setBold(true);
	$worksheet->getStyle('A1')->getFont()->setSize(12);
	$worksheet->mergeCells('A1:T1');

	$row = 3;
	$row++;

	$worksheet->setCellValueByColumnAndRow(1, $row, '#');
	$worksheet->setCellValueByColumnAndRow(2, $row, 'nidn');
	$worksheet->setCellValueByColumnAndRow(3, $row, 'nip');
	$worksheet->setCellValueByColumnAndRow(4, $row, 'nama_lengkap');
	$worksheet->setCellValueByColumnAndRow(5, $row, 'gelar_depan');
	$worksheet->setCellValueByColumnAndRow(6, $row, 'gelar_belakang');
	$worksheet->setCellValueByColumnAndRow(7, $row, 'tempat_lahir');
	$worksheet->setCellValueByColumnAndRow(8, $row, 'tanggal_lahir');
	$worksheet->setCellValueByColumnAndRow(9, $row, 'jenis_kelamin');
	$worksheet->setCellValueByColumnAndRow(10, $row, 'agama');
	$worksheet->setCellValueByColumnAndRow(11, $row, 'no_ktp');
	$worksheet->setCellValueByColumnAndRow(12, $row, 'no_telepon');
	$worksheet->setCellValueByColumnAndRow(13, $row, 'no_hp');
	$worksheet->setCellValueByColumnAndRow(14, $row, 'email');
	$worksheet->setCellValueByColumnAndRow(15, $row, 'username');
	$worksheet->setCellValueByColumnAndRow(16, $row, 'password');
	$worksheet->getStyle("A${row}:P${row}")->getFont()->setBold(true);
	$row++;



	$no = 1;
	foreach ($data_filtered as $dosen) {
		$worksheet->setCellValueByColumnAndRow(1, $row, $no++);
		$worksheet->setCellValueExplicitByColumnAndRow(2, $row, $dosen->nidn, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
		$worksheet->setCellValueExplicitByColumnAndRow(3, $row, $dosen->nip, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
		$worksheet->setCellValueByColumnAndRow(4, $row, $dosen->nama_lengkap);
		$worksheet->setCellValueByColumnAndRow(5, $row, $dosen->gelar_depan);
		$worksheet->setCellValueByColumnAndRow(6, $row, $dosen->gelar_belakang);
		$worksheet->setCellValueByColumnAndRow(7, $row, $dosen->tempat_lahir);
		$worksheet->setCellValueByColumnAndRow(8, $row, $dosen->tanggal_lahir);
		$worksheet->setCellValueByColumnAndRow(9, $row, $dosen->jenis_kelamin);
		$worksheet->setCellValueByColumnAndRow(10, $row, $dosen->agama);
		$worksheet->setCellValueByColumnAndRow(11, $row, $dosen->no_ktp);
		$worksheet->setCellValueByColumnAndRow(12, $row, $dosen->no_telepon);
		$worksheet->setCellValueByColumnAndRow(13, $row, $dosen->no_hp);
		$worksheet->setCellValueByColumnAndRow(14, $row, $dosen->email);
		$worksheet->setCellValueByColumnAndRow(15, $row, $dosen->username);
		$worksheet->setCellValueByColumnAndRow(16, $row, $dosen->password);
		$row++;
	}

	$worksheet->getColumnDimension('A')->setAutoSize(true);
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
	$worksheet->getColumnDimension('N')->setAutoSize(true);
	$worksheet->getColumnDimension('O')->setAutoSize(true);
	$worksheet->getColumnDimension('P')->setAutoSize(true);
	$worksheet->getColumnDimension('Q')->setAutoSize(true);
	$worksheet->getColumnDimension('R')->setAutoSize(true);
	$worksheet->getColumnDimension('S')->setAutoSize(true);
	$worksheet->getColumnDimension('T')->setAutoSize(true);


	$filename = 'laporan-data-dosen';

	header('Content-Type: application/vnd.ms-excel');
	header('Content-Disposition: attachment;filename="'. $filename .'.xls"'); 
	header('Cache-Control: max-age=0');
	$writer = new \PhpOffice\PhpSpreadsheet\Writer\Xls($spreadsheet);
	$writer->save('php://output');
?>