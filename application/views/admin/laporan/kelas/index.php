<?php $this->view('material-dashboard/header')?>

<div class="row d-print-none">
    <div class="col">
        <div class="card">
            <div class="card-header card-header-default card-header-icon">
                <div class="card-icon">
                    <i class="fas fa-filter" style="font-size: 24pt"></i>
                </div>
            </div>
            <div class="card-body">
                <div class="form-row">
                    <div class="col-sm">
                        <label class="mb-0 ml-5 font-weight-bold text-dark">Mata Kuliah</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-scroll"></i></span>
                            </div>
                            <?php 
                                echo form_dropdown('mata_kuliah_id', $mk_options, '', array('class' => 'form-control filter-mata_kuliah_id'));
                            ?>
                        </div>
                    </div>
                    <div class="col-sm">
                        <label class="mb-0 ml-5 font-weight-bold text-dark">Program Studi</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-book"></i></span>
                            </div>
                            <?php 
                                echo form_dropdown('program_studi_id', $prodi_options, '', array('class' => 'form-control filter-program_studi_id'));
                            ?>
                        </div>
                    </div>
                    <div class="col-sm">
                        <label class="mb-0 ml-5 font-weight-bold text-dark">Dosen</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-chalkboard-teacher"></i></span>
                            </div>
                            <?php 
                                echo form_dropdown('dosen_id', $dosen_options, '', array('class' => 'form-control filter-dosen_id'));
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header card-header-danger card-header-icon d-print-none">
                <div class="card-icon">
                    <i class="fas fa-clipboard-list" style="font-size: 24pt"></i>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col text-center">
                        <h2>LAPORAN DATA KELAS</h2>
                        <button type="button" class="d-print-none btn btn-info btn-sm" onclick="window.print()">
                            <i class="fas fa-print mr-1"></i>
                            Cetak
                        </button>
                        <a href="#" class="d-print-none btn btn-success btn-sm btn-excel">
                            <i class="fas fa-file-excel mr-1"></i>
                            Unduh Laporan (Excel)
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col table-responsive" id="load-laporan-mahasiswa">
                        
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php $this->view('material-dashboard/js_script')?>
<script type="text/javascript">
    kelasParams = {
        limit: -1,
        page: 1,
    }
    function refresh_laporan_kelas() {
        $.ajax({
            url: '<?=site_url('admin/ajax_read_kelas/list/laporan_kelas')?>',
            type: 'GET',
            dataType: 'html',
            data: kelasParams,
        })
        .done(function(data) {
            $("#load-laporan-mahasiswa").html(data)
        });
        
    }
    refresh_laporan_kelas();

    $(".filter-mata_kuliah_id").change(function(e) {
        value = $(this).val();
        if (value != '---') {
            kelasParams.mata_kuliah_id = value;
            kelasParams.mata_kuliah = $(this).find('option:selected').html();
        }  
        else {
            delete kelasParams.mata_kuliah_id;
            delete kelasParams.mata_kuliah;
        }
        refresh_laporan_kelas();
    })
    $(".filter-dosen_id").change(function(e) {
        value = $(this).val();
        if (value != '') {
            kelasParams.dosen_id = value;
            kelasParams.dosen = $(this).find('option:selected').html();
        }  
        else {
            delete kelasParams.dosen_id;
            delete kelasParams.dosen;
        }
        refresh_laporan_kelas();
    })
    $(".filter-program_studi_id").change(function(e) {
        value = $(this).val();
        if (value != '---') {
            kelasParams.program_studi_id = value;
            kelasParams.program_studi = $(this).find('option:selected').html();
        }  
        else {
            delete kelasParams.program_studi_id;
            delete kelasParams.program_studi;
        }
        refresh_laporan_kelas();
    })

    $(".btn-excel").click(function(e) {
        link = '<?=site_url('admin/ajax_read_kelas/list/excel')?>?' + $.param(kelasParams);
        window.location = link;
    });
</script>
<?php $this->view('material-dashboard/footer')?>