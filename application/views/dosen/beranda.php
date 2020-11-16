<?php $this->view('material-dashboard/header')?>


<div class="row">
    <div class="col-sm-4">
        <div class="card card-stats">
            <div class="card-header card-header-primary card-header-icon">
                <div class="card-icon">
                    <i class="fas fa-chalkboard-teacher" style="font-size: 36px"></i>
                </div>
                <p class="card-category">Kelas aktif</p>
                <h3 class="card-title"><?=$jumlah_kelas?></h3>
            </div>
            <div class="card-body">
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
                <div class="card-icon">
                    <i class="fas fa-users" style="font-size: 36px"></i>
                </div>
                <p class="card-category">Jumlah murid</p>
                <h3 class="card-title"><?=$jumlah_murid?> Orang</h3>
            </div>
            <div class="card-body">
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
                <div class="card-icon">
                    <i class="fas fa-scroll" style="font-size: 36px"></i>
                </div>
                <p class="card-category">MK Diajar</p>
                <h3 class="card-title"><?=$jumlah_mk?></h3>
            </div>
            <div class="card-body">
            </div>
        </div>
    </div>
    <!-- <div class="col-sm-3">
        <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
                <div class="card-icon">
                    <i class="fas fa-book" style="font-size: 36px"></i>
                </div>
                <p class="card-category">Total Ebook</p>
                <h3 class="card-title">-</h3>
            </div>
            <div class="card-body">
            </div>
        </div>
    </div> -->
</div>
<div class="row">
    <div class="col-md-10 col-sm-8">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Absensi Minggu ini</h4>
                <p class="card-category">(Akumulasi dari seluruh kelas anda)</p>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <canvas id="statistik"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-2 col-sm-4">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Kehadiran Hari ini</h4>
            </div>
            <div class="card-body">
                <div class="row text-center">
                    <div class="col pt-2 border border-success rounded mb-2">
                        <i class="fas fa-circle text-success"></i><br/>
                        <h4 class="font-italic" style="font-size: 10pt; line-height: 8px;"> Hadir</h4>
                        <div style="font-size: 32pt; line-height: 15px; font-weight: bold; margin-top: 24px; margin-bottom: 24px;"><?=$jumlah_hadir?></div>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col pt-2 border border-info rounded mb-2">
                        <i class="fas fa-circle text-info"></i><br/>
                        <h4 class="font-italic" style="font-size: 10pt; line-height: 8px;"> Ijin</h4>
                        <div style="font-size: 32pt; line-height: 15px; font-weight: bold; margin-top: 24px; margin-bottom: 24px;"><?=$jumlah_ijin?></div>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col pt-2 border border-warning rounded mb-2">
                        <i class="fas fa-circle text-warning"></i><br/>
                        <h4 class="font-italic" style="font-size: 10pt; line-height: 8px;"> Sakit</h4>
                        <div style="font-size: 32pt; line-height: 15px; font-weight: bold; margin-top: 24px; margin-bottom: 24px;"><?=$jumlah_sakit?></div>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col pt-2 border border-danger rounded mb-2">
                        <i class="fas fa-circle text-danger"></i><br/>
                        <h4 class="font-italic" style="font-size: 10pt; line-height: 8px;"> Alpha</h4>
                        <div style="font-size: 32pt; line-height: 15px; font-weight: bold; margin-top: 24px; margin-bottom: 24px;"><?=$jumlah_alpha?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->view('material-dashboard/js_script')?>
<script type="text/javascript">
    <?php 
        $tanggal_akhir = new DateTime();
        $tanggal_akhir->setTimeZone(new DateTimeZone('Asia/Jakarta'));
        $tanggal_akhir->modify('+1 Day');

        $tanggal_awal = new DateTime();
        $tanggal_awal->setTimeZone(new DateTimeZone('Asia/Jakarta'));
        $tanggal_awal->modify('-1 Week');


        $interval = new DateInterval('P1D');
        $range = new DatePeriod($tanggal_awal, $interval, $tanggal_akhir);

        $array_tanggal = array();
        $array_hadir = array();
        $array_sakit = array();
        $array_ijin = array();
        $array_alpha = array();
        foreach ($range as $tanggal) {
            $array_tanggal[] = $tanggal->format('d/m/Y');

            $this->db->where('tanggal', $tanggal->format('Y-m-d'));
            $this->db->where('absen', 'h');
            $jumlah_hadir = $this->AbsensiModel->show(-1, -1, 'count');
            $array_hadir[] = $jumlah_hadir;

            $this->db->where('tanggal', $tanggal->format('Y-m-d'));
            $this->db->where('absen', 'i');
            $jumlah_ijin = $this->AbsensiModel->show(-1, -1, 'count');
            $array_ijin[] = $jumlah_ijin;

            $this->db->where('tanggal', $tanggal->format('Y-m-d'));
            $this->db->where('absen', 's');
            $jumlah_sakit = $this->AbsensiModel->show(-1, -1, 'count');
            $array_sakit[] = $jumlah_sakit;

            $this->db->where('tanggal', $tanggal->format('Y-m-d'));
            $this->db->where('absen', 'a');
            $jumlah_alpha = $this->AbsensiModel->show(-1, -1, 'count');
            $array_alpha[] = $jumlah_alpha;
        }
        $array_tanggal = "'" . implode("','", $array_tanggal) . "'";
        $array_hadir = "'" . implode("','", $array_hadir) . "'";
        $array_ijin = "'" . implode("','", $array_ijin) . "'";
        $array_sakit = "'" . implode("','", $array_sakit) . "'";
        $array_alpha = "'" . implode("','", $array_alpha) . "'";

    ?>
    jQuery(document).ready(function($) {
        var statistik_ctx = $('#statistik');
        var statistik = new Chart(statistik_ctx, {
            type: 'line',
            data: {
                labels: [<?=$array_tanggal?>],
                datasets: [
                    {
                        label: 'Hadir',
                        data: [<?=$array_hadir?>],
                        backgroundColor: 'transparent',
                        borderColor: '#47A44B'
                    },
                    {
                        label: 'Sakit',
                        data: [<?=$array_sakit?>],
                        backgroundColor: 'transparent',
                        borderColor: '#F08F00'
                    },
                    {
                        label: 'Ijin',
                        data: [<?=$array_ijin?>],
                        backgroundColor: 'transparent',
                        borderColor: '#00AEC5'
                    },
                    {
                        label: 'Alpha',
                        data: [<?=$array_alpha?>],
                        backgroundColor: 'transparent',
                        borderColor: '#F33527'
                    }
                ]
            }
        })
    });
</script>
<?php $this->view('material-dashboard/footer')?>