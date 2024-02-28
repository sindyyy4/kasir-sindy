<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>


<h3> data pengguna</h3>

<?php    
                 use Kint\Zval\Value;

                if (session()->getFlashdata('pesan')){
                  echo '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i>';
                  echo session()->getFlashdata('pesan');
                  echo '</h5></div>';

                }
                ?>
<div class="card">
  <div class="card-header">
    <h3 class="card-title">
      <p><a href="<?= site_url('tambah-pengguna'); ?>" class="btn btn-primary ">
          Tambah</a></p>
    </h3>

    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
        <i class="fas fa-minus"></i>
      </button>
      <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
        <i class="fas fa-times"></i>
      </button>
    </div>
  </div>
  <div class="card-body">

    <form method="POST" action="/pengguna/index">
      
    </form>

    <table class="table table-sm table-striped ">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama User</th>
          <th>username</th>
          <th>Level</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1; ?>
        <?php foreach ($listPengguna as $baris):   ?>
              <tr>
                <td>
                <?= $no++ ?>
              <td><?= $baris['nama_user']; ?></td>
              <td><?= $baris['username']; ?></td>
              <td><?= $baris['level']; ?></td>
              <td>
               <a href=<?= site_url('/edit-pengguna/' . $baris['id_user']); ?>><i class="bi bi-pencil-square"></i></a>
                <a href=<?= site_url('/hapus-pengguna/' . $baris['id_user']); ?>><i class="bi bi bi-trash-fill" ></i></a>
              </td>
              </tr>
          <?php endforeach;?>
        </tr>
      </tbody>
    </table>

  </div>
</div>


<?= $this->endSection(); ?>