<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

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

<!-- Horizontal Form -->
<div class="row">
  <div class="col-lg-12">
    <div class="card card-info ">

      <!-- form start -->
      <form action="<?= site_url('simpan-pengguna'); ?>" method="POST">

        <div class="card-body">
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-7 col-form-label">Nama User</label>
            <div class="col-sm-10">
              <input type="hidden" class="form-control" id="inputJenis" name="nama_user">
              <input type="text" class="form-control" id="inputJenis" name="nama_user" required name="pengguna" placeholder="Masukan Nama User">
            </div>
          </div>

          <div class="form-group row">
          <label for="inputEmail3" class="col-sm-7 col-form-label">username</label>
          <div class="col-sm-10">
            <!-- <input type="hidden" class="form-control" id="inputJenis" name="username"> -->
            <input type="text" class="form-control" name="username" placeholder="Masukan Username">
          </div>
          <div class="form-group row">
          <label for="inputEmail3" class="col-sm-7 col-form-label">password</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="inputJenis" name="password" required name="pengguna" placeholder="Masukan Password">
            <?php if(session()->has('errors')&& session('errors.password'));?>
              <p class="text-danger">
                <?=esc(session('errors.password'))?>
          </div>
        </div>

        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-7 col-form-label">Level</label>
          <div class="col-sm-10">
            <input type="hidden" class="form-control" id="inputJenis" name="level">
            <select class="form-control" id="inputJenis" name="level" required name="pengguna" placeholder="Masukan Level">
            <option selected>Pilih Level</option>
            <option>Admin</option>
            <option>Kasir</option>
              </select>
          </div>
        </div>
        </div>

        
        <!-- /.card-body -->
        <div class="text-left">
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        <!-- /.card-footer -->
      </form>
    </div>

  </div>
</div>

<?= $this->endSection(); ?>