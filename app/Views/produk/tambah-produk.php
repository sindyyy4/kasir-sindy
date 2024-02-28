<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="col-lg-12">

  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Form Tambah Produk</h5>

      <!-- Vertical Form -->
      <form class="row g-3" action="<?= site_url('simpan-produk'); ?>" method="POST">
        <div class="col-12">
          <label for="inputNanme4" class="form-label">Kode Produk</label>
          <input type="hidden" class="form-control" id="InputId" name="kode_produk">
          <input type="text" class="form-control" id="inputKode" name="kode_produk" required name="produk" placeholder="Masukan Kode Produk" autocomplete="off">
        </div>
        <?php if(session()->has('errors')&& session('errors.kode_produk'));?>
              <p class="text-danger">
                <?=esc(session('errors.kode_produk'))?>
        <div class="col-12">
          <label for="inputNanme4" class="form-label">Nama Produk</label>
          <input type="text" class="form-control" id="inputProduk" name="nama_produk" required name="produk" placeholder="Masukan Nama Produk" autocomplete="off">
        </div>
        <div class="col-12">
          <label for="inputNanme4" class="form-label">Harga Jual</label>
          <input type="text" class="form-control uang" id="inputHj" name="harga_jual" required name="produk" placeholder="Masukan Harga Jual" autocomplete="off">
        </div>
        <div class="col-12">
          <label for="inputNanme4" class="form-label">Stok</label>
          <input type="text" class="form-control uang" id="inputStok" name="stok" required name="produk" placeholder="Masukan Stok" autocomplete="off">
        </div>
        <div class="col-12">
          <label for="inputNanme4" class="form-label">Harga Beli</label>
          <input type="text" class="form-control uang" id="inputHb" name="harga_beli" required name="produk" placeholder="Masukan Nama Produk" autocomplete="off">
        </div>
        <div class="col-12">
          <label for="inputNanme4" class="form-label">Satuan Produk</label>
          <select class="form-control" id="inputSatuan" name="jenis_satuan">
            <?php

            if (isset($listSatuan)) {
              $no = null;
              foreach ($listSatuan as $baris) {
                $no++;

                echo '<option value="' . $baris['id_satuan'] . '">' . $baris['nama_satuan'] . '</option>';
              }
            }

            ?>
          </select>
        </div>
        <div class="col-12">
          <label for="inputNanme4" class="form-label">Kategori Produk</label>
          <select class="form-control" id="inputJenis" name="jenis_kategori">
            <?php

            if (isset($listKategori)) {
              $no = null;
              foreach ($listKategori as $baris) {
                $no++;

                echo '<option value="' . $baris['kode_kategori'] . '">' . $baris['nama_kategori'] . '</option>';
              }
            }

            ?>
          </select>
        </div>
        <div class="text-left">
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form><!-- Vertical Form -->
    </div>
  </div>

  <?= $this->endSection(); ?>