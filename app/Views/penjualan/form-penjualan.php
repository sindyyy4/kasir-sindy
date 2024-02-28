<?=$this->extend('Layout/template');?>
<?=$this->section('content');?>
<div class="container-fluid px-4">
<h1>Data Transaksi</h1>
<hr/>
<div class="row" style="min-height:350px">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
        <h3><i class="menu-icon ti-money"></i>Penjualan Produk</h3>
     <form id="form-penjualan" class="mt-4 needs-validation" method="POST" action="<?= site_url('form-penjualan'); ?>" novalidate>
    <div class="row mb-2">
        <label class="col-sm-4 col-form-label" style="color: gray">No. Faktur :    <?= $no_faktur;?>
         </label>
        <label class="col-sm-4 col-form-label" style="color: gray">Tanggal : <?= date('Y-m-d H:i:s'); ?> </label>
        <label class="col-sm-4 col-form-label" style="color: gray">Kasir : <?=session()->get('nama_user');?></label>
    </div>
    <hr color="black"/>
    <div class="row mb-2">
        <label class="col-sm-3 col-form-label">Produk</label>
        <div class="col-sm-9">
           <input type="hidden" value="<?=$no_faktur;?>" name="no_faktur" class="form-control" > 
            <select class="form-control  js-example-basic-multiple"  name="id_produk[]" id="id_produk">
                <option value="">Pilih Produk</option>
                <?php foreach ($listProduk as $produk) : ?>
                    <option value="<?= $produk->id_produk ?>" data-harga="<?= $produk->harga_jual ?>">
                        <?= $produk->kode_produk ?> | <?= $produk->nama_produk ?> | <?=$produk->stok ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="row mb-2">
        <label class="col-sm-3 col-form-label">Jumlah</label>
        <div class="col-sm-3">
            <input type="text" class="form-control" name="jumlah" id="jumlah" width="20"
                   placeholder="Masukkan jumlah" required/>
            <div class="invalid-feedback">Jumlah tidak boleh kosong</div>
        </div>
        <label class="col-sm-3 col-form-label">Harga Satuan</label>
        <div class="col-sm-3">
            <input type="text" class="form-control" name="harga_jual" id="harga_jual" width="20"
                   placeholder="Harga satuan" readonly required/>
            <div class="invalid-feedback">Harga satuan tidak boleh kosong</div>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-sm-3">
            <button type="submit" class="btn sm btn-primary">Simpan</button>
            <!-- <button type="submit" class="btn sm btn-danger">Bayar</button> -->
        </div>
        <br/>
    </div>
</form>

 <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#smallmodal" style="float:right;"  href="<?=site_url('form-penjualan');?>"><i class="fa fa-plus-square" style="color: #ffffff;"></i> Tambah</button>
<a href="/form-penjualan/savePembayaran" class="btn btn-danger"  >
            <i class="fa fa-plus-money" style="color: #ffffff;"></i> Bayar</a>



      <table class="table">
  <thead>
    <tr>
        <th>No</th>
        <th>Nama Produk</th>
        <th>Jumlah</th>
        <th>Total Harga</th>
        <th>Aksi</th>
        <!-- <th>Diskon</th> -->
        <!-- <th>subtotal</th> -->
        
    </tr>
    
  </thead>

  <tbody>
                    <?php if(isset($listPenjualan) && !empty($listPenjualan)) :
    $no = 1;
    foreach ($listPenjualan as $detail) : ?>
    <tr>
        <td><?= $no++; ?></td>
        <td><?= $detail['nama_produk']; ?></td>
        <td><?= $detail['qty']; ?></td>
        <td><?= number_format($detail['total_harga'], 0, ',', '.'); ?></td>
        <td>
            <!-- Tambahkan sintaks di bawah ini -->
          <a href="<?= site_url('hapus-barang/'.$detail['kode_detailpenjualan']) ?>" onClick="return confirm('Anda Yakin ?')" class="btn btn-danger btn-sm fw-bold"><i class="fa fa-trash-o"></i></a>

        </td>
    </tr>
<?php endforeach;
else: ?>
    <tr>
        <td colspan="4">Tidak ada produk</td>
    </tr>
<?php endif; ?>
              </tbody>

</table>

 <div class="col">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">TOTAL : RP <?= number_format($totalHarga, 0, ',', '.'); ?></h3>
                    </div>
 
        </div>

       

    <!-- </form> -->
    </div>
		</div>
	</div>
</div>
                    </div>

 <div class="modal fade" id="smallmodal" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="smallmodalLabel">Form Pembayaran</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form method="POST" class="needs-validation" action="/form-penjualan/savePembayaran" novalidate>
                        <div class="modal-body">
                            <h5 align="center">Total : <?= $totalHarga ?> </h5>
                        <div class="row mb-2">
                        <label class="col-sm-4 col-form-label">Bayar</label>
                        <div class="col-sm-13">
                            <input type="text" class="form-control uang" name="bayar" id="bayar" width="20"
                                placeholder="Masukkan nominal" required/>
                            <div class="invalid-feedback">Bayar tidak boleh kosong</div>
                        </div>
                        </div>
            
                        <div class="row mb-2">
                        <label class="col-sm-4 col-form-label">Kembali</label>
                        <div class="col-sm-13">
                            <input type="text" class="form-control uang" name="kembali" id="kembali" width="20"
                                placeholder="kembali"  required/>
                            <!-- <div class="invalid-feedback">Harga satua tidak boleh kosong</div> -->
                        </div>
                    </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                        </form>
                    </div>
                </div>

            </div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"  crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

 

<script>
    // Menggunakan jQuery untuk menangani perubahan nilai dropdown
    // Menggunakan jQuery untuk menangani perubahan nilai dropdown
    $('#id_produk').on('change', function() {
        var harga_jual = $(this).find('option:selected').data('harga');
        $('#harga_jual').val(harga_jual);
    });
</script>

<script>
    $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Ambil elemen-elemen yang diperlukan
        var bayar = document.getElementById('bayar');
        var kembali = document.getElementById('kembali');
        var totalHarga = <?= $totalHarga ?>;  // Ambil total harga dari controller dan diteruskan ke view

        // Tambahkan event listener untuk memantau perubahan pada input bayar
        bayar.addEventListener('input', function() {
            // Ambil nilai yang dibayarkan dan konversi ke tipe data float
            var bayarValue = parseFloat(bayar.value);

            // Hitung kembaliannya
            var kembalian = bayarValue - totalHarga;

            // Tampilkan kembaliannya pada input kembali
            if (kembalian >= 0) {
                kembali.value = kembalian.toFixed(2).replace(/(\.00)+$/, ''); // Menampilkan hingga 2 digit desimal
            } else {
                kembali.value = '0'; // Jika kembalian negatif, tampilkan '0.00'
            }
        });
    });
</script>


<?=$this->endSection();?>