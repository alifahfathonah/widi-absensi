
<?php $this->view('material-dashboard/header')?>

<div class="row">
	<div class="col">
		<div class="card">
			<div class="card-header">
				<h4 class="card-tite mb-0">Tambah data Dosen</h4>
			</div>
			<div class="card-body">
				<form action="<?=site_url('admin/data/dosen/tambah/submit')?>" method='post'>
					<input type="hidden" name="id">
					<div class="form-row mb-4">
						<div class="col-sm">
							<label class="ml-5 font-weight-bold mb-0 text-dark">username</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-font"></i></span>
								</div>
								<input type="text" name="username" class="form-control">
							</div>
						</div>
						<div class="col-sm">
							<label class="ml-5 font-weight-bold mb-0 text-dark">password</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-lock"></i></span>
								</div>
								<input type="text" name="password" class="form-control">
							</div>
						</div>
					</div>
					<div class="form-row mb-4">
						<div class="col-sm">
							<label class="ml-5 text-dark font-weight-bold">nidn</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-key"></i></span>
								</div>
								<input type="text" name="nidn" class="form-control">
							</div>
						</div>
						<div class="col-sm">
							<label class="ml-5 text-dark font-weight-bold">nip</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-key"></i></span>
								</div>
								<input type="text" name="nip" class="form-control">
							</div>
						</div>
					</div>
					<div class="form-row mb-4">
						<div class="col-sm">
							<label class="ml-5 text-dark font-weight-bold">nama_lengkap</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-signature"></i></span>
								</div>
								<input type="text" name="nama_lengkap" class="form-control">
							</div>
						</div>
					</div>
					<div class="form-row mb-4">
						<div class="col-sm">
							<label class="ml-5 text-dark font-weight-bold">gelar_depan</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-ellipsis-h"></i></span>
								</div>
								<input type="text" name="gelar_depan" class="form-control">
							</div>
						</div>
						<div class="col-sm">
							<label class="ml-5 text-dark font-weight-bold">gelar_belakang</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-ellipsis-h"></i></span>
								</div>
								<input type="text" name="gelar_belakang" class="form-control">
							</div>
						</div>
					</div>
					<div class="form-row mb-4">
						<div class="col-sm">
							<label class="ml-5 text-dark font-weight-bold">tempat_lahir</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-city"></i></span>
								</div>
								<input type="text" name="tempat_lahir" class="form-control">
							</div>
						</div>
						<div class="col-sm">
							<label class="ml-5 text-dark font-weight-bold">tanggal_lahir</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-calendar"></i></span>
								</div>
								<input type="date" name="tanggal_lahir" class="form-control">
							</div>
						</div>
						<div class="col-sm">
							<label class="ml-5 text-dark font-weight-bold">jenis_kelamin</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-venus-mars"></i></span>
								</div>
								<?php 
									$jenis_kelamin_options = array(
										'L' => 'Laki-laki',
										'P' => 'Perempuan'
									);
									echo form_dropdown('jenis_kelamin', $jenis_kelamin_options, '', array('class' => 'form-control'));
								?>
							</div>
						</div>
					</div>
					<div class="form-row mb-4">
						<div class="col-sm">
							<label class="ml-5 text-dark font-weight-bold">agama</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-praying-hands"></i></span>
								</div>
								<input type="text" name="agama" class="form-control">
							</div>
						</div>
						<div class="col-sm">
							<label class="ml-5 text-dark font-weight-bold">no_ktp</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-id-card"></i></span>
								</div>
								<input type="text" name="no_ktp" class="form-control">
							</div>
						</div>
					</div>
					<div class="form-row mb-4">
						<div class="col-sm">
							<label class="ml-5 text-dark font-weight-bold">no_telepon</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-phone"></i></span>
								</div>
								<input type="text" name="no_telepon" class="form-control">
							</div>
						</div>
						<div class="col-sm">
							<label class="ml-5 text-dark font-weight-bold">no_hp</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
								</div>
								<input type="text" name="no_hp" class="form-control">
							</div>
						</div>
						<div class="col-sm">
							<label class="ml-5 text-dark font-weight-bold">email</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-envelope"></i></span>
								</div>
								<input type="text" name="email" class="form-control">
							</div>
						</div>
					</div>
					<div class="form-row">
						<div class="col">
							<input type="submit" name="submit" class="btn btn-success btn-block"/>
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