<?php
include("koneksi.php");

// Mendapatkan ID user yang akan diedit dari parameter URL
$id_user = $_GET['id_user'];

// Query untuk mendapatkan data user berdasarkan ID
$query = "SELECT * FROM user_login WHERE login_id = $id_user";
$result = mysqli_query($koneksi, $query);
$row = mysqli_fetch_assoc($result);
?>

<h1>Edit User</h1>

<form method="post" action="proses_edit_user.php">
    <input type="hidden" name="id_user" value="<?php echo $row['login_id']; ?>">

    <label for="nama">Nama:</label>
    <input type="text" name="nama" value="<?php 
    if ($row['Level'] == 2) {
        echo $row['Nama_Dokter'];
    } elseif ($row['Level'] == 3) {
        echo $row['Nama_Pasien'];
    } elseif ($row['Level'] == 4) {
        echo $row['Nama_Apoteker'];
    }
    ?>" required><br>

    <label for="username">Username:</label>
    <input type="text" name="username" value="<?php echo $row['Username']; ?>" required><br>

    <label for="password">Password:</label>
    <input type="password" name="password" required><br>

    <input type="submit" value="Simpan Perubahan">
</form>