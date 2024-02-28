<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="pagetitle">
  <h1>Master Produk</h1>
  <p>Berikut adalah data Produk, silahkan tambahkan pada produk baru pada halaman ini</p>
</div>
<p><a href="<?= site_url('tambah-produk'); ?>" class="btn btn-primary btn-sm">
    <i class="ri-add-circle-line"></i> Tambah</a></p>
<div class="card">
  <div class="card-body">
    <div class="row mb-4">
      <!--<h5 class="card-title">Berikut Adalah Data Kategori Produk</h5> -->
      <!-- Table with hoverable rows -->
      <div class="pagetitle mt-4">
      </div>
      <table id="myTable" class="table table-sm">
        <thead>
          <tr>
            <th>No</th>
            <th>Kode Produk</th>
            <th>Nama Produk</th>
            <th>Harga Jual</th>
            <th>Kategori</th>
            <th>Stok</th>
            <th>Harga Beli</th>
            <th>Satuan</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $no = null;
          foreach ($listProduk as $baris) :
            $no++
          ?>

            <tr>
              <th scope="row"><?= $no; ?></th>
              <td><?= $baris['kode_produk']; ?></td>
              <td><?= $baris['nama_produk']; ?></td>
              <td><?= $baris['harga_jual']; ?></td>
              <td><?= $baris['nama_kategori']; ?></td>
              <td><?= $baris['stok']; ?></td>
              <td><?= $baris['harga_beli']; ?></td>
              <td><?= $baris['nama_satuan']; ?></td>
              <td>
                <a href=<?= site_url('/edit-produk/' . $baris['id_produk']); ?>><i class="bi bi-pencil-square"></i></a>
                <a href=<?= site_url('/hapus-produk/' . $baris['id_produk']); ?>><i class="bi bi bi-trash-fill"></i></a>

              <?php
            endforeach;
              ?>
              </td>
            </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>