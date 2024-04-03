<?php
include("koneksi.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari formulir
    $id_user = $_POST['id_user'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Query untuk mendapatkan data user berdasarkan ID
    $querybfr = "SELECT * FROM user_login WHERE login_id = $id_user";
    $result = mysqli_query($koneksi, $querybfr);
    $row = mysqli_fetch_assoc($result);

    // Query untuk mengupdate data user
    if ($row['Level'] == 2) {
        $query = "UPDATE user_login SET Nama_Dokter = '$nama', Username = '$username', Password = '$password' WHERE login_id = $id_user";
    } elseif ($row['Level'] == 3) {
        $query = "UPDATE user_login SET Nama_Pasien = '$nama', Username = '$username', Password = '$password' WHERE login_id = $id_user";
    } elseif ($row['Level'] == 4) {
        echo $query = "UPDATE user_login SET Nama_Apoteker = '$nama', Username = '$username', Password = '$password' WHERE login_id = $id_user";
    }

    if (mysqli_query($koneksi, $query)) {
        echo "Data user berhasil diupdate.";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }

    // Redirect kembali ke halaman daftar user
    header("location: listadmin.php");
} else {
    // Jika form tidak di-submit, kembalikan ke halaman sebelumnya atau halaman lain jika diperlukan
    header("location: edit_user.php");
}
?>