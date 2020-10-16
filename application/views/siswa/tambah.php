<?php $this->view('material-dashboard/header')?>

<div class="card">
    <div class="card-header card-header-primary">
        <h4 class="card-title">Edit buku</h4>
    </div>
    <div class="card-body">
        <form action="<?=site_url('siswa/tambah/submit')?>" id="form-siswa_tambah" method='post'>
            <div class="row">
                <div class="col-sm-8">
                    <label>nama</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-signature"></i></span>
                        </div>
                        <input type="text" name="nama" class="form-control">
                    </div>
                </div>
                <div class="col-sm-4">
                    <label>nis</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="text" name="nis" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label>alamat</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-map"></i></span>
                        </div>
                        <textarea rows="5" name="alamat" class="form-control"></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <input type="submit" name="submit" class="btn btn-primary btn-block">
                </div>
            </div>
        </form>
    </div> <!-- end col-12 -->
</div> <!-- end div.card -->

<?php $this->view('material-dashboard/js_script')?>

<script type="text/javascript">
    $("#form-siswa_tambah").submit(function(e) {
        if (!confirm('Tambah siswa?')) {
            e.preventDefault();
        }
    });
</script>
<?php $this->view('material-dashboard/footer')?>