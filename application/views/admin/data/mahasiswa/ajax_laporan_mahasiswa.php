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
            <th>nim</th>
            <th>nama lengkap</th>
            <th>TTL</th>
            <th>agama</th>
            <th>warga negara</th>
            <th>telepon <br>/ no hp</th>
            <th>program studi</th>
            <th>username</th>
        </tr>
    </thead>
    <tbody>
<?php 
	$i = 1 + $offset;
	foreach ($data_filtered as $mhs) {
		$prodi = $this->ProgramStudiModel->single('id', $mhs->program_studi_id, 'object');
?>
<tr>
	<th><?=$i++?></th>
	<td><?=$mhs->nim?></td>
    <td class="font-weight-bold"><?=$mhs->nama_lengkap?><?=(($mhs->jenis_kelamin != '') ? " ($mhs->jenis_kelamin)" : '')?></td>
    <td><?=$mhs->tempat_lahir?><?=(($mhs->tanggal_lahir != '0000-00-00') ? ', ' .$mhs->tanggal_lahir : '')?></td>
    <td><?=$mhs->agama?></td>
    <td><?=$mhs->warga_negara?></td>
    <td><?=(($mhs->telepon != '') ? $mhs->telepon : '-' )?> / <?=(($mhs->no_hp != '') ? $mhs->no_hp : '-' )?></td>
    <td><?=(($prodi != '') ? ucwords(strtolower($prodi->program_studi)) : '-' )?></td>
    <td><?=$mhs->username?></td>
</tr>
<?php 
	}
?>
    </tbody>
</table>