<?php
    include('koneksi.php');

    $pk = $_POST['no'];
    
    $kodep      = $_POST['kode_produk'];
    $namap      = $_POST['nama_produk'];
    $hargap     = $_POST['harga'];
    $satuanp    = $_POST['satuan'];
    $kategorip  = $_POST['kategori'];
    $gambarp    = $_POST['url_gambar'];
    $stokp      = $_POST['stok']; 

    $hasil = $con-> query("UPDATE `data_produk` SET `kode_produk` = '$kodep', `nama_produk` = '$namap', `harga` = '$hargap', `satuan` = '$satuanp', `kategori` = '$kategorip', `url_gambar` = '$gambarp', `stok` = '$stokp' WHERE `data_produk`.`no` = $pk ");
    
    if ($hasil == TRUE) {
        echo "
            <script>
                alert('data berhasil diedit');
                window.location = 'form_input.php';
            </script>
        ";
        
    } else{
        echo "
            <script>
                alert('data gagal diedit');
                window.location = 'form_input.php';
            </script>
        ";
    }

?>
