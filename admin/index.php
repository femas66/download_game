<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <a href="tambah-game.php">Tambah game</a>
    <a href="logout.php">Logout</a>
    <br><h1>Daftar Game</h1><br>
    <center>
    <table border="1" width="80%" cellpadding="0" cellspacing="0">
        <?php
        require_once '../database/koneksi.php';
        $stmt = $db->prepare("SELECT * FROM daftar_game");
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo "
                <tr>
                    <td width='120' rowspan='2'><img src='../img/$row[icon_game]' width='120' height='120' </td>
                    <td><p height='40'>$row[nama_game]</p></td>
                    <td rowspan='2'><a href='edit-game.php?id=$row[id]'>Edit</a></td>
                    <td rowspan='2'><a href='hapus-game.php?id=$row[id]'>Hapus</a></td>
                </tr>
                <tr>
                    <td><p>Kategori : $row[kategori]<br>Total download : $row[total_download]</p></td>
                </tr>
                ";
            }
        }
        else {
            echo "Tidak ada game";
        }
        $stmt->close();
        ?>
        
    </table>
</center>
</body>
</html>