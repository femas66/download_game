<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah game</title>
</head>
<body>
    <form action="" method="post"> 
        <input type="hidden" name="total_download" value="0">
        <input type="text" name="nama_game" placeholder="Nama game" required><br>
        <input type="text" name="icon_game" placeholder="Icon game" required><br>
        <input type="text" name="kategori" placeholder="Kategori" required><br>
        <textarea name="deskripsi" cols="30" rows="10"></textarea><br>
        <button type="submit" name="submit">Buat</button>
    </form>
</body>
</html>
<?php
require_once "../database/koneksi.php";
if(isset($_POST['submit'])) {
    $nama_game = $_POST['nama_game'];
    $icon_game = $_POST['icon_game'];
    $kategori = $_POST['kategori'];
    $deskripsi = $_POST['deskripsi'];
    $total_download = $_POST['total_download'];
    $q = $db->query("INSERT INTO daftar_game (nama_game, icon_game, kategori, deskripsi, total_download) VALUES ('$nama_game', '$icon_game', '$kategori', '$deskripsi', $total_download)");
    if($q) {
        header("location: index.php");
    }
    else {
        die("Gagal");
    }
}

?>