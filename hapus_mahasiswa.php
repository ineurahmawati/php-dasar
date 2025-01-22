<?php
session_start();
if (!isset($_SESSION['login'])) {
    if ($_SESSION['login'] != true) {
        header("Location: login.php");
        exit;
    }
}

$mysqli = new mysqli('localhost', 'root', '', 'tedc');

$NIM = $_GET['NIM'];

$delete = $mysqli->query("DELETE FROM students WHERE NIM='$NIM'");

if($delete) {
    if($delete) {
        $_SESSION['success'] = true;
        $_SESSION['message'] = 'Data Berhasil Dihapus';
    header("Location: mahasiswa.php");
    exit();
    }
}
?>