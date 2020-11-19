<table class="table table-laporan table-striped border-0">
	<?php 
		foreach ($data_filter as $name => $value) {
	?>
	<tr>
		<th style="width: 150px"><?=$name?></th>
		<td>: <?=$value?></td>
	</tr>
	<?php 
		}
	?>
</table>
<table class="table table-laporan table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Program studi</th>
            <th>Dosen pengajar</th>
            <th>Mata kuliah</th>
            <th>Hari</th>
            <th>Waktu</th>
            <th>Semester</th>
            <th>Status kelas</th>
        </tr>
    </thead>
    <tbody>
<?php 
	$i = 1 + $offset;
	foreach ($data_filtered as $kelas) {
		$prodi = $this->ProgramStudiModel->single('id', $kelas->program_studi_id, 'object');
        $dosen = $this->DosenModel->single('id', $kelas->dosen_pengajar_id, 'object');
        $mk = $this->MataKuliahModel->single('id', $kelas->mata_kuliah_id, 'object');
?>
<tr>
	<th><?=$i++?></th>
    <td class="font-weight-bold"><?=$kelas->nama?></td>
    <td><?=(($prodi != '') ? $prodi->program_studi : '-')?></td>
    <td><?=(($dosen != '') ? $dosen->nama_lengkap : '-')?></td>
    <td><?=(($mk != '') ? $mk->mata_kuliah : '-')?></td>
    <td><?=$kelas->hari?></td>
    <td><?=$kelas->waktu?></td>
    <td><?=$kelas->semester?></td>
    <td><?=$kelas->status_kelas?></td>
</tr>
<?php 
	}
?>
    </tbody>
</table>