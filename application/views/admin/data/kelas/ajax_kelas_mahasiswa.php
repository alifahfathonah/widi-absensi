<?php 
	$i = 1 + $offset;
	foreach ($data_filtered as $mhs) {
?>
<tr>
	<th><?=$i++?></th>
	<td>
		<a href="javascript:void(0)" data-id="<?=$mhs->id?>" class="btn btn-fab btn-delete btn-danger rounded-circle btn-sm" title="Hapus">
			<i class="fas fa-trash" style="font-size: 10pt; position: relative; top: -9px; left: 1px;"></i>
		</a>
	</td>
	<td><?=$mhs->nim?></td>
    <td class="font-weight-bold"><?=$mhs->nama_lengkap?> (<?=$mhs->jenis_kelamin?>)</td>
    <td><?=$mhs->tempat_lahir?><?=(($mhs->tanggal_lahir != '0000-00-00') ? ', ' .$mhs->tanggal_lahir : '')?></td>
    <td><?=$mhs->no_hp?></td>
    <td><?=$mhs->email?></td>
    <td><?=$mhs->agama?></td>
    <td><?=$mhs->warga_negara?></td>
</tr>
<?php 
	}
?>