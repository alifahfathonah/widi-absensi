<?php $this->view('material-dashboard/header')?>

<div class="row">
    <?php 
        foreach ($data_kelas as $kelas) {
    ?>
    <div class="col-md-4">
        <div class="card card-blog">
            <div class="card-header card-header-image">
                <img src="<?=site_url('assets/custom/images/classroom.jpg')?>">
                <div class="card-title" style="line-height: 12px">
                    <h3 class="mb-0 font-weight-bold" style="font-size: 15pt; font-size: 15pt; background: #00000045; margin-right: 24px; margin-bottom: 12px !important; padding: 8px; text-align: center; border-radius: 18px;"><?=$kelas->nama?></h3>
                    <span style="font-size: 10pt">Pkl <?=(($kelas->waktu != '') ? $kelas->waktu  : '-')?></span><br/>
                    <span style="font-size: 10pt"><?=$logged_user->gelar_depan?> <?=$logged_user->nama_lengkap?> <?=$logged_user->gelar_belakang?> </span><br/>
                </div>
            </div>
            <div class="card-body text-center">
                <table class="table table-no-padding text-left">
                    <tr>
                        <th>Prodi</th>
                        <?php 
                            $prodi = $this->ProgramStudiModel->single('id', $kelas->program_studi_id, 'object');
                        ?>
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
                        <td>: <?=$query?> Orang</td>
                    </tr>
                </table>
                <a href="#" class="btn btn-warning btn-kelas" data-title='<?=$kelas->nama?>' data-id="<?=$kelas->id?>">Buka kelas</a>
            </div>
        </div>
    </div>
    <?php 
        }
    ?>
</div>
<?php $this->view('material-dashboard/js_script')?>

<script type="text/javascript">
    $(".btn-kelas").click(function(e) {
        e.preventDefault();
        kelas_id = $(this).data('id');
        title = $(this).data('title');
        $.ajax({
            url: '<?=site_url('dosen/ajax_read_kelas_mahasiswa/list')?>',
            type: 'GET',
            dataType: 'html',
            data: {kelas: kelas_id},
        })
        .done(function(data) {
            $("#modal-kelas").modal('show')
            $("#load-mahasiswa").html(data)
            $('.fill-kelas-nama').html(title)
        });
    });
</script>

<div class="modal fade" id="modal-kelas">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><span class="fill-kelas-nama"></span></h4>
                <button class="close" data-dismiss='modal' type="button">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>NIM</th>
                                    <th>Nama</th>
                                    <th>TTL</th>
                                </tr>
                            </thead>
                            <tbody id="load-mahasiswa">
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->view('material-dashboard/footer')?>