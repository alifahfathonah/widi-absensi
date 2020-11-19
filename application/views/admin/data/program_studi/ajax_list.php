<?php 
	$i = 1 + $offset;
	foreach ($data_filtered as $program_studi) {
?>
<tr>
	<th><?=$i++?></th>
	<td>
		<a href="<?=site_url('admin/data/program_studi/edit?id=' . $program_studi->id)?>" class="btn btn-fab btn-edit btn-warning rounded-circle btn-sm" title="Edit">
			<i class="fas fa-edit" style="font-size: 10pt; position: relative; top: -9px; left: 1px;"></i>
		</a>
		<a href="<?=site_url('admin/data/program_studi/delete?id=' . $program_studi->id)?>" class="btn btn-fab btn-delete btn-danger rounded-circle btn-sm" title="Hapus">
			<i class="fas fa-trash" style="font-size: 10pt; position: relative; top: -9px; left: 1px;"></i>
		</a>
	</td>
	<td><?=$program_studi->program_studi?></td>
	<td><?=$program_studi->gelar_akademik?></td>
	<td><?=$program_studi->sks_lulus?></td>
	<td><?=$program_studi->status_prodi?></td>
	<td><?=$program_studi->tanggal_berdiri?></td>
</tr>
<?php 
	}
?>