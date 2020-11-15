<?php 
	$i = 1;
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
	<th><?=$i++?></th>
	<td class="font-weight-bold"><?=$row->nama_lengkap?> (<?=$row->jenis_kelamin?>)</td>
	<td class="d-none d-sm-block"><?=$row->tempat_lahir?><?=(($row->tanggal_lahir != '0000-00-00') ? '<br/>' .date('d-F-Y', strtotime($row->tanggal_lahir)) : '-' )?></td>
	<td>
		<a href="#" data-placement="left" title="Hadir" data-absen='h' data-id='<?=$row->id?>' class="btn btn-absen btn-<?=(($absensi_class == 'success') ? $absensi_class : 'link')?> btn-fab rounded-circle" style="width: 32px; height: 32px; min-width: 32px">
			<i class="fas fa-heading" style="font-size: 10pt; bottom: 7px; position: relative"></i>
		</a>
		<a href="#" data-placement="left" title="Ijin" data-absen='i' data-id='<?=$row->id?>' class="btn btn-absen btn-<?=(($absensi_class == 'info') ? $absensi_class : 'link')?> btn-fab rounded-circle" style="width: 32px; height: 32px; min-width: 32px">
			<i class="fas fa-info" style="font-size: 10pt; bottom: 7px; position: relative"></i>
		</a>
		<a href="#" data-placement="left" title="Sakit" data-absen='s' data-id='<?=$row->id?>' class="btn btn-absen btn-<?=(($absensi_class == 'warning') ? $absensi_class : 'link')?> btn-fab rounded-circle" style="width: 32px; height: 32px; min-width: 32px">
			<i class="fab fa-stripe-s" style="font-size: 10pt; bottom: 7px; position: relative"></i>
		</a>
		<a href="#" data-placement="left" title="Alpha" data-absen='a' data-id='<?=$row->id?>' class="btn btn-absen btn-<?=(($absensi_class == 'danger') ? $absensi_class : 'link')?> btn-fab rounded-circle" style="width: 32px; height: 32px; min-width: 32px">
			<i class="fas fa-font" style="font-size: 10pt; bottom: 7px; position: relative"></i>
		</a>
	</td>
	<td>
		<?php 
			if ($absensi != '') {
				if ($absensi->keterangan == '') {
		?>
		<button type="button" class="btn btn-info btn-sm btn-tambah-keterangan" data-id='<?=$absensi->id?>' data-toggle='popover'>
			<i class="fas fa-plus"></i>
			Tambah Keterangan
		</button>
		<?php
				}
				else {
		?>
		<button class="btn btn-warning btn-fab btn-sm rounded-circle btn-edit-keterangan" data-keterangan='<?=$absensi->keterangan?>' data-id='<?=$absensi->id?>' data-toggle='tooltip' title="Edit keterangan"><i class="fas fa-edit" style="top: -9px; left: 1px; font-size: 10pt; position: relative;"></i></button>
		<span class="mo-keterangan" data-toggle='popover' data-container='body' data-placement='top' data-content='<?=$absensi->keterangan?>'><?=substr($absensi->keterangan, 0, 50)?><?=((strlen($absensi->keterangan) > 50) ? '...' : '')?></span>
		<?php 
				}
			}
		?>
	</td>
</tr>
<?php 
	}
?>