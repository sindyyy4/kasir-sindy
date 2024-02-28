<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<?php
// print_r($listKategori);
?>
<div class="pagetitle">
  <h1>Master Jenis Satuan</h1>
  <p>Berikut adalah data jenis Satuan, silahkan tambahkan jenis satuan baru pada halaman ini</p>
</div>
<p><a href="<?= site_url('tambah-satuan'); ?>" class="btn btn-primary btn-sm">
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
           
            <th>Nama Satuan</th>  
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $no = null;
          foreach ($listSatuan as $baris) :
            $no++
          ?>

            <tr>
              <th scope="row"><?= $no; ?></th>
              
              <td><?= $baris['nama_satuan']; ?></td>
              <td>
                <a href="<?= site_url('/edit-satuan/' . $baris['id_satuan']); ?>"><i class="bi bi-pencil-square"></i></a>
                <a href="<?= site_url('/hapus-satuan/' . $baris['id_satuan']); ?>"><i class="bi bi bi-trash-fill" onclick=""></i></a>
</td>
</tr>
              <?php
            endforeach;
              ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>