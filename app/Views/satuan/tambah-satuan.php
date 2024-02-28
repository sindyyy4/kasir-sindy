<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>


<div class="pagetitle">
  <h1>Master Jenis Satuan</h1>
  <p>Silahkan tambahkan jenis satuan baru pada halaman ini</p>
</div>

<div class="col-lg-12">

  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Form Tambah Satuan</h5>

      <!-- Vertical Form -->
      <form class="row g-3"  action="<?=site_url('simpan-satuan');?>" method="POST">
        <div class="col-12">
          <label for="inputNanme4" class="form-label">Jenis Satuan</label>
          <input type="hidden" class="form-control" id="InputJenis" name="id_satuan">
          <input type="text" class="form-control" id="inputJenis" name="nama_satuan" required name="satuan" placeholder="Masukan Satuan Produk" autofocus autocomplete="off">
          <?php if(session()->has('errors')&& session('errors.nama_satuan')):?>
              <p class="text-danger">
                <?=esc(session('errors.nama_satuan'))?>
</p>
                <?php endif;?>
        </div>
        <div class="text-left">
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form><!-- Vertical Form -->
    </div>
  </div>

  <?= $this->endSection(); ?>