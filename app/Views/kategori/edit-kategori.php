<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>


<div class="pagetitle">
  <h1>Master Jenis Kategori</h1>
  <p>Silahkan tambahkan jenis kategori baru pada halaman ini</p>
</div>

<div class="col-lg-12">

  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Form Tambah Kategori</h5>

      <!-- Vertical Form -->
      <form class="row g-3"  action="<?=site_url('update-kategori');?>" method="POST">
        <div class="col-12">
          <label for="inputNanme4" class="form-label">Jenis Kategori</label>
          <input type="hidden" class="form-control" id="InputJenis" name="kode_kategori" value="<?=$detailKategori[0]['kode_kategori'];?>"> 
          <input type="text" class="form-control" id="inputJenis" name="nama_kategori" required name="kategori" value="<?=$detailKategori[0]['nama_kategori'];?>">
        </div>
        <div class="text-left">
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form><!-- Vertical Form -->
    </div>
  </div>

  <?= $this->endSection(); ?>