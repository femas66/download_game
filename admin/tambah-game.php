<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah game</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data"> 
        <input type="hidden" name="total_download" value="0">
        <input type="text" name="nama_game" placeholder="Nama game" required><br>
        <input type="file" name="fileToUpload" id="fileToUpload"><br>
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
    $icon_game = $_FILES["fileToUpload"]["name"];
    $kategori = $_POST['kategori'];
    $deskripsi = $_POST['deskripsi'];
    $total_download = $_POST['total_download'];

    $target_dir = "../img/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
      // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
          echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
        } else {
          echo "Sorry, there was an error uploading your file.";
        }
    }

    $q = $db->query("INSERT INTO daftar_game (nama_game, icon_game, kategori, deskripsi, total_download) VALUES ('$nama_game', '$icon_game', '$kategori', '$deskripsi', $total_download)");
    if($q) {
        header("location: index.php");
    }
    else {
        die("Gagal");
    }
}

?>