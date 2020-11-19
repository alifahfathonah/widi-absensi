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
                        <label class="mb-0 ml-5 font-weight-bold text-dark">Jenis Kelamin</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-venus-mars"></i></span>
                            </div>
                            <select class="filter-jenis_kelamin form-control">
                                <option value="---">---</option>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm">
                        <label class="mb-0 ml-5 font-weight-bold text-dark">Tahun Lahir</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            </div>
                            <input type="number" class="form-control filter-tahun_lahir">
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
                        <h2>LAPORAN DATA MAHASISWA</h2>
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
    mahasiswaParams = {
        limit: -1,
        page: 1,
    }
    function refresh_laporan_mahasiswa() {
        $.ajax({
            url: '<?=site_url('admin/ajax_read_mahasiswa/list/laporan_mahasiswa')?>',
            type: 'GET',
            dataType: 'html',
            data: mahasiswaParams,
        })
        .done(function(data) {
            $("#load-laporan-mahasiswa").html(data)
        });
        
    }
    refresh_laporan_mahasiswa();

    $(".filter-jenis_kelamin").change(function(e) {
        value = $(this).val();
        if (value != '---') {
            mahasiswaParams.jenis_kelamin = value;
        }  
        else {
            delete mahasiswaParams.jenis_kelamin;
        }
        refresh_laporan_mahasiswa();
    })
    $(".filter-tahun_lahir").change(function(e) {
        value = $(this).val();
        if (value != '') {
            mahasiswaParams.tahun_lahir = value;
        }  
        else {
            delete mahasiswaParams.tahun_lahir;
        }
        refresh_laporan_mahasiswa();
    })
    $(".filter-program_studi_id").change(function(e) {
        value = $(this).val();
        if (value != '---') {
            mahasiswaParams.program_studi_id = value;
            mahasiswaParams.program_studi = $(this).find('option:selected').html();
        }  
        else {
            delete mahasiswaParams.program_studi_id;
            delete mahasiswaParams.program_studi;
        }
        refresh_laporan_mahasiswa();
    })

    $(".btn-excel").click(function(e) {
        link = '<?=site_url('admin/ajax_read_mahasiswa/list/excel')?>?' + $.param(mahasiswaParams);
        window.location = link;
    });
</script>
<?php $this->view('material-dashboard/footer')?>