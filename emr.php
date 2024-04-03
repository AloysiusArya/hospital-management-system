<?php
include("header.php");

// Ambil data dari formulir
$id_pasien = $_POST['id_pasien'];
$service_desc = $_POST['service_desc'];
$service_cost = $_POST['service_cost'];
$reg_number = $_POST['reg_number'];
$appoint_number = $_POST['appoint_number'];

// Query untuk menyimpan data ke dalam tabel EMR
$query = "INSERT INTO emr (ID_Pasien, Service_Desc, Service_Cost, REG_Number, Appoint_Number) 
          VALUES ('$id_pasien', '$service_desc', '$service_cost', '$reg_number', '$appoint_number')";

if (mysqli_query($koneksi, $query)) {
    echo "Data berhasil ditambahkan.";
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
}

// Tutup koneksi ke database
mysqli_close($koneksi);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electronic Medical Records</title>
</head>
<body>
    <h2>Input Data Pemeriksaan</h2>
    <form action="process.php" method="post">
        <label for="id_pasien">ID Pasien:</label>
        <input type="text" name="id_pasien" required><br>

        <label for="service_desc">Service Description:</label>
        <textarea name="service_desc" rows="4" required></textarea><br>

        <label for="service_cost">Service Cost:</label>
        <input type="text" name="service_cost" required><br>

        <label for="reg_number">REG Number:</label>
        <input type="text" name="reg_number" required><br>

        <label for="appoint_number">Appoint Number:</label>
        <input type="text" name="appoint_number" required><br>

        <input type="submit" value="Tambah Data">
    </form>
</body>
</html>

<?php
include("footer.php");
?>