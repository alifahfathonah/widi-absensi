
<?php $this->view('material-dashboard/header')?>

<div class="row">
	<div class="col">
        <div class="card card-blog">
            <div class="card-header card-header-image"	style="height: 150px; overflow: hidden; box-shadow: 0 5px 15px -8px rgba(0, 0, 0, 0.24), 0 8px 10px -5px rgba(0, 0, 0, 0.2);">
                <img src="<?=site_url('assets/custom/images/classroom.jpg')?>" class="mt-sm-6">
                <div class="card-title" style="line-height: 12px">
                    <h3 class="mb-0 font-weight-bold" style="font-size: 15pt; font-size: 15pt; background: #00000045; margin-right: 24px; margin-bottom: 32px !important; padding: 8px; text-align: center; border-radius: 18px;"><?=$kelas->nama?></h3>
                    <span style="font-size: 10pt">Pkl <?=(($kelas->waktu != '') ? $kelas->waktu  : '-')?></span><br/>
                    <span style="font-size: 10pt"><?=(($dosen != '') ?  $dosen->gelar_depan : '')?> <?=(($dosen != '') ?  $dosen->nama_lengkap : '')?> <?=(($dosen != '') ?  $dosen->gelar_belakang : '')?> </span><br/>
                </div>
            </div>
            <?php 
            	$this->db->where('kelas_id', $kelas->id);
            	$data_mahasiswa = $this->RAmbilKelasModel->join_mahasiswa(-1, -1, 'object');
            ?>
            <div class="card-body text-center">
            	<div class="row align-items-center">
            		<div class="col-lg-8">
            			<table class="table table-no-padding text-left">
		                    <tr>
		                        <th>Prodi</th>
		                        <td>: <?=(($prodi != '') ?  $prodi->program_studi : '-')?></td>
		                    </tr>
		                    <tr>
		                        <th>Semester</th>
		                        <td>: <?=(($kelas->semester != '') ? $kelas->semester : '-')?></td>
		                    </tr>
		                    <tr>
		                        <th>Jumlah Murid</th>
		                        <?php 
		                            $this->db->where('kelas_id', $kelas->id);
		                            $query = $this->RAmbilKelasModel->show(-1, -1, 'count');
		                        ?>
		                        <td>: <?=count($data_mahasiswa)?> Orang</td>
		                    </tr>
		                </table>
            		</div>
            		<div class="col-lg-4">
            			<button type="button" class="btn btn-warning btn-tambah-mahasiswa">
            				<i class="fas fa-plus"></i> Tambah Anggota Mahasiswa
            			</button>
            		</div>
            	</div>
            </div>
        </div>
    </div>
</div>
<div class="row">
	<div class="col">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Anggota Kelas</h4>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-striped table-bordered">
						<thead>
							<th>#</th>
							<th></th>
							<th>nim</th>
							<th>nama_lengkap</th>
							<th>TTL</th>
							<th>no_hp</th>
							<th>email</th\>
							<th>agama</th>
							<th>warga_negara</th>
						</thead>
						<tbody id="load-mahasiswa"></tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>


<?php $this->view('material-dashboard/js_script')?>

<script type="text/javascript">

	// Menampikan notifikasi
    <?php 
        $notif = $this->input->get('notif');
        if (isset($notif)) {
            $message = $this->input->get('message');
            $type = $this->input->get('type');
            $icon = $this->input->get('icon');
    ?>

    buat_notifikasi( {
        message: '' + <?="'" . $message . "'"?>, 
        icon: '' + <?="'" . $icon . "'"?>, 
        type: '' + <?="'" . $type . "'"?>
    })

    <?php 
        }
    ?>

    var mahasiswaParams = {
        limit: -1,
        page: 1,
        kelas: <?=$kelas->id?>
    }

    function refresh_mahasiswa() {
        $.ajax({
            url: '<?=site_url('admin/ajax_read_rambil_kelas/list/kelas_mahasiswa')?>',
            type: 'GET',
            dataType: 'html',
            data: mahasiswaParams,
        })
        .done(function(data) {
            $.getScript('<?=site_url('assets/custom/js/default.js')?>')
            if (data != '') {
                $('#load-mahasiswa').html(data)
                eventSetelahLoad();
            }
            else {
                $('#load-mahasiswa').html(`<tr><td colspan='99' class='text-center'>Tidak ada data</td></tr>`);
            }
        })
    }

    function eventSetelahLoad() {
        $('.btn-delete').click(function(e) {
            e.preventDefault();
            if (confirm('Anda yakin?, data yang dihapus tidak bisa dikembalikan.')) {
            	id = $(this).data('id')
            	$.ajax({
            		url: '<?=site_url('admin/ajax_write_rambil_kelas/delete')?>',
            		type: 'POST',
            		dataType: 'json',
            		data: {id: id},
            	})
            	.done(function(data) {
            		if (data.status == 'success') {
            			buat_notifikasi({
            				message: 'Berhasil dihapus',
            				icon: 'fas fa-check',
            				type: 'success'
            			})
            			refresh_mahasiswa();
            		}
            	});
            	
            }       
        });
    }

    $(".btn-tambah-mahasiswa").click(function(e) {
		$("#modal-tambah-mahasiswa").modal('show');
    });
    $(document).on('shown.bs.modal', "#modal-tambah-mahasiswa" , function(e) {
    	e.preventDefault();
    	$(".pilih-mahasiswa").focus();

    	$(".pilih-mahasiswa").on('input', function(e) {
    		e.preventDefault();
    		value = $(this).val();
    		$.ajax({
    			url: '<?=site_url('admin/ajax_read_mahasiswa/list/search_mahasiswa')?>',
    			type: 'GET',
    			dataType: 'html',
    			data: {nama_nim: value},
    		})
    		.done(function(data) {
	            $.getScript('<?=site_url('assets/custom/js/default.js')?>')
    			$("#load-mahasiswa-pilih").html(data);
    			callbackPilihMahasiswa();
    		})
    	});

    	function callbackPilihMahasiswa() {
    		$(".btn-pilih").click(function(e) {
    			$(".btn-pilih").removeClass('btn-warning');
    			$(".btn-pilih").addClass('btn-info');
    			$(".btn-pilih").html('Pilih')

    			$(this).removeClass('btn-info')
    			$(this).addClass('btn-warning')
    			$(this).html('Dipilih')

    			body = $("#modal-tambah-mahasiswa");
    			$("[name='mahasiswa_nim']").val($(this).data('nim'));
    			scrollTo = $(".form-focus-a").offset().top;
    			console.log(scrollTo + ' | ' + body.scrollTop());

    			body.stop().animate({scrollTop: scrollTo}, 500, 'swing', function() {
    			});
    		});
    	}

    	$("#form-tambah-mahasiswa").off().submit(function(e) {
    		e.preventDefault()
    		if ($("[name='mahasiswa_nim']").val() != '') {
    			formData = new FormData(this);
    			$.ajax({
    				url: '<?=site_url('admin/ajax_write_rambil_kelas/insert')?>',
    				type: 'POST',
    				dataType: 'json',
    				data: formData,
    				cache: false,
    				contentType: false,
    				processData: false,
    			})
    			.done(function(data) {
    				if (data.status == 'error_duplicate') {
    					alert('Error: Data Mahasiswa sudah ada');

		    			scrollTo = $(".pilih-mahasiswa").offset().top;
    					body.stop().animate({scrollTop: scrollTo}, 500, 'swing')
						$(".pilih-mahasiswa").focus();

    				}
    				else{
	    				refresh_mahasiswa();
	    				$("#load-mahasiswa-pilih").html('');
	    				$(".pilih-mahasiswa").val('');
	    				$("#form-tambah-mahasiswa")[0].reset();
	    				$("#modal-tambah-mahasiswa").modal('hide');
			    	}
    			});
    		}
    		else {
    			alert('Pilih mahasiswa terlebih dahulu')
    		}
    		
    	});
    });

    refresh_mahasiswa()
</script>
<div class="modal fade" id="modal-tambah-mahasiswa">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Tambah anggota kelas mahasiswa</h4>
				<button class="close" data-dismiss='modal' type="button">
					<i class="fas fa-times"></i>
				</button>
			</div>
			<div class="modal-body">
				<form id="form-tambah-mahasiswa" method="post">
					<div class="form-row">
						<div class="col">
							<h5 class="font-weight-bold mb-0">Pilih Mahasiswa</h5>
							<input type="text" class="pilih-mahasiswa form-control" placeholder="Ketikkan nama atau nim mahasiswa">
							<table class="table table-striped table-sm">
								<thead>
									<tr>
										<th>NIM</th>
										<th>Nama Lengkap</th>
										<th>TTL</th>
										<th>No HP</th>
										<th>Prodi</th>
										<th></th>
									</tr>
								</thead>
								<tbody id="load-mahasiswa-pilih"></tbody>
							</table>
						</div>
					</div>
					<br/>
					<hr/>
					<br/>
					<div class="form-row mb-2 form-focus-a">
						<div class="col-sm">
							<label class="ml-5 mb-0 font-weight-bold text-dark">mahasiswa_nim</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-users"></i></span>
								</div>
								<input type="text" name="mahasiswa_nim" class="form-control" readonly="readonly">
							</div>
						</div>
					</div>
					<div class="form-row mb-2">
						<div class="col-sm">
							<label class="ml-5 mb-0 font-weight-bold text-dark">kelas_id</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-chalkboard"></i></span>
								</div>
								<input type="hidden" name="kelas_id" value="<?=$kelas->id?>">
								<input type="text" name="kelas" class="form-control" value="<?=$kelas->nama?>" disabled='disabled'>
							</div>
						</div>
					</div>
					<div class="form-row mb-2">
						<div class="col-sm">
							<label class="ml-5 mb-0 font-weight-bold text-dark">tanggal_ambil</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-calendar"></i></span>
								</div>
								<input type="date" name="tanggal_ambil" class="form-control" value="<?=date('Y-m-d')?>">
							</div>
						</div>
					</div>
					<div class="form-row mb-2">
						<div class="col-sm">
							<label class="ml-5 mb-0 font-weight-bold text-dark">status_persetujuan</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" style="padding: 11px 20px;"><i class="fas fa-info"></i></span>
								</div>
								<?php 
									$status_persetujuan_options = array(
										'diterima' => 'Diterima',
										'tidak diterima' => 'Tidak Diterima',
										'pending' => 'Pending',
									);
									echo form_dropdown('status_persetujuan', $status_persetujuan_options, 'diterima', array('class' => 'form-control'));
								?>
							</div>
						</div>
					</div>
					<div class="form-row">
						<div class="col">
							<div class="form-row mb-2">
								<div class="col-sm">
									<label class="ml-5 mb-0 font-weight-bold text-dark">catatan</label>
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="fas fa-signature"></i></span>
										</div>
										<textarea name="catatan" rows="3" class="form-control"></textarea>
									</div>
								</div>
							</div>
							<div class="form-row mb-2">
								<div class="col-sm">
									<input type="submit" name="submit" class="btn btn-success btn-block" value="Tambah">
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php $this->view('material-dashboard/footer')?>