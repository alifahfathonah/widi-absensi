<?php $this->view('material-dashboard/header')?>
<?php 
    $tanggal_awal = new DateTime();
    $tanggal_awal->modify('-1 Month');
    $tanggal_awal->setTimeZone(new DateTimeZone('Asia/Jakarta'));

    $tanggal_akhir = new DateTime();
    $tanggal_akhir->setTimeZone(new DateTimeZone('Asia/Jakarta'));
?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0 font-weight-bold">Download Rekap Absensi Excel</h4>
            </div>
            <div class="card-body">
                <form action="<?=site_url('admin/laporan/absensi_excel/submit')?>" method="post">
                    <div class="form-row mb-2">
                        <div class="col-sm">
                            <label class="mb-0 ml-5 text-dark font-weight-bold">Dari Tanggal</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                </div>
                                <input type="date" name="tanggal_awal" class="form-control" value="<?=$tanggal_awal->format('Y-m-d')?>" required>
                            </div>
                        </div>
                        <div class="col-sm">
                            <label class="mb-0 ml-5 text-dark font-weight-bold">Sampai Tanggal</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                </div>
                                <input type="date" name="tanggal_akhir" class="form-control" value="<?=$tanggal_akhir->format('Y-m-d')?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm">
                            <label class="mb-0 ml-5 text-dark font-weight-bold">Prodi</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-book"></i></span>
                                </div>
                                <?php 
                                    echo form_dropdown('program_studi_id', $prodi_options, '', array('class' => 'form-control'));
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm">
                            <input type="submit" name="submit" class="btn btn-success btn-block" value="Download">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $this->view('material-dashboard/js_script')?>

<script type="text/javascript">
    console.log(JSON.parse(`<?=json_encode($data_spreadsheet)?>`));
</script>
<?php $this->view('material-dashboard/footer')?>