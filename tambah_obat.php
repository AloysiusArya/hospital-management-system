<?php
session_start();
include("koneksi.php");
if(!isset($_SESSION['admin_username'])){
    header("location:login.php");
}
print_r($_SESSION['admin_akses']);

// Proses form jika disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_obat = $_POST['nama_obat'];
    $exp_date = $_POST['exp_date'];
    $stock = $_POST['stock'];
    $obat_cost = $_POST['harga_obat'];

    // Query untuk menambahkan obat baru
    $insert_query = "INSERT INTO obat (Nama_Obat, EXP_Date, Stock, Obat_Cost) VALUES ('$nama_obat', '$exp_date', '$stock', '$obat_cost')";
    mysqli_query($koneksi, $insert_query);

    // Redirect ke halaman daftar inventaris obat setelah penambahan obat
    header("location: laman_apoteker.php");
}
?>

<html>
<body>

<h2>Tambah Obat Baru</h2>

<form method="post" action="">
    <label for="nama_obat">Nama Obat:</label>
    <input type="text" name="nama_obat" required>

    <label for="exp_date">EXP Date:</label>
    <input type="date" name="exp_date" required>

    <label for="stock">Stok:</label>
    <input type="text" name="stock" required>

    <label for="harga_obat">Harga Obat:</label>
    <input type="text" name="harga_obat" required>

    <input type="submit" value="Tambah Obat">
</form>

</body>
</html>
