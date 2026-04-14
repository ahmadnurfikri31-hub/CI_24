<div class="container-fluid">
<h2 class="h3 mb-4 text-gray-800">Edit Anggota</h2>

<div class="card shadow">
<div class="card-body">

<form method="post" action="<?= site_url('anggota/update/'.$anggota->id); ?>">

<!-- Nama -->
<div class="form-group">
    <label>Nama</label>
    <input type="text" name="nama" class="form-control" 
           value="<?= $anggota->nama; ?>" required>
</div>

<!-- Alamat -->
<div class="form-group">
    <label>Alamat</label>
    <input type="text" name="alamat" class="form-control" 
           value="<?= $anggota->alamat; ?>" required>
</div>

<!-- Telepon -->
<div class="form-group">
    <label>Telepon</label>
    <input type="text" name="telp" class="form-control" 
           value="<?= $anggota->telp; ?>" required>
</div>

<!-- Email -->
<div class="form-group">
    <label>Email</label>
    <input type="text" name="email" class="form-control" 
           value="<?= $anggota->email; ?>" required>
</div>

<div class="form-group">
    <label>Tanggal Daftar</label>
    <input type="date" name="tgl_daftar" class="form-control" 
           value="<?= $anggota->tgl_daftar; ?>" required>
</div>

<button type="submit" class="btn btn-primary">Update</button>
<a href="<?= site_url('anggota');?>" class="btn btn-secondary">Kembali</a>

</form>

</div>
</div>
</div>