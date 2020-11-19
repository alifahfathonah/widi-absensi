<?php 
	$i = 1 + $offset;
	foreach ($data_filtered as $mhs) {
?>
<tr>
	<th><?=$i++?></th>
	<td>
		<a href="<?=site_url('admin/data/mahasiswa/edit?id=' . $mhs->nim)?>" class="btn btn-fab btn-edit btn-warning rounded-circle btn-sm" title="Edit">
			<i class="fas fa-edit" style="font-size: 10pt; position: relative; top: -9px; left: 1px;"></i>
		</a>
		<a href="<?=site_url('admin/data/mahasiswa/delete?id=' . $mhs->nim)?>" class="btn btn-fab btn-delete btn-danger rounded-circle btn-sm" title="Hapus">
			<i class="fas fa-trash" style="font-size: 10pt; position: relative; top: -9px; left: 1px;"></i>
		</a>
	</td>
	<td><?=$mhs->nim?></td>
    <td><?=$mhs->nama_lengkap?></td>
    <td><?=$mhs->tempat_lahir?><?=(($mhs->tanggal_lahir != '0000-00-00') ? ', ' .$mhs->tanggal_lahir : '')?></td>
    <td><?=$mhs->username?></td>
    <td><?=$mhs->warga_negara?></td>
    <td><?=$mhs->no_hp?></td>
    <td><?=$mhs->email?></td>
</tr>
<?php 
	}
?>