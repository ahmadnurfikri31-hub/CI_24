<div class="container-fluid">

<h2 class="h3 mb-4 text-gray-800">Data Anggota</h2>

<a href="<?= site_url('anggota/tambah'); ?>" class="btn btn-primary mb-3">
    <i class="fas fa-plus"></i> Tambah
</a>

<div class="card shadow mb-4">
<div class="card-body">
<div class="table-responsive">

<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

<thead class="thead-dark">
<tr>
    <th>No</th>
    <th>Nomor Anggota</th>
    <th>Nama</th>
    <th>Telepon</th>
    <th>Email</th>
    <th>Status</th>
    <th>Aksi</th>
</tr>
</thead>

<tbody>
<?php $no = 1; foreach($anggota as $k): ?>
<tr>

    <!-- Nomor urut -->
    <td><?= $no++; ?></td>

    <!-- Nomor anggota (versi aman) -->
    <td><?= $k->id; ?></td>

    <!-- Data -->
    <td><?= $k->nama; ?></td>
    <td><?= $k->telp; ?></td>
    <td><?= $k->email; ?></td>

    <!-- Status -->
    <td>
        <span class="badge badge-success">Aktif</span>
    </td>

    <!-- Aksi -->
    <td>
        <a href="<?= site_url('anggota/edit/'.$k->id); ?>" class="btn btn-sm btn-warning">Edit</a>
        <a href="<?= site_url('anggota/hapus/'.$k->id); ?>" 
           class="btn btn-sm btn-danger"
           onclick="return confirm('Yakin hapus data?')">Hapus</a>
    </td>

</tr>
<?php endforeach; ?>
</tbody>

</table>

</div>
</div>
</div>

</div>