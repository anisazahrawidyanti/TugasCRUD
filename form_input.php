<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <form action="" method="post" class="form" style="border : 1px solid black; width : 40%; margin : 1% 30% 2% 30%">
        <h2 style="font-size: 28px; text-align: center; font-family: Comic Sans MS; margin: 10px 0px">FORM INPUT PRODUK</h2>
        <table class="table table-borderless" align="center">
            <tr>
                <td style="font-size: 20px; width: 30%">Kode Produk</td>
                <td><input type="text" class="form-control" name="kode_produk" required></td>
            </tr>
            <tr>
                <td style="font-size: 20px; width: 30%">Nama Produk</td>
                <td><input type="text" class="form-control" name="nama_produk" required></td>
            </tr>
            <tr>
                <td style="font-size: 20px; width: 30%">Harga Produk</td>
                <td><input type="Number" class="form-control" name="harga" required></td>
            </tr>
            <tr>
                <td style="font-size: 20px; width: 30%">Satuan</td>
                <td>
                    <select name="satuan" class="form-control">
                        <option value="null">Pilih...</option>
                        <option value="Gelas">Gelas</option>
                        <option value="Piring">Piring</option>
                        <option value="Mangkuk">Mangkuk</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td style="font-size: 20px; width: 30%">Kategori</td>
                <td>
                    <select name="kategori" class="form-control">
                        <option value="null">Pilih...</option>
                        <option value="Makanan">Makanan</option>
                        <option value="Minuman">Minuman</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td style="font-size: 20px; width: 30%">URL Gambar</td>
                <td><input type="text" class="form-control" name="url_gambar" required></td>
            </tr>
            <tr>
                <td style="font-size: 20px; width: 30%">Stok Awal</td>
                <td><input type="Number" class="form-control" name="stok" required></td>
            </tr>
            <tr>
                <td colspan = 2 class="td"><input type="submit" name="submit" class="btn btn-primary" value="Simpan"></td>
            </tr>
        </table>
    </form>

    <table class="table table-bordered" align="center" style="width: 95%;">
        <tr class="table-secondary">
            <th style="text-align : center">NO</th>
            <th style="text-align : center">Kode Produk</th>
            <th style="text-align : center">Nama Produk</th>
            <th style="text-align : center">Harga Produk</th>
            <th style="text-align : center">Satuan</th>
            <th style="text-align : center">Kategori</th>
            <th style="text-align : center">Gambar</th>
            <th style="text-align : center">Stok Awal</th>
            <th style="text-align : center">Modify</th> 
        </tr>

        <?php 
        include ('koneksi.php');
        $hasil = $con-> query("SELECT * FROM `data_produk`");
        ?>

        <?php
        foreach($hasil as $data){
            
        ?>

        <tr>
            <td style="text-align : center"><?php echo $data['no']; ?></td>
            <td style="text-align : center"><?php echo $data['kode_produk']; ?></td>
            <td><?php echo $data['nama_produk']; ?></td>
            <td style="text-align : center"><?php echo $data['harga']; ?></td>
            <td><?php echo $data['satuan']; ?></td>
            <td><?php echo $data['kategori']; ?></td>
            <td><img src="<?php echo $data['url_gambar']; ?>" style="width: 120px;" alt=""></td>
            <?php 
                if ($data['stok'] < 5) {
                    echo "<td style = 'background : red; color : white; text-align : center'>".$data['stok']."</td>";
                } else {
                    echo "<td style='text-align : center'>".$data['stok']."</td>";
                }
            ?>
            <td style="text-align : center"><a href="form_edit.php?key=<?php echo $data['no']; ?>">Edit</a> || <a href="delete_data.php?key=<?php echo $data['no']; ?>">Delete</a></td>
        </tr>

        <?php } ?>

        <?php
            if (isset($_POST['submit'])) {
                
                $kodep      = $_POST['kode_produk'];
                $namap      = $_POST['nama_produk'];
                $hargap     = $_POST['harga'];
                $satuanp    = $_POST['satuan'];
                $kategorip  = $_POST['kategori'];
                $gambarp    = $_POST['url_gambar'];
                $stokp      = $_POST['stok']; 
            
                $result = $con->exec("INSERT INTO `data_produk` (`no`,`kode_produk`, `nama_produk`, `harga`, `satuan`, `kategori`, `url_gambar`, `stok`) VALUES (NULL,'$kodep', '$namap', '$hargap', '$satuanp', '$kategorip', '$gambarp', '$stokp');");

                if ($result == TRUE) {
                    echo "
                        <script>
                            alert('data berhasil ditambah');
                            window.location = 'form_input.php';
                        </script>
                    ";
                    
                } else{
                    echo "
                        <script>
                            alert('data gagal ditambah');
                            window.location = 'form_input.php';
                        </script>
                    ";
                }
            }
        ?>
    </table>
        
</body>
</html>
