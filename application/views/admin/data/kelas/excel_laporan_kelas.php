<?php 
	$spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
	$worksheet = $spreadsheet->getActiveSheet();

	$worksheet->setCellValueByColumnAndRow(1, 1, 'LAPORAN DATA KELAS');	
	$worksheet->getStyle('A1')->getFont()->setBold(true);
	$worksheet->getStyle('A1')->getFont()->setSize(12);
	$worksheet->mergeCells('A1:F1');

	$row = 3;
	$worksheet->mergeCells("A${row}:B${row}");
	$worksheet->mergeCells("C${row}:J${row}");
	$worksheet->getStyle("A${row}:I${row}")->getFont()->setBold(true);
	foreach ($data_filter as $name => $value) {
		$worksheet->setCellValueByColumnAndRow(1, $row ,$name);
		$worksheet->setCellValueByColumnAndRow(3, $row ,':' . $value);
		$row++;
	}

	$row++;
	$row++;


	$worksheet->setCellValueByColumnAndRow(1, $row, '#');
	$worksheet->setCellValueByColumnAndRow(2, $row, 'nama');
	$worksheet->setCellValueByColumnAndRow(3, $row, 'program_studi');
	$worksheet->setCellValueByColumnAndRow(4, $row, 'dosen_pengajar');
	$worksheet->setCellValueByColumnAndRow(5, $row, 'mata_kuliah');
	$worksheet->setCellValueByColumnAndRow(6, $row, 'hari');
	$worksheet->setCellValueByColumnAndRow(7, $row, 'waktu');
	$worksheet->setCellValueByColumnAndRow(8, $row, 'semester');
	$worksheet->setCellValueByColumnAndRow(9, $row, 'status_kelas');
	$worksheet->getStyle("A${row}:M${row}")->getFont()->setBold(true);
	$row++;
	$no = 1;

	foreach ($data_filtered as $kelas) {
		$prodi = $this->ProgramStudiModel->single('id', $kelas->program_studi_id, 'object');
        $dosen = $this->DosenModel->single('id', $kelas->dosen_pengajar_id, 'object');
        $mk = $this->MataKuliahModel->single('id', $kelas->mata_kuliah_id, 'object');

    	
    	
    	
		$worksheet->setCellValueByColumnAndRow(1, $row, $no++);
		$worksheet->setCellValueByColumnAndRow(2, $row, $kelas->nama);
		$worksheet->setCellValueByColumnAndRow(3, $row, (($prodi != '') ? $prodi->program_studi : '-'));
		$worksheet->setCellValueByColumnAndRow(4, $row, (($dosen != '') ? $dosen->nama_lengkap : '-'));
		$worksheet->setCellValueByColumnAndRow(5, $row, (($mk != '') ? $mk->mata_kuliah : '-'));
		$worksheet->setCellValueByColumnAndRow(6, $row, $kelas->hari);
		$worksheet->setCellValueByColumnAndRow(7, $row, $kelas->waktu);
		$worksheet->setCellValueByColumnAndRow(8, $row, $kelas->semester);
		$worksheet->setCellValueByColumnAndRow(9, $row, $kelas->status_kelas);
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


	$filename = 'laporan-data-kelas';

	header('Content-Type: application/vnd.ms-excel');
	header('Content-Disposition: attachment;filename="'. $filename .'.xls"'); 
	header('Cache-Control: max-age=0');
	$writer = new \PhpOffice\PhpSpreadsheet\Writer\Xls($spreadsheet);
	$writer->save('php://output');
?>