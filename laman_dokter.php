<?php 
include("header.php");

$err = '';
$username = $_SESSION['admin_username'];

$sql1 = "SELECT * FROM user_login WHERE Username = '$username'";
$q1 = mysqli_query($koneksi,$sql1);
$r1 = mysqli_fetch_array($q1);
if($r1['Nama_Dokter'] == NULL){
    $err .= "<li>Dokter tidak ditemukan</li>";
}if(empty($err)){
    $nama_dokter = $r1['Nama_Dokter'];
}


// Query untuk mengambil jadwal pemeriksaan dokter
echo "Selamat datang dokter ";
echo $nama_dokter;
$query = "SELECT * FROM jadwal_dokter WHERE Nama_Dokter='$nama_dokter' AND Tanggal_Periksa >= CURDATE() ORDER BY Tanggal_Periksa, Waktu_Periksa";
$result = mysqli_query($koneksi, $query);
?>
<h1>Halaman Dokter</h1>
Selamat datang di laman dokter

<h2>Jadwal Pemeriksaan</h2>

<table border="1">
    <tr>
        <th>Appoint Number</th>
        <th>Tanggal Periksa</th>
        <th>Waktu Periksa</th>
        <th>ID Dokter</th>
        <th>Nama Dokter</th>
        <th>Aksi</th>
    </tr>

    <?php
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['Appoint_Number'] . "</td>";
        echo "<td>" . $row['Tanggal_Periksa'] . "</td>";
        echo "<td>" . $row['Waktu_Periksa'] . "</td>";
        echo "<td>" . $row['ID_Dokter'] . "</td>";
        echo "<td>" . $row['Nama_Dokter'] . "</td>";
        echo "<a href='emr.php?reg_number=" . $row['Appoint_Number'] . "'>EMR</a> | ";
        echo "</tr>";
    }
    ?>
</table>

<?php
include("footer.php");
?>