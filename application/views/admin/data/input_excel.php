<?php $this->view('material-dashboard/header')?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0 font-weight-bold">Input data menggunakan file absensi excel</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <form class="form-input_excel" action="<?=site_url('admin/input_excel/insert/submit')?>" method="post" enctype="multipart/form-data">
                            <div class="">
                                <label class="form-control-label">File Absensi (*.xls, *.xlsx)</label>
                                <input type="file" name="file_absensi" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" value="Upload" class="btn btn-success btn-block">
                            </div>
                        </form>
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