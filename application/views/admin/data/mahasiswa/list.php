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
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>TTL</th>
                            <th>Username</th>
                            <th>Warga Negara</th>
                            <th>No HP   </th>
                            <th>E-mail</th>
                        </tr>
                    </thead>
                    <tbody id="mahasiswa-load">
                        
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


    var mahasiswaParams = {
        limit: 10,
        page: 1,
    }

    $("#filter-page").on('input', function(e) {
        value = $(this).val();
        if (value != '') {
            mahasiswaParams.page = value;
        }    
        else {
            $(this).val(1)
            delete mahasiswaParams.page;
        }
        refresh_mahasiswa()
    })
    $("#filter-limit").on('input', function(e) {
        value = $(this).val();
        if (value != '') {
            mahasiswaParams.limit = value;
        }    
        else {
            $(this).val(10)
            mahasiswaParams.limit = 10;
        }
        refresh_mahasiswa()
    })
    $("#filter-nama").on('input', function(e) {
        value = $(this).val();
        if (value != '') {
            mahasiswaParams.nama_lengkap = value;
        }    
        else {
            delete mahasiswaParams.nama_lengkap
        }
        refresh_mahasiswa()
    })

    function refresh_mahasiswa() {
        $.ajax({
            url: '<?=site_url('admin/ajax_read_mahasiswa/list/list')?>',
            type: 'GET',
            dataType: 'html',
            data: mahasiswaParams,
        })
        .done(function(data) {
            $.getScript('<?=site_url('assets/custom/js/default.js')?>')
            if (data != '') {
                $('#mahasiswa-load').html(data)
                eventSetelahLoad();
            }
            else {
                $('#mahasiswa-load').html(`<tr><td colspan='99' class='text-center'>Tidak ada data</td></tr>`);
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

    refresh_mahasiswa()
   
</script>
<?php $this->view('material-dashboard/footer')?>