<?php
require_once "../database/koneksi.php";
$id = $_GET['id'];
$stmt = $db->prepare("DELETE FROM `daftar_game` WHERE `id` = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
header("location: index.php");
?>