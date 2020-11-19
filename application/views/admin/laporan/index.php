<?php $this->view('material-dashboard/header')?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title font-weight-bold text-center mb-0">Pilih data laporan yang tersedia dibawah ini:</h4>
            </div>
            <div class="card-body pt-4">
                <div class="row justify-content-center">
                    <div class="col-2 align-items-center text-center">
                        <a href="<?=site_url('admin/laporan/mahasiswa')?>">
                            <i class="fas fa-users" style="font-size: 40pt"></i>
                            <h5 class="font-weight-bold mt-2">Mahasiswa</h5>
                        </a>
                    </div>
                    <div class="col-2 align-items-center text-center">
                        <a href="<?=site_url('admin/laporan/dosen')?>">
                            <i class="fas fa-chalkboard-teacher" style="font-size: 40pt"></i>
                            <h5 class="font-weight-bold mt-2">Dosen</h5>
                        </a>
                    </div>
                    <div class="col-2 align-items-center text-center">
                        <a href="<?=site_url('admin/laporan/kelas')?>">
                            <i class="fas fa-chalkboard" style="font-size: 40pt"></i>
                            <h5 class="font-weight-bold mt-2">Kelas</h5>
                        </a>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col text-center">
                        <h5 class="text-center font-weight-bold">Atau</h5>
                        <a href="<?=site_url('admin/laporan/absensi_excel')?>" class="btn btn-success">
                            <i class="fas fa-file-excel fa-lg mr-2"></i>
                            <strong>Unduh rekap lengkap data absensi</strong>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->view('material-dashboard/js_script')?>

<script type="text/javascript">
</script>
<?php $this->view('material-dashboard/footer')?>