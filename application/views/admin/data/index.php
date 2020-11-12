<?php $this->view('material-dashboard/header')?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title font-weight-bold text-center mb-0">Anda dapat mengakses data-data berikut ini</h4>
            </div>
            <div class="card-body pt-4">
                <div class="row justify-content-center">
                    <div class="col-2 align-items-center text-center">
                        <a href="<?=site_url('admin/data/mahasiswa')?>">
                            <i class="fas fa-users" style="font-size: 40pt"></i>
                            <h5 class="font-weight-bold mt-2">Mahasiswa</h5>
                        </a>
                    </div>
                    <div class="col-2 align-items-center text-center">
                        <a href="<?=site_url('admin/data/dosen')?>">
                            <i class="fas fa-chalkboard-teacher" style="font-size: 40pt"></i>
                            <h5 class="font-weight-bold mt-2">Dosen</h5>
                        </a>
                    </div>
                    <div class="col-2 align-items-center text-center">
                        <a href="<?=site_url('admin/data/kelas')?>">
                            <i class="fas fa-chalkboard" style="font-size: 40pt"></i>
                            <h5 class="font-weight-bold mt-2">Kelas</h5>
                        </a>
                    </div>
                    <div class="col-2 align-items-center text-center">
                        <a href="<?=site_url('admin/data/mata_kuliah')?>">
                            <i class="fas fa-book" style="font-size: 40pt"></i>
                            <h5 class="font-weight-bold mt-2">Mata Kuliah</h5>
                        </a>
                    </div>
                    <div class="col-2 align-items-center text-center">
                        <a href="<?=site_url('admin/data/program_studi')?>">
                            <i class="fas fa-graduation-cap" style="font-size: 40pt"></i>
                            <h5 class="font-weight-bold mt-2">Program Studi</h5>
                        </a>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col text-center">
                        <h5 class="text-center font-weight-bold">Atau</h5>
                        <a href="<?=site_url('admin/data/input_excel')?>" class="btn btn-success">
                            <i class="fas fa-file-excel fa-lg mr-2"></i>
                            <strong>Input data menggunakan data absensi</strong>
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