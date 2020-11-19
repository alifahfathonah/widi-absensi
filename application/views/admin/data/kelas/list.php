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
                <input type="number" id="filter-limit" value="50" min="10" class="form-control">
            </div>
            <div class="col-8 col-md-10">
                <label>Cari nama kelas</label>
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
            <div class="card-header">
                <h4 class="card-title mb-0">Data Kelas</h4>
                <p class="cart-category font-italic">Klik tombol info kelas untuk melihat detail atau menambah anggota.</p>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th style="width: 50px"></th>
                                <th>nama</th>
                                <th>program_studi_id</th>
                                <th>dosen_pengajar_id</th>
                                <th>mata_kuliah_id</th>
                                <th>Jumlah Anggota</th>
                                <th>hari</th>
                                <th>waktu</th>
                                <th>semester</th>
                                <th>status_kelas</th>
                            </tr>
                        </thead>
                        <tbody id="kelas-load">
                            
                        </tbody>
                    </table>
                </div>
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


    var kelasParams = {
        limit: 50,
        page: 1,
    }

    $("#filter-page").on('input', function(e) {
        value = $(this).val();
        if (value != '') {
            kelasParams.page = value;
        }    
        else {
            $(this).val(1)
            delete kelasParams.page;
        }
        refresh_kelas()
    })
    $("#filter-limit").on('input', function(e) {
        value = $(this).val();
        if (value != '') {
            kelasParams.limit = value;
        }    
        else {
            $(this).val(10)
            kelasParams.limit = 10;
        }
        refresh_kelas()
    })
    $("#filter-nama").on('input', function(e) {
        value = $(this).val();
        if (value != '') {
            kelasParams.nama = value;
        }    
        else {
            delete kelasParams.nama
        }
        refresh_kelas()
    })

    function refresh_kelas() {
        $.ajax({
            url: '<?=site_url('admin/ajax_read_kelas/list/list')?>',
            type: 'GET',
            dataType: 'html',
            data: kelasParams,
        })
        .done(function(data) {
            $.getScript('<?=site_url('assets/custom/js/default.js')?>')
            if (data != '') {
                $('#kelas-load').html(data)
                eventSetelahLoad();
            }
            else {
                $('#kelas-load').html(`<tr><td colspan='99' class='text-center'>Tidak ada data</td></tr>`);
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

    refresh_kelas()
   
</script>
<?php $this->view('material-dashboard/footer')?>