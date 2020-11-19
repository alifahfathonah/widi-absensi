
<?php $this->view('material-dashboard/header')?>

<div class="row">
	<div class="col">
		<div class="card">
			<div class="card-header">
				<h4 class="card-tite mb-0">Edit data Mata Kuliah</h4>
			</div>
			<div class="card-body">
				<form action="<?=site_url('admin/data/mata_kuliah/edit/submit')?>" method='post'>
					<input type="hidden" name="id" value="<?=$mata_kuliah->id?>">
					<div class="form-row mb-4">
						<div class="col-sm">
							<label class="text-dark font-weight-bold ml-5">mata_kuliah</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-signature"></i></span>
								</div>
								<input type="text" name="mata_kuliah" value="<?=$mata_kuliah->mata_kuliah?>" class="form-control">
							</div>
						</div>
					</div>
					<div class="form-row mb-4">
						<div class="col-sm">
							<label class="text-dark font-weight-bold ml-5">program_studi_id</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-book"></i></span>
								</div>
								<?php 
									$program_studi_options = array();
									foreach ($data_prodi as $prodi) {
										$program_studi_options[$prodi->id] = ucwords(strtolower($prodi->program_studi));
									}
									echo form_dropdown('program_studi_id', $program_studi_options, $mata_kuliah->program_studi_id, array('class' => 'form-control'));
								?>
							</div>
						</div>
					</div>
					<div class="form-row mb-4">
						<div class="col-sm">
							<label class="text-dark font-weight-bold ml-5">rekomendasi_jumlah_sks</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-list-ol"></i></span>
								</div>
								<input type="text" name="rekomendasi_jumlah_sks" value="<?=$mata_kuliah->rekomendasi_jumlah_sks?>" class="form-control">
							</div>
						</div>
					</div>
					<div class="form-row">
						<div class="col">
							<input type="submit" name="submit" class="btn btn-success btn-block" value="Kirim">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php $this->view('material-dashboard/js_script')?>

<script type="text/javascript">
</script>
<?php $this->view('material-dashboard/footer')?>