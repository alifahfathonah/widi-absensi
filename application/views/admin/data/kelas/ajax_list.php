<?php 
	$i = 1 + $offset;
	foreach ($data_filtered as $kelas) {
		$prodi = $this->ProgramStudiModel->single('id', $kelas->program_studi_id, 'object');
		$dosen = $this->DosenModel->single('id', $kelas->dosen_pengajar_id, 'object');
		$mk = $this->MataKuliahModel->single('id', $kelas->mata_kuliah_id, 'object');
		$this->db->where('kelas_id', $kelas->id);
		$jumlah_anggota = $this->RAmbilKelasModel->show(-1, -1, 'count');
?>
<tr>
	<th><?=$i++?></th>
	<td>
		<a href="<?=site_url('admin/data/kelas/edit?id=' . $kelas->id)?>" class="btn btn-fab btn-edit btn-warning rounded-circle btn-sm" title="Edit">
			<i class="fas fa-edit" style="font-size: 10pt; position: relative; top: -9px; left: 1px;"></i>
		</a><br/>
		<a href="<?=site_url('admin/data/kelas/delete?id=' . $kelas->id)?>" class="btn btn-fab btn-delete btn-danger rounded-circle btn-sm" title="Hapus">
			<i class="fas fa-trash" style="font-size: 10pt; position: relative; top: -9px; left: 1px;"></i>
		</a><br/>
		<a href="<?=site_url('admin/data/kelas/detail?id=' . $kelas->id)?>" class="btn btn-fab btn-detail btn-info rounded-circle btn-sm" title="Lihat Info Kelas">
			<i class="fas fa-info-circle" style="font-size: 10pt; position: relative; top: -9px; left: 1px;"></i>
		</a><br/>
	</td>
	<th><?=$kelas->nama?></th>
	<td><?=(($prodi != '') ?  $prodi->program_studi : '-')?></td>
	<td><?=(($dosen != '') ? (($dosen->gelar_depan != '') ? $dosen->gelar_depan . ' ' : '') . $dosen->nama_lengkap : '-' . (($dosen->gelar_belakang != '') ? $dosen->gelar_belakang : ''))?></td>
	<td><?=(($mk != '') ?  $mk->mata_kuliah : '-')?></td>
	<td><?=$jumlah_anggota?> Orang</td>
	<td><?=$kelas->hari?></td>
	<td><?=$kelas->waktu?></td>
	<td><?=$kelas->semester?></td>
	<td><?=$kelas->status_kelas?></td>
</tr>
<?php 
	}
?>