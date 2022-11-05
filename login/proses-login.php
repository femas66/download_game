<?php
require_once "../database/koneksi.php";
$username = $_POST['username'];
$password = $_POST['password'];

$stmt = $db->prepare("SELECT * FROM admin WHERE username = ? AND password = ?");
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$result = $stmt->get_result();
if($result->num_rows > 0){
    session_start();
    $data_user = $result->fetch_assoc();
    $_SESSION['id_admin'] = $data_user['id'];
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
$stmt->close();
?>