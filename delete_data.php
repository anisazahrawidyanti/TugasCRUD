<?php
    include ('koneksi.php');

    $key = $_GET['key'];
    $hasil = $con->query("DELETE FROM `data_produk` WHERE `no`=$key ");

    if ($hasil == TRUE) {
        echo " 
            <script>
                alert('data berhasil dihapus');
                window.location = 'form_input.php';
            </script>
            ";
    } else {
        echo "
            <script>
                alert('data gagal dihapus');
                window.location = 'form_input.php';
            </script>
        ";
    }
?>
