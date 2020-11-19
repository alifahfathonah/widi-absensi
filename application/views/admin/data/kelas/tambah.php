
<?php $this->view('material-dashboard/header')?>

<div class="row">
	<div class="col">
		<div class="card">
			<div class="card-header">
				<h4 class="card-tite mb-0">Tambah data Kelas</h4>
			</div>
			<div class="card-body">
				<form action="<?=site_url('admin/data/kelas/tambah/submit')?>" method='post'>
					<div class="form-row mb-4">
						<div class="col">
							<label class="font-weight-bold ml-5 mb-0 text-dark">nama kelas</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-chalkboard"></i></span>
								</div>
								<input type="text" name="nama" class="form-control">
							</div>
						</div>
					</div>
					<div class="form-row mb-4">
						<div class="col">
							<label class="font-weight-bold ml-5 mb-0 text-dark">dosen_pengajar_id</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-chalkboard-teacher"></i></span>
								</div>
								<?php 
									echo form_dropdown('dosen_pengajar_id', $dosen_options, '', array('class' => 'form-control'));
								?>
							</div>
						</div>
						<div class="col">
							<label class="font-weight-bold ml-5 mb-0 text-dark">mata_kuliah_id</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-scroll"></i></span>
								</div>
								<?php 
									echo form_dropdown('mata_kuliah_id', $mata_kuliah_options, '', array('class' => 'form-control'));
								?>
							</div>
						</div>
						<div class="col">
							<label class="font-weight-bold ml-5 mb-0 text-dark">program_studi_id</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-book"></i></span>
								</div>
								<?php 
									echo form_dropdown('program_studi_id', $prodi_options, '', array('class' => 'form-control', 'readonly' => 'readonly'));
								?>
							</div>
						</div>
					</div>
					<div class="form-row mb-4">
						<div class="col">
							<label class="font-weight-bold ml-5 mb-0 text-dark">hari</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-calendar"></i></span>
								</div>
								<?php 
									$hari_options = array(
										'senin' => ucfirst('senin'),
										'selasa' => ucfirst('selasa'),
										'rabu' => ucfirst('rabu'),
										'kamis' => ucfirst('kamis'),
										"jum'at" => ucfirst("jum'at"),
										'sabtu' => ucfirst('sabtu'),
										'minggu' => ucfirst('minggu'),
									);
									echo form_dropdown('hari', $hari_options, '', array('class' => 'form-control'));
								?>
							</div>
						</div>
						<div class="col">
							<label class="font-weight-bold ml-5 mb-0 text-dark">waktu</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-clock"></i></span>
								</div>
								<input type="time" name="waktu" class="form-control">
							</div>
						</div>
					</div>
					<div class="form-row mb-4">
						<div class="col">
							<label class="font-weight-bold ml-5 mb-0 text-dark">semester</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-calendar"></i></span>
								</div>
								<input type="text" name="semester" class="form-control">
							</div>
						</div>
						<div class="col">
							<label class="font-weight-bold ml-5 mb-0 text-dark">status_kelas</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-question-circle"></i></span>
								</div>
								<?php 
									$status_options = array(
										'aktif' => 'aktif',
										'tidak aktif' => 'tidak aktif',
									);
									echo form_dropdown('status_kelas', $status_options, '', array('class'=> 'form-control'));
								?>
							</div>
						</div>
					</div>
					<div class="form-row">
						<div class="col">
							<input type="submit"class="btn btn-success btn-block" value="Kirim">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php $this->view('material-dashboard/js_script')?>

<script type="text/javascript">
	$("[name='mata_kuliah_id']").change(function(e) {
		value = $(this).find('option:selected').html();
		prodi_id = value.split(' | ')
		prodi_id = prodi_id[1]
		$("[name='program_studi_id']").val(prodi_id)
	});
</script>
<?php $this->view('material-dashboard/footer')?>