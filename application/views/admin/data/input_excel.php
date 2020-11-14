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
                        <form class="form-input_excel" action="<?=site_url('admin/data/input_excel/insert/submit')?>" method="post" enctype="multipart/form-data">
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
<?php 
    if (isset($submitted)) {
?>
<div class="row">
    <div class="col">
        <div class="card mb-0">
            <div class="card-header">
                <h4 class="card-title mb-0">Tinjau data hasil scraping excel</h4>
                <span>Cek data berikut ini, jika benar tekan tombol submit dibawah</span>
            </div>
        </div>
    </div>
</div>
<?php 
        $i_spreadsheet = 1;
        foreach ($data_spreadsheet as $spreadsheet) {
?>
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Sheet <?=$i_spreadsheet++?></h4>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered">
                    <tr>
                        <th>Program Studi</th>
                        <td>
                            : <?=((isset($spreadsheet['program_studi']))? $spreadsheet['program_studi'] : '<strong>[Tidak ditemukan]</strong>' )?> 
                        </td>
                    </tr>
                    <tr>
                        <th>Mata Kuliah</th>
                        <td>: <?=((isset($spreadsheet['mata_kuliah']))? $spreadsheet['mata_kuliah'] : '<strong>[Tidak ditemukan]</strong>' )?></td>
                    </tr>
                    <tr>
                        <th>Nama Dosen</th>
                        <td>: <?=((isset($spreadsheet['dosen']))? $spreadsheet['dosen'] : '<strong>[Tidak ditemukan]</strong>' )?></td>
                    </tr>
                    <tr>
                        <th>Kelas</th>
                        <td>: <?=((isset($spreadsheet['kelas']))? $spreadsheet['kelas'] : '<strong>[Tidak ditemukan]</strong>' )?></td>
                    </tr>
                </table>
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>NIM</th>
                        <th>Nama Lengkap</th>
                        <th>Jenis Kelamin</th>
                    </tr>
                    <?php 
                        foreach ($spreadsheet['mahasiswa'] as $mahasiswa) {
                    ?>
                    <tr>
                        <td><?=$mahasiswa['nim']?></td>
                        <td><?=$mahasiswa['nama_lengkap']?></td>
                        <td><?=$mahasiswa['jenis_kelamin']?></td>
                    </tr>
                    <?php 
                        }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>
<?php
        }
?>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <form action="<?=site_url('admin/data/input_excel/insert/submit_system')?>" method="post">
                    <div class="text-warning">
                        <strong>Peringatan :</strong>
                        <ul>
                            <li>Data yang dimasukkan tidak akan terduplikat</li>
                            <li>Jika data dosen tidak terdeteksi, anda harus input data dosen tersebut secara manual</li>
                            <li>Input data mungkin akan membutuhkan waktu lebih</li>
                        </ul>
                    </div>
                    <div class="form-group">
                        <textarea name="data_spreadsheet" rows="1" style="visibility: hidden;"><?=json_encode($data_spreadsheet)?></textarea>
                        <input type="submit" name="submit" class="btn btn-success btn-block" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php 
    }
?>
<?php $this->view('material-dashboard/js_script')?>

<script type="text/javascript">
    console.log(JSON.parse(`<?=json_encode($data_spreadsheet)?>`));
</script>
<?php $this->view('material-dashboard/footer')?>