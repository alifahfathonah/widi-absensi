<?php 
	$i = 1 + $offset;
	foreach ($data_filtered as $mk) {
		$prodi = $this->ProgramStudiModel->single('id', $mk->program_studi_id, 'object');
?>
<tr>
	<th><?=$i++?></th>
	<td>
		<a href="<?=site_url('admin/data/mata_kuliah/edit?id=' . $mk->id)?>" class="btn btn-fab btn-edit btn-warning rounded-circle btn-sm" title="Edit">
			<i class="fas fa-edit" style="font-size: 10pt; position: relative; top: -9px; left: 1px;"></i>
		</a>
		<a href="<?=site_url('admin/data/mata_kuliah/delete?id=' . $mk->id)?>" class="btn btn-fab btn-delete btn-danger rounded-circle btn-sm" title="Hapus">
			<i class="fas fa-trash" style="font-size: 10pt; position: relative; top: -9px; left: 1px;"></i>
		</a>
	</td>
	<td><?=$mk->mata_kuliah?></td>
    <td><?=(($prodi != '') ? $prodi->program_studi :  '-')?></td>
    <td><?=$mk->rekomendasi_jumlah_sks?></td>
</tr>
<?php 
	}
?>