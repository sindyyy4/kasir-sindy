<!DOCTYPE <html>
<html lang="en"> 

<head>  
    <meta charset="UTF-8">  
    <meta http-equiv="X-UA-Compatible" content="IE=edge">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Generate PDF CodeIgniter 4 - qadrLabs</title>  

</head>  

<body>  
<h2>Data Laporan Stok </h2>  
<a href="<?php echo site_url('pdf/generate') ?>">  
    Download PDF  
</a>  
<table border=1 width=80% cellpadding=2 cellspacing=0 style="margin-top: 5px; text-align:center">  
    <thead>    <tr bgcolor=silver align=center>  
        <td width="5%">No</td>  
        <td width="25%">Nama Produk</td>  
        <td width="50%">Harga Jual</td> 
        <td width="50%">Harga Beli</td> 
        <td width="20%">Stok</td>  
    </tr>    </thead>   <tbody>
                      <?php
                        if(isset($listProduk)) :
                            $no = 0; // inisialisasi nomor
                            foreach($listProduk as $baris) :
                                $no++;
                        ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $baris->nama_produk ?></td>
                                    <td><?= $baris->harga_beli ?></td>
                                    <td><?= $baris->harga_jual ?></td>
                                    <td><?= $baris->stok ?></td>
                                </tr>
                        <?php
                            endforeach;    
                        endif;
                        ?>

                        </tbody></table>  
  </body>
</html>