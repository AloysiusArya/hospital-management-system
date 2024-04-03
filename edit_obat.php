<?php
session_start();
include("koneksi.php");
if(!isset($_SESSION['admin_username'])){
    header("location:login.php");
}
print_r($_SESSION['admin_akses']);

// Ambil ID obat dari URL
$reg_number = $_GET['reg_number'];

// Query untuk mengambil data obat berdasarkan REG Number
$query = "SELECT * FROM obat WHERE REG_Number='$reg_number'";
$result = mysqli_query($koneksi, $query);
$row = mysqli_fetch_assoc($result);

// Proses form jika disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stock_baru = $_POST['stock'];
    $harga_baru = $_POST['harga'];

    // Update stok dan harga obat
    $update_query = "UPDATE obat SET Stock='$stock_baru', Obat_Cost='$harga_baru' WHERE REG_Number='$reg_number'";
    mysqli_query($koneksi, $update_query);

    // Redirect ke halaman daftar inventaris obat setelah penambahan obat
    header("location: laman_apoteker.php");
}
?>

<html>
<body>

<h2>Edit Obat</h2>

<form method="post" action="">
    <label for="nama_obat">Nama Obat:</label>
    <input type="text" name="nama_obat" value="<?php echo $row['Nama_Obat']; ?>" readonly>

    <label for="exp_date">EXP Date:</label>
    <input type="text" name="exp_date" value="<?php echo $row['EXP_Date']; ?>" readonly>

    <label for="stock">Stok Baru:</label>
    <input type="text" name="stock" value="<?php echo $row['Stock']; ?>" required>

    <label for="harga">Harga Baru:</label>
    <input type="text" name="harga" value="<?php echo $row['Obat_Cost']; ?>" required>

    <input type="submit" value="Simpan Perubahan">
</form>

</body>
</html>
