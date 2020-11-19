<?php 
    

    $tanggal_awal = new DateTime($tanggal_awal);
    $tanggal_akhir = new DateTime($tanggal_akhir);
    $tanggal_akhir->modify('+1 Day');

    $interval = new DateInterval('P1D');
    $range = new DatePeriod($tanggal_awal, $interval, $tanggal_akhir);

    $this->db->where('program_studi_id', $program_studi_id);
    $this->db->order_by('nama', 'asc');
    $data_kelas = $this->KelasModel->show(-1, -1, 'object');

    $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
    $sheetIndex = $spreadsheet->getIndex(
        $spreadsheet->getSheetByName('Worksheet')
    );
    $spreadsheet->removeSheetByIndex($sheetIndex);
    foreach ($data_kelas as $kelas) {
        // buat Spreadsheet
        // * Nama Sheet : Mata Kuliah
        // * A1 : "ABSENSI KULIAH ONLINE"
        // * A2 : [Nama Kelas]
        // * A3 : [Prodi]
        // * A4 : "Universitas Brawijaya"
        // * A5 : "Dosen : "
        // * C5 : [Nama Dosen]


        $prodi = $this->ProgramStudiModel->single('id', $kelas->program_studi_id, 'object');
        $dosen = $this->DosenModel->single('id', $kelas->dosen_pengajar_id, 'object');
        $mk = $this->MataKuliahModel->single('id', $kelas->mata_kuliah_id, 'object');

        $worksheet = $spreadsheet->createSheet();
        $worksheet->setTitle((($mk->mata_kuliah != '') ? $mk->mata_kuliah : '-'));

        $worksheet->getCellByColumnAndRow(1, 1)->getStyle()->getFont()->setBold(true);
        $worksheet->getCellByColumnAndRow(1, 1)->getStyle()->getFont()->setSize(15);
        $worksheet->setCellValueByColumnAndRow(1, 1, 'ABSENSI KULIAH ONLINE');

        $worksheet->setCellValueByColumnAndRow(1, 2, (($kelas->nama != '') ? strtoupper($kelas->nama) : '-'));
        $worksheet->setCellValueByColumnAndRow(1, 3, (($prodi->program_studi != '') ? strtoupper($prodi->program_studi) : '-'));
        $worksheet->setCellValueByColumnAndRow(1, 4, 'UNIVERSITAS BRAWIJAYA');
        $worksheet->setCellValueByColumnAndRow(1, 5, 'Dosen : ');
        $worksheet->setCellValueByColumnAndRow(3, 5, (($dosen->gelar_depan != '') ? $dosen->gelar_depan . ' ': '') . $dosen->nama_lengkap . (($dosen->gelar_belakang != '') ? ', ' . $dosen->gelar_belakang: ''));

        $worksheet->mergeCells('A1:F1');
        $worksheet->mergeCells('A2:F2');
        $worksheet->mergeCells('A3:F3');
        $worksheet->mergeCells('A3:F3');
        $worksheet->mergeCells('A4:F4');
        $worksheet->mergeCells('A5:B5');
        $worksheet->mergeCells('C5:H5');
        $this->db->where('kelas_id', $kelas->id);
        $this->db->order_by('nama_lengkap', 'asc');
        $data_mahasiswa = $this->RAmbilKelasModel->join_mahasiswa(-1, -1, 'object');


        $worksheet->setCellValueByColumnAndRow(1, 7, 'No.');
        $worksheet->setCellValueByColumnAndRow(2, 7, 'Nama');
        $worksheet->setCellValueByColumnAndRow(3, 7, 'NIM');
        $worksheet->setCellValueByColumnAndRow(4, 7, 'P/L');
        $worksheet->getStyle('A7:D7')->getFont()->setBold(true);
        $col = 5;
        foreach ($range as $date) {
            $worksheet->setCellValueByColumnAndRow($col, 7, $date->format('d-m-Y'));
            $worksheet->getCellByColumnAndRow($col, 7)->getStyle()->getFont()->setBold(true);
            $col++;
        }

        $row = 8;

        $no = 1;
        foreach ($data_mahasiswa as $mahasiswa) {
            $worksheet->setCellValueByColumnAndRow(1, $row, $no++);
            $worksheet->setCellValueByColumnAndRow(2, $row, ucwords(strtolower($mahasiswa->nama_lengkap)));
            $worksheet->setCellValueExplicitByColumnAndRow(3, $row, $mahasiswa->nim, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
            $worksheet->setCellValueByColumnAndRow(4, $row, strtoupper($mahasiswa->jenis_kelamin));

            $col = 5;
            foreach ($range as $date) {
                $this->db->where('mahasiswa_ambil_kelas_id', $mahasiswa->id);
                $absensi = $this->AbsensiModel->single('tanggal', $date->format('Y-m-d'), 'object');
                $absen = '-';
                $color = 'ffffffff';
                if ($absensi != '') {
                    switch ($absensi->absen) {
                        case 'h':
                            $absen = 'Hadir';
                            $color = 'eb80e683';
                            break;
                        case 'i':
                            $absen = 'Ijin';
                            $color = 'ad00bcd4';
                            break;
                        case 's':
                            $absen = 'Sakit';
                            $color = 'ffffda96';
                            break;
                        case 'a':
                            $absen = 'Alpha';
                            $color = 'e0f44336';
                            break;
                    }
                }
                else {
                    $absen = '-';
                    $color = 'ffffffff';
                }

                $worksheet->getCellByColumnAndRow($col, $row)->getStyle()->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB($color);
                $worksheet->setCellValueByColumnAndRow($col, $row, $absen);
                $col++;
            }

            $row++;
        }

        $worksheet->getDefaultColumnDimension()->setWidth(12);
        $worksheet->getColumnDimension('A')->setAutoSize(true);
        $worksheet->getColumnDimension('B')->setAutoSize(true);
        $worksheet->getColumnDimension('C')->setAutoSize(true);
        $worksheet->getColumnDimension('D')->setAutoSize(true);
        $filename = 'Absensi';

    }
    
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="'. $filename .'.xls"'); 
    header('Cache-Control: max-age=0');
    $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xls($spreadsheet);
    $writer->save('php://output');
?>