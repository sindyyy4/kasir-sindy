<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>


<div class="pagetitle">
  <h1></h1>
  <p></p>
</div>

<div class="col-lg-12">

  <div class="card">
    <div class="card-body">
      <h5 class="card-title"></h5>
<!-- SINDIIIIIIIIU -->
      <!-- Vertical Form -->
      <form class="row g-3"  action="<?=site_url('update-pengguna');?>" method="POST">
        <div class="col-12">
          <label for="inputNanme4" class="form-label">Nama Pengguna</label>
          <input type="hidden" class="form-control" id="InputJenis" name="id_user" value="<?=$dataPengguna[0]['id_user'];?>"> 
          <input type="text" class="form-control" id="InputJenis" name="nama_user" value="<?=$dataPengguna[0]['nama_user'];?>"> 
          <label for="inputNanme4" class="form-label">Username</label>
          <input type="text" class="form-control" id="inputJenis" name="username" required name="pengguna" value="<?=$dataPengguna[0]['username'];?>">
          <label for="inputNanme4" class="form-label">Password</label>
          <input type="text" class="form-control" id="inputJenis" name="password" required name="pengguna" value="<?=$dataPengguna[0]['password'];?>">
          <label for="inputNanme4" class="form-label">Level</label>
         <select class="form-select"name="level" aria-label="Default select example">
           
            <option value="admin" <?=$dataPengguna[0]['level']=='admin'?'selected':null;?> >admin</option>
            <option value="kasir" <?=$dataPengguna[0]['level']=='kasir'?'selected':null;?> >kasir</option>
         </select>
        <div class="text-left">
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form><!-- Vertical Form -->
    </div>
  </div>

  <?= $this->endSection(); ?>