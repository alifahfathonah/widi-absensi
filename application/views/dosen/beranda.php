<?php $this->view('material-dashboard/header')?>


<div class="row">
    <div class="col-sm-3">
        <div class="card card-stats">
            <div class="card-header card-header-primary card-header-icon">
                <div class="card-icon">
                    <i class="fas fa-chalkboard-teacher" style="font-size: 36px"></i>
                </div>
                <p class="card-category">Kelas aktif</p>
                <h3 class="card-title">3</h3>
            </div>
            <div class="card-body">
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
                <div class="card-icon">
                    <i class="fas fa-users" style="font-size: 36px"></i>
                </div>
                <p class="card-category">Jumlah murid</p>
                <h3 class="card-title">157</h3>
            </div>
            <div class="card-body">
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
                <div class="card-icon">
                    <i class="fas fa-scroll" style="font-size: 36px"></i>
                </div>
                <p class="card-category">MK Diajar</p>
                <h3 class="card-title">1</h3>
            </div>
            <div class="card-body">
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
                <div class="card-icon">
                    <i class="fas fa-book" style="font-size: 36px"></i>
                </div>
                <p class="card-category">Total Ebook</p>
                <h3 class="card-title">37</h3>
            </div>
            <div class="card-body">
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


    var siswaFilter = {
        limit: 10,
        page: 1,
    }

    $("#filter-page").on('input', function(e) {
        value = $(this).val();
        if (value != '') {
            siswaFilter.page = value;
        }    
        else {
            $(this).val(1)
            delete siswaFilter.page;
        }
        refresh_siswa()
    })
    $("#filter-limit").on('input', function(e) {
        value = $(this).val();
        if (value != '') {
            siswaFilter.limit = value;
        }    
        else {
            $(this).val(10)
            siswaFilter.limit = 10;
        }
        refresh_siswa()
    })

    function refresh_siswa() {
        $.ajax({
            url: '<?=site_url('siswa/ajax_daftar_siswa')?>',
            type: 'GET',
            dataType: 'html',
            data: siswaFilter,
        })
        .done(function(data) {
            $.getScript('<?=site_url('assets/custom/js/default.js')?>')
            if (data != '') {
                $('#siswa-load').html(data)

                eventSetelahLoad();
            }
            else {
                $('#siswa-load').html(`<tr><td colspan='99' class='text-center'>Tidak ada data</td></tr>`);
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

    refresh_siswa()
   
</script>
<?php $this->view('material-dashboard/footer')?>