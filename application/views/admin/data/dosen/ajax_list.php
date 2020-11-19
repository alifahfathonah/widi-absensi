<?php 
	$i = 1 + $offset;
	foreach ($data_filtered as $dosen) {
?>
<tr>
	<th><?=$i++?></th>
	<td>
		<a href="<?=site_url('admin/data/dosen/edit?id=' . $dosen->id)?>" class="btn btn-fab btn-edit btn-warning rounded-circle btn-sm" title="Edit">
			<i class="fas fa-edit" style="font-size: 10pt; position: relative; top: -9px; left: 1px;"></i>
		</a>
		<a href="<?=site_url('admin/data/dosen/delete?id=' . $dosen->id)?>" class="btn btn-fab btn-delete btn-danger rounded-circle btn-sm" title="Hapus">
			<i class="fas fa-trash" style="font-size: 10pt; position: relative; top: -9px; left: 1px;"></i>
		</a>
	</td>
	<td><?=$dosen->nidn?> <?=$dosen->nip?></td>
    <td><?=$dosen->nama_lengkap?></td>
    <td><?=$dosen->tempat_lahir?><?=(($dosen->tanggal_lahir != '0000-00-00') ? ', ' .$dosen->tanggal_lahir : '')?></td>
    <td><?=$dosen->username?></td>
    <td><?=$dosen->no_ktp	?></td>
    <td><?=$dosen->no_hp?></td>
    <td><?=$dosen->email?></td>
</tr>
<?php 
	}
?>