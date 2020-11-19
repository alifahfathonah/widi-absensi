
<?php $this->view('material-dashboard/header')?>

<div class="row">
	<div class="col-sm">
		<div class="card">
			<div class="card-header">
				<h4 class="card-tite mb-0">Tambah data Program Studi</h4>
			</div>
			<div class="card-body">
				<form action="<?=site_url('admin/data/program_studi/tambah/submit')?>" method='post'>
					<div class="form-row mb-4">
						<div class="col-sm">
							<label class="ml-5 font-weight-bold mb-0 text-dark">program_studi</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-signature"></i></span>
								</div>
								<input type="text" name="program_studi" class="form-control">
							</div>
						</div>
					</div>
					<div class="form-row mb-4">
						<div class="col-sm">
							<label class="ml-5 font-weight-bold mb-0 text-dark">gelar_akademik</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-font"></i></span>
								</div>
								<input type="text" name="gelar_akademik" class="form-control">
							</div>
						</div>
						<div class="col-sm">
							<label class="ml-5 font-weight-bold mb-0 text-dark">sks_lulus</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-sort-numeric-up"></i></span>
								</div>
								<input type="number" name="sks_lulus" class="form-control">
							</div>
						</div>

					</div>
					<div class="form-row mb-4">
						<div class="col-sm">
							<label class="ml-5 font-weight-bold mb-0 text-dark">status_prodi</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-book"></i></span>
								</div>
								<?php 
									$status_prodi_options = array(
										'aktif' => 'Aktif',
										'tidak aktif' => 'Tidak Aktif'
									);
									echo form_dropdown('status_prodi', $status_prodi_options, '', array('class' => 'form-control'));
								?>
							</div>
						</div>
						<div class="col-sm">
							<label class="ml-5 font-weight-bold mb-0 text-dark">tanggal_berdiri</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-calendar"></i></span>
								</div>
								<input type="date" name="tanggal_berdiri" class="form-control">
							</div>
						</div>
					</div>
					<div class="form-row">
						<div class="col-sm">
							<input type="submit" name="submit" class="btn btn-success btn-block" \>
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