<div class="container-fluid">
<h2 class="h3 mb-4 text-gray-800">Tambah Anggota</h2>

<div class="card shadow">
<div class="card-body">

<form method="post" action="<?= site_url('anggota/simpan');?>">

<div class="form-group">
    <label>Nama</label>
    <input type="text" name="nama" class="form-control" required>
</div>

<div class="form-group">
    <label>Alamat</label>
    <input type="text" name="alamat" class="form-control" required>
</div>

<div class="form-group">
    <label>Telepon</label>
    <input type="text" name="telp" class="form-control" required>
</div>

<div class="form-group">
    <label>Email</label>
    <input type="text" name="email" class="form-control" required>
</div>

<div class="form-group">
    <label>Tanggal Daftar</label>
    <input type="date" name="tgl_daftar" class="form-control" required>
</div>

<button type="submit" class="btn btn-primary">Simpan</button>
<a href="<?= site_url('anggota');?>" class="btn btn-secondary">Kembali</a>

</form>

</div>
</div>
</div>