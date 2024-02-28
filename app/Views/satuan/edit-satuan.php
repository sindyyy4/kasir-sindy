<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="pagetitle">
  <h1>Master Edit Satuan</h1>
  <p>Silahkan tambahkan jenis satuan baru pada halaman ini</p>
</div>

<div class="col-lg-12">

  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Form Edit Satuan</h5>

      <!-- Vertical Form -->
      <form class="row g-3" action="<?= site_url('update-satuan'); ?>" method="POST">
        <div class="col-12">
          <label for="inputNanme4" class="form-label">Jenis Satuan</label>
          <input type="hidden" class="form-control" id="InputJenis" name="id_satuan" value="<?= $detailSatuan[0]['id_satuan']; ?>">
          <input type="text" class="form-control" id="inputJenis" name="nama_satuan" required name="satuan" value="<?= $detailSatuan[0]['nama_satuan']; ?>">
        </div>
        <div class="text-left">
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form><!-- Vertical Form -->
    </div>
  </div>

  <?= $this->endSection(); ?>