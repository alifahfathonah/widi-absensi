<?php $this->view('material-dashboard/header')?>

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
                        <h2>LAPORAN DATA DOSEN</h2>
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
                    <div class="col table-responsive" id="load-laporan-dosen">
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
            url: '<?=site_url('admin/ajax_read_dosen/list/laporan_dosen')?>',
            type: 'GET',
            dataType: 'html',
            data: mahasiswaParams,
        })
        .done(function(data) {
            $("#load-laporan-dosen").html(data)
        });
        
    }
    refresh_laporan_mahasiswa();

    $(".btn-excel").click(function(e) {
        link = '<?=site_url('admin/ajax_read_dosen/list/excel')?>?' + $.param(mahasiswaParams);
        window.location = link;
    });
</script>
<?php $this->view('material-dashboard/footer')?>