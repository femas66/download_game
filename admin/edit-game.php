<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit game</title>
</head>
<body>
    <a href="index.php">Home</a>
    <?php
    require_once "../database/koneksi.php";
    $id = $_GET['id'];
    $stmt = $db->prepare("SELECT * FROM daftar_game WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();
    ?>
    <form action="" method="post"> 
        <input type="text" name="nama_game" placeholder="Nama game" value="<?php echo $data['nama_game'] ?>"><br>
        <input type="text" name="kategori" placeholder="Kategori" value="<?php echo $data['kategori'] ?>"><br>
        <textarea name="deskripsi" cols="30" rows="10"><?php echo $data['deskripsi'] ?></textarea><br>
        <button type="submit" name="submit">Edit</button>
    </form>
</body>
</html>
<?php
if(isset($_POST['submit'])){
    require_once "../database/koneksi.php";
    $nama_game = $_POST['nama_game'];
    $kategori = $_POST['kategori'];
    $deskripsi = $_POST['deskripsi'];
    $stmt = $db->prepare("UPDATE `daftar_game` SET `nama_game` = ?, `kategori` = ?, `deskripsi` = ? WHERE `id` = ?");
    $stmt->bind_param("sssi", $nama_game, $kategori, $deskripsi, $id);
    $stmt->execute();
    header("location: index.php");
}
?>