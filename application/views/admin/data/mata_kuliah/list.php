<?php $this->view('material-dashboard/header')?>


<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-2 col-md-1">
                <label>Halaman</label>
                <input type="number" id="filter-page" value="1" min="1" class="form-control">
            </div>
            <div class="col-2 col-md-1">
                <label>Item/Page</label>
                <input type="number" id="filter-limit" value="10" min="10" class="form-control">
            </div>
            <div class="col-8 col-md-10">
                <label>Cari nama siswa</label>
                <div class="input-group">
                    <input type="text" id="filter-nama" class="form-control">
                    <div class="input-group-btn">
                        <button type="button" class="btn btn-primary btn-fab btn-round"><i class="fas fa-search" style="font-size: 12pt; position: relative; top: -2px"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <div class="row">
            <h4 class="card-header">Data Mahasiswa</h4>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th style="width: 85px"></th>
                            <th>Nama</th>
                            <th>Prodi</th>
                            <th>Rekomendasi SKS</th>
                        </tr>
                    </thead>
                    <tbody id="mata_kuliah-load">
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div> <!-- end col-12 -->
</div> <!-- end div.card -->

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


    var mataKuliahParams = {
        limit: 10,
        page: 1,
    }

    $("#filter-page").on('input', function(e) {
        value = $(this).val();
        if (value != '') {
            mataKuliahParams.page = value;
        }    
        else {
            $(this).val(1)
            delete mataKuliahParams.page;
        }
        refresh_mata_kuliah()
    })
    $("#filter-limit").on('input', function(e) {
        value = $(this).val();
        if (value != '') {
            mataKuliahParams.limit = value;
        }    
        else {
            $(this).val(10)
            mataKuliahParams.limit = 10;
        }
        refresh_mata_kuliah()
    })
    $("#filter-nama").on('input', function(e) {
        value = $(this).val();
        if (value != '') {
            mataKuliahParams.mata_kuliah = value;
        }    
        else {
            delete mataKuliahParams.mata_kuliah
        }
        refresh_mata_kuliah()
    })

    function refresh_mata_kuliah() {
        $.ajax({
            url: '<?=site_url('admin/ajax_read_mata_kuliah/list/list')?>',
            type: 'GET',
            dataType: 'html',
            data: mataKuliahParams,
        })
        .done(function(data) {
            $.getScript('<?=site_url('assets/custom/js/default.js')?>')
            if (data != '') {
                $('#mata_kuliah-load').html(data)
                eventSetelahLoad();
            }
            else {
                $('#mata_kuliah-load').html(`<tr><td colspan='99' class='text-center'>Tidak ada data</td></tr>`);
            }
        })
    }

    function eventSetelahLoad() {
        $('.btn-delete').click(function(e) {
            if (!confirm('Anda yakin?, data yang dihapus tidak bisa dikembalikan.')) {
                e.preventDefault();
            }       
        });
    }

    refresh_mata_kuliah()
   
</script>
<?php $this->view('material-dashboard/footer')?>