<?php
session_start();
include("koneksi.php");
if(!isset($_SESSION['admin_username'])){
    header("location:login.php");
}
print_r($_SESSION['admin_akses']);

// Ambil ID obat dari URL
$reg_number = $_GET['reg_number'];

// Query untuk menghapus obat
$delete_query = "DELETE FROM obat WHERE REG_Number='$reg_number'";
mysqli_query($koneksi, $delete_query);

// Redirect kembali ke halaman inventaris obat
header("location: laman_apoteker.php");
?>
