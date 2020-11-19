<?php 
	$i = 1 + $offset;
	foreach ($data_filtered as $mhs) {
		$prodi = $this->ProgramStudiModel->single('id', $mhs->program_studi_id, 'object');
?>
<tr>
	<td><?=$mhs->nim?></td>
    <td><?=$mhs->nama_lengkap?></td>
    <td><?=$mhs->tempat_lahir?><?=(($mhs->tanggal_lahir != '0000-00-00') ? ', ' .$mhs->tanggal_lahir : '')?></td>
    <td><?=$mhs->no_hp?></td>
    <td><?=(($prodi != '') ? ucwords(strtolower($prodi->program_studi)) : '-' )?></td>
    <td>
    	<a href="javascript:void(0)" class="btn btn-info btn-sm btn-pilih" data-nim="<?=$mhs->nim?>">Pilih</a>
    </td>
</tr>
<?php 
	}
?>