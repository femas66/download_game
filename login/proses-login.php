<?php
require_once "../database/koneksi.php";
$username = $_POST['username'];
$password = $_POST['password'];

$q = $db->query("SELECT * FROM admin WHERE username = '$username' AND password = '$password'");
if($q->num_rows > 0){
    session_start();
    $data = $q->fetch_assoc();
    $_SESSION['id_admin'] = $data['id_admin'];
    header("location: ../admin/");
}
else {
    ?>
    <script>
        alert("Login gagal");
        window.location = "index.html";
    </script>
    <?php
}
?>