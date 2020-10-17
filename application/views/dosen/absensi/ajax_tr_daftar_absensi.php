<?php 
	foreach ($data_filtered as $row) {
		$this->db->where('tanggal', $tanggal);
		$absensi = $this->AbsensiModel->single('mahasiswa_ambil_kelas_id', $row->id, 'object');
		$absensi_class = '';
		if ($absensi != '') {
			switch ($absensi->absen) {
				case 'h':
					$absensi_class = 'success';
					break;
				case 'i':
					$absensi_class = 'info';
					break;
				case 's':
					$absensi_class = 'warning';
					break;
				case 'a':
					$absensi_class = 'danger';
					break;
				default:
					$absensi_class = 'link';
					break;
			}
		}
?>
<tr>
	<td class="font-weight-bold"><?=$row->nama_lengkap?></td>
	<td><?=$row->jenis_kelamin?></td>
	<td><?=$row->tempat_lahir?>, <?=$row->tanggal_lahir?></td>
	<td>
		<a href="#" data-placement="left" title="Hadir" data-absen='h' data-id='<?=$row->id?>' class="btn btn-absen btn-<?=(($absensi_class == 'success') ? $absensi_class : 'link')?> btn-fab rounded-circle" style="width: 32px; height: 32px; min-width: 32px">
			<i class="fas fa-heading" style="font-size: 10pt; bottom: 7px; position: relative"></i>
		</a>
		<br/>
		<a href="#" data-placement="left" title="Ijin" data-absen='i' data-id='<?=$row->id?>' class="btn btn-absen btn-<?=(($absensi_class == 'info') ? $absensi_class : 'link')?> btn-fab rounded-circle" style="width: 32px; height: 32px; min-width: 32px">
			<i class="fas fa-info" style="font-size: 10pt; bottom: 7px; position: relative"></i>
		</a>
		<br/>
		<a href="#" data-placement="left" title="Sakit" data-absen='s' data-id='<?=$row->id?>' class="btn btn-absen btn-<?=(($absensi_class == 'warning') ? $absensi_class : 'link')?> btn-fab rounded-circle" style="width: 32px; height: 32px; min-width: 32px">
			<i class="fab fa-stripe-s" style="font-size: 10pt; bottom: 7px; position: relative"></i>
		</a>
		<br/>
		<a href="#" data-placement="left" title="Alpha" data-absen='a' data-id='<?=$row->id?>' class="btn btn-absen btn-<?=(($absensi_class == 'danger') ? $absensi_class : 'link')?> btn-fab rounded-circle" style="width: 32px; height: 32px; min-width: 32px">
			<i class="fas fa-font" style="font-size: 10pt; bottom: 7px; position: relative"></i>
		</a>
	</td>
</tr>
<?php 
	}
?>