<?php $this->view('material-dashboard/header')?>
<div class="row" style="margin-top: -60px">
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <div class="form-row">
                    <div class="col">
                        <label>Pilih Kelas</label>
                        <button type="button" data-toggle='modal' data-target='#modal-pilih-kelas' class="btn btn-warning btn-block">
                            <i class="fas fa-chalkboard-teacher fa-lg" style="position: relative; top: 2px; margin-right: 8px"></i>
                            Pilih Kelas
                        </button>
                    </div>
                    <div class="col">
                        <label>Tanggal</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-calendar"></i>
                                </span>
                            </div>
                            <input type="date" id="filter-tanggal" name="tanggal" value="<?=date('Y-m-d')?>" class="form-control">
                        </div>
                    </div>
                </div>
            </div>  
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card card-blog">
            <div class="card-header pt-2 pb-1" style="background: url('<?=site_url('assets/custom/images/classroom.jpg')?>');">
                <div class="card-title text-white" style="line-height: 12px">
                    <div class="row">
                        <div class="col">
                            <h4 class="mb-0 mt-0 font-weight-bold"><span class="fill-nama">Pilih Kelas Terlebih dahulu</span></h4>
                            <span style="font-size: 10pt;"><span class="fill-waktu"></span><br/>
                            <span style="font-size: 10pt;"><?=$logged_user->gelar_depan?> <?=$logged_user->nama_lengkap?> <?=$logged_user->gelar_belakang?> </span><br/>
                        </div>
                    </div> 
                </div>
            </div>
            <div class="card-body text-center">
                <table class="table table-no-padding table-xs text-left mb-0">
                    <tr>
                        <th>Prodi</th>
                        <td><span class="fill-program_studi"></span></td>
                    </tr>
                    <tr>
                        <th>Semester</th>
                        <td><span class="fill-semester"></span></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div> <!-- end row -->

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Absensi</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th style="min-width: 150px">Nama Lengkap</th>
                                <th class="d-none d-sm-block">TTL</th>
                                <th style="min-width: 170px">Absensi</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody id="load-absensi">
                            <tr>
                                <td colspan="99" class="text-center">Pilih kelas dan pilih tanggal absensi</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



<?php $this->view('material-dashboard/js_script')?>


<script type="text/javascript">
    var absensi = {
        limit: -1,
        page: 1,
        kelas: -1,
        tanggal: '<?=date('Y-m-d')?>'
    }

    if (Cookies.get('dosen_absensi_kelas_id') != '') {
        absensi.kelas = Cookies.get('dosen_absensi_kelas_id');
        update_kelas(absensi.kelas);
        refresh_absensi();
    }
    function refresh_absensi() {
        $.ajax({
            url: '<?=site_url('dosen/ajax_daftar_absensi')?>',
            type: 'GET',
            dataType: 'html',
            data: absensi,
        })
        .done(function(data) {
            $.getScript('<?=site_url('assets/custom/js/default.js')?>')
            $('#load-absensi').html(data)
            eventAfterLoad()
        })
        
    }



    function eventAfterLoad() {
        $('.btn-absen').click(function(e) {
            e.preventDefault()
            id = $(this).data('id')
            absen = $(this).data('absen')
            kelas_id = absensi.kelas
            dosen_id = '<?=$logged_user->id?>'
            tanggal = absensi.tanggal
            $.ajax({
                url: '<?=site_url('dosen/ajax_set_absensi')?>',
                type: 'POST',
                dataType: 'json',
                data: {
                    mahasiswa_ambil_kelas_id: id,
                    absen: absen,
                    tanggal: tanggal,
                    kelas_id: kelas_id,
                    dosen_id: dosen_id
                },
            })
            .done(function(data) {
                if (data.status == 'ok') {
                    refresh_absensi();
                }
            });
        });
        $(".btn-tambah-keterangan").popover({
            trigger: 'click',
            placement: 'left',
            html: true,
            content: `
                <textarea class="absensi-keterangan form-control"></textarea>
            `,
            title: 'Tuliskan keterangan',
            template: `<div class="popover" role="tooltip" style='width: 200px'><a class='popover-close' href='#' style='position: absolute;top: 4px;right: 14px;'><i class='fas fa-times'></i></a><div class="arrow"></div><h3 class="popover-header pt-1" style='font-size: 11pt; font-weight: bold; border-bottom: 1px solid #ddd;'></h3><div class="popover-body p-1"></div><div class='text-center'><input type='button' class='btn btn-warning btn-tambah-keterangan-submit btn-sm m-1' value='Kirim' /></div></div>`
        })
        .on('shown.bs.popover', function() {
            $this = $(this);
            $('.popover-close').click(function(e) {
                e.preventDefault();
                $this.popover('hide');
            });
            $('.absensi-keterangan').focus();

            $('.btn-tambah-keterangan-submit').click(function(e) {
                keterangan = $(".popover .absensi-keterangan").val();
                $.ajax({
                    url: '<?=site_url('dosen/ajax_set_absensi/update_keterangan')?>',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        keterangan: keterangan,
                        id: $this.data('id')
                    },
                })
                .done(function(data) {
                    $this.popover('hide');
                    refresh_absensi();
                });
            });
        })



        $(".btn-edit-keterangan").popover({
            trigger: 'click',
            placement: 'left',
            html: true,
            content: `
                <textarea class="absensi-keterangan form-control"></textarea>
            `,
            title: 'Tuliskan keterangan',
            template: `<div class="popover" role="tooltip" style='width: 200px'><a class='popover-close' href='#' style='position: absolute;top: 4px;right: 14px;'><i class='fas fa-times'></i></a><div class="arrow"></div><h3 class="popover-header pt-1" style='font-size: 11pt; font-weight: bold; border-bottom: 1px solid #ddd;'></h3><div class="popover-body p-1"></div><div class='text-center'><input type='button' class='btn btn-warning btn-edit-keterangan-submit btn-sm m-1' value='Kirim' /></div></div>`
        })
        .on('shown.bs.popover', function() {
            $this = $(this);
            $('.popover-close').click(function(e) {
                e.preventDefault();
                $this.popover('hide');
            });

            $('.absensi-keterangan').val($this.data('keterangan'));
            $('.absensi-keterangan').focus();
            $('.absensi-keterangan').select();

            $('.btn-edit-keterangan-submit').click(function(e) {
                keterangan = $(".popover .absensi-keterangan").val();
                $.ajax({
                    url: '<?=site_url('dosen/ajax_set_absensi/update_keterangan')?>',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        keterangan: keterangan,
                        id: $this.data('id')
                    },
                })
                .done(function(data) {
                    $this.popover('hide');
                    refresh_absensi();
                });
            });
        })
    }












    $('#filter-tanggal').change(function(e) {
        value = $(this).val()
        if (value != '') {
            absensi.tanggal = value
        }
        else {
            absensi.tanggal = '<?=date('Y-m-d')?>'
        }
        if (absensi.kelas != -1) 
            refresh_absensi();
    });

    function update_kelas(id) {
        $.ajax({
            url: '<?=site_url('dosen/ajax_read_kelas/single')?>',
            type: 'GET',
            dataType: 'json',
            data: {id: id},
        })
        .done(function(data) {
            if (data.status == 'success') {
                $('.fill-nama').html((data.kelas.nama != null) ? data.kelas.nama : '-');
                $('.fill-waktu').html((data.kelas.waktu != null) ? data.kelas.waktu : '-');
                $('.fill-program_studi').html((data.kelas.program_studi != null) ? data.kelas.program_studi : '-');
                $('.fill-semester').html((data.kelas.semester != null) ? data.kelas.semester : '-');
            }
        });
    }
    $(document).on('shown.bs.modal', '#modal-pilih-kelas', function(e) {
        $('.btn-pilih-kelas').click(function(e) {
            id = $(this).data('id');
            absensi.kelas = id;
            Cookies.set('dosen_absensi_kelas_id', id, {expires: 7})
            if (absensi.kelas != -1) 
                refresh_absensi();
            update_kelas(id);
            
            $('#modal-pilih-kelas').modal('hide');
            
        });
    });
</script>

<div class="modal fade" id="modal-pilih-kelas">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Pilih Kelas untuk absensi</h4>
                <button type="button" class="close" data-dismiss='modal'><i class="fas fa-times"></i></button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <?php 
                        foreach ($data_kelas as $kelas) {
                            $program_studi = $this->ProgramStudiModel->single('id', $kelas->program_studi_id, 'object');
                    ?>
                    <div class="col-sm-6 col-xl-6">
                        <div class="card card-blog">
                            <div class="card-header card-header-image">
                                <img src="<?=site_url('assets/custom/images/classroom.jpg')?>">
                                <div class="card-title" style="line-height: 12px">
                                    <h4 class="mb-0 font-weight-bold fill-from-nama"><?=$kelas->nama?></h4>
                                    <?php 
                                        if ($kelas->hari != '') {
                                    ?>
                                    <span style="font-size: 10pt" class="fill-from-waktu"><?=$kelas->hari?>,    Pkl <?=date('H.i', strtotime($kelas->waktu))?></span><br/>
                                    <?php 
                                        }
                                    ?>
                                    <span style="font-size: 10pt"><?=$logged_user->gelar_depan?> <?=$logged_user->nama_lengkap?> <?=$logged_user->gelar_belakang?> </span><br/>
                                </div>
                            </div>
                            <div class="card-body text-center">
                                <table class="table table-no-padding text-left">
                                    <tr>
                                        <th>Prodi</th>
                                        <td class="fill-from-program_studi">: <?=(($program_studi != '') ? $program_studi->program_studi : 'Tidak ada data')?></td>
                                    </tr>
                                    <tr>
                                        <th>Semester</th>
                                        <td class="fill-from-semester">: <?=(($kelas->semester != '') ? $kelas->semester : '---')?></td>
                                    </tr>
                                </table>
                                <a href="javascript:void(0)" data-id='<?=$kelas->id?>' class="btn btn-warning btn-pilih-kelas">Pilih kelas</a>
                            </div>
                        </div>
                    </div>
                    <?php 
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->view('material-dashboard/footer')?>