<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<!-- Horizontal Form -->
<div class="row">
    <div class="col-lg-12">
        <div class="card card-info ">

            <!-- form start -->
            <form action="<?= site_url('update-produk'); ?>" method="POST">
                <div class="card-body">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-7 col-form-label">Edit Produk</label>
                        <div class="col-sm-10">
                            
                            <label for="form-group">Kode Produk</label>
                            <input type="hidden" class="form-control" id="inputJenis" name="id_produk" value="<?=$dataProduk[0]['id_produk'];?>">
                            <input type="text" class="form-control" id="inputJenis" name="kode_produk" value="<?=$dataProduk[0]['kode_produk'];?>">
                            </div>
                            <div class="form-group">
                            <label for="kode_produk">Nama Produk</label>
                            <input type="text" class="form-control" id="inputJenis" name="nama_produk" value="<?=$dataProduk[0]['nama_produk'];?>">
                            </div>
                            <div class="form-group">
                            <label for="kode_produk">Harga Jual</label>
                            <input type="text" class="form-control" id="inputJenis" name="harga_jual" value="<?=$dataProduk[0]['harga_jual'];?>">
                            </div>
                            <div class="form-group">
                            <label for="kode_produk">Stok</label>
                            <input type="text" class="form-control" id="inputJenis" name="stok" value="<?=$dataProduk[0]['stok'];?>">
                            </div>
                            <div class="form-group">
                            <label for="kode_produk">Harga Beli</label>
                            <input type="text" class="form-control" id="inputJenis" name="harga_beli" value="<?=$dataProduk[0]['harga_beli'];?>">
                            </div>
                            <div class="col-12">
                            <label for="inputNanme4" class="form-label">Satuan Produk</label>
                            <select class="form-control" id="inputSatuan" name="jenis_satuan">
                            <?php if (isset($listSatuan)) {
                            $no = null;             
                           foreach ($listSatuan as $baris) {
                           $no++;
                            echo '<option value="' . $baris['id_satuan'] . '">' . $baris['nama_satuan'] . '</option>';
                           }
                           }
                           ?>
                       </select>
                       </div>
                       </div>
                       <div class="col-12">
                       <label for="inputNanme4" class="form-label">Kategori Produk</label>
                       <select class="form-control" id="inputJenis" name="jenis_kategori">
                       <?php
                    if (isset($listKategori)) {
                        
                   $no = null;
                        foreach ($listKategori as $baris) {
                $no++;
                $listKategori[0]['kode_kategori'] == $baris['kode_kategori']? $pilih='selected':$pilih=null;
                echo '<option value="' . $baris['kode_kategori'] . '">' . $baris['nama_kategori'] . '</option>';
              }
            }

            ?>
          </select>
        </div>
                            <required name="produk" placeholder="Masukan Nama Produk">
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="text-left">
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form><!-- Vertical Form -->
    </div>
  </div>
                <!-- /.card-footer -->
            </form>
        </div>

    </div>
</div>

<?= $this->endSection(); ?>