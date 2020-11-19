<table class="table table-laporan table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>NIDN / NIP</th>
            <th>Nama Lengkap</th>
            <th>TTL</th>
            <th>Agama</th>
            <th>No KTP</th>
            <th>No Tel /<br/> No HP</th>
            <th>Email</th>
            <th>Username</th>
        </tr>
    </thead>
    <tbody>
<?php 
	$i = 1 + $offset;
	foreach ($data_filtered as $dosen) {
?>
<tr>
	<th><?=$i++?></th>
    <td><?=$dosen->nidn?> <?=$dosen->nip?></td>
    <td><?=(($dosen->gelar_depan != '') ? $dosen->gelar_depan . ' ': '')?><?=$dosen->nama_lengkap?><?=(($dosen->gelar_belakang != '') ? ', ' . $dosen->gelar_belakang: '')?></td>
    <td><?=$dosen->tempat_lahir?><?=(($dosen->tanggal_lahir != '0000-00-00') ? ', ' .$dosen->tanggal_lahir : '')?></td>
    <td><?=ucfirst(strtolower($dosen->agama))?></td>
    <td><?=$dosen->no_ktp?></td>
    <td><?=$dosen->no_telepon?> / <?=$dosen->no_hp?></td>
    <td><?=$dosen->email?></td>
    <td><?=$dosen->username?></td>
</tr>
<?php 
	}
?>
    </tbody>
</table>