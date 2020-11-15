<?php 
	$no = 1;
	foreach ($data_filtered as $row) {
?>
<tr>
	<td><?=$no++?></td>
	<td><?=$row->nim?></td>
	<td><?=$row->nama_lengkap?> <strong>(<?=$row->jenis_kelamin?>)</strong></td>
	<td><?=$row->tempat_lahir?><?=(($row->tanggal_lahir != '0000-00-00') ? ', ' . date('d-F-Y', strtotime($row->tanggal_lahir)) : '')?></td>
</tr>
<?php 
	}
?>