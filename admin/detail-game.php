<?php

require_once "../database/koneksi.php";
$id_game = $_GET['id_game'];
$stmt = $db->prepare("SELECT 
        `nama_game` as `nama`,
        `icon_game` as `icon`,
        `kategori`,
        `deskripsi`,
        `total_download` as `d_total`
        FROM `daftar_game` WHERE `id` = '$id_game'");
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data["nama"] ?></title>
</head>
<body>
<center>
    <h1><?php echo $data["nama"] ?></h1>
    <hr>
    <img src="../img/<?php echo $data['icon'] ?>" alt="" width="100" height="100">
</center>
    <p><?php echo $data["deskripsi"] ?></p>
    <hr style="color: red;">

<p>Total download : <?php echo $data["d_total"] ?></p>
</body>
</html>