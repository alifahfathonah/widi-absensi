
<?php $this->view('material-dashboard/header')?>

<div class="row">
	<div class="col">
		<div class="card">
			<div class="card-header">
				<h4 class="card-tite mb-0">Edit data Mahasiswa</h4>
			</div>
			<div class="card-body">
				<form action="<?=site_url('admin/data/mahasiswa/edit/submit')?>" method='post'>
					<div class="form-row mb-4">
						<div class="col-sm">
							<label class="ml-5 font-weight-bold mb-0 text-dark">username</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-font"></i></span>
								</div>
								<input type="text" name="username" value="<?=$mahasiswa->username?>" class="form-control">
							</div>
						</div>
						<div class="col-sm">
							<label class="ml-5 font-weight-bold mb-0 text-dark">password</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-lock"></i></span>
								</div>
								<input type="text" name="password" value="<?=$mahasiswa->password?>" class="form-control">
							</div>
						</div>
					</div>
					<div class="form-row mb-4">
						<div class="col-sm">
							<label class="ml-5 font-weight-bold mb-0 text-dark">nama_lengkap</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-signature"></i></span>
								</div>
								<input type="text" name="nama_lengkap" value="<?=$mahasiswa->nama_lengkap?>" class="form-control">
							</div>
						</div>
						<div class="col-sm">
							<label class="ml-5 font-weight-bold mb-0 text-dark">nim</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-key"></i></span>
								</div>
								<input type="text" name="nim" readonly="readonly" value="<?=$mahasiswa->nim?>" class="form-control">
							</div>
						</div>

					</div>
					<div class="form-row mb-4">
						<div class="col-sm">
							<label class="ml-5 font-weight-bold mb-0 text-dark">tempat_lahir</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-city	"></i></span>
								</div>
								<input type="text" name="tempat_lahir" value="<?=$mahasiswa->tempat_lahir?>" class="form-control">
							</div>
						</div>
						<div class="col-sm">
							<label class="ml-5 font-weight-bold mb-0 text-dark">tanggal_lahir</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
								</div>
								<input type="date" name="tanggal_lahir" value="<?=$mahasiswa->tanggal_lahir?>" class="form-control">
							</div>
						</div>

					</div>
					<div class="form-row mb-4">
						<div class="col-sm">
							<label class="ml-5 font-weight-bold mb-0 text-dark">jenis_kelamin</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-venus-mars"></i></span>
								</div>
								<?php 
									$jenis_kelamin_options = array(
										'L' => 'Laki-laki',
										'P' => 'Perempuan'
									);
									echo form_dropdown('jenis_kelamin', $jenis_kelamin_options, $mahasiswa->jenis_kelamin, array('class' => 'form-control'));
								?>
							</div>
						</div>
						<div class="col-sm">
							<label class="ml-5 font-weight-bold mb-0 text-dark">agama</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-praying-hands"></i></span>
								</div>
								<input type="text" name="agama" value="<?=$mahasiswa->agama?>" class="form-control">
							</div>
						</div>
						<div class="col-sm">
							<label class="ml-5 font-weight-bold mb-0 text-dark">warga_negara</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-flag"></i></span>
								</div>
								<input type="text" name="warga_negara" value="<?=$mahasiswa->warga_negara?>" class="form-control">
							</div>
						</div>

					</div>
					<div class="form-row mb-4">
						<div class="col-sm">
							<label class="ml-5 font-weight-bold mb-0 text-dark">program_studi_id</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-book"></i></span>
								</div>
								<?php 
									$program_studi_options = array();
									foreach ($data_prodi as $prodi) {
										$program_studi_options[$prodi->id] = ucwords(strtolower($prodi->program_studi));
									}
									echo form_dropdown('program_studi_id', $program_studi_options, $mahasiswa->program_studi_id, array('class' => 'form-control'));
								?>
							</div>
						</div>
					</div>
					<div class="form-row mb-4">
						<div class="col-sm">
							<label class="ml-5 font-weight-bold mb-0 text-dark">no_hp</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
								</div>
								<input type="text" name="no_hp" value="<?=$mahasiswa->no_hp?>" class="form-control">
							</div>
						</div>
						<div class="col-sm">
							<label class="ml-5 font-weight-bold mb-0 text-dark">telepon</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-phone"></i></span>
								</div>
								<input type="text" name="telepon" value="<?=$mahasiswa->telepon?>" class="form-control">
							</div>
						</div>
						<div class="col-sm">
							<label class="ml-5 font-weight-bold mb-0 text-dark">email</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-envelope"></i></span>
								</div>
								<input type="text" name="email" value="<?=$mahasiswa->email?>" class="form-control">
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