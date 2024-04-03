<?php 
include("header.php");
// Query untuk mengambil data obat
$query = "SELECT * FROM obat";
$result = mysqli_query($koneksi, $query);
?>

<html>
<body>

<h1>Halaman Apoteker</h1>
Selamat datang di laman apoteker

<h2>Daftar Inventaris Obat</h2>

<table border="1">
    <tr>
        <th>REG Number</th>
        <th>Nama Obat</th>
        <th>EXP Date</th>
        <th>Stock</th>
        <th>Obat Cost</th>
        <th>Aksi</th>
    </tr>

    <?php
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['REG_Number'] . "</td>";
        echo "<td>" . $row['Nama_Obat'] . "</td>";
        echo "<td>" . $row['EXP_Date'] . "</td>";
        echo "<td>" . $row['Stock'] . "</td>";
        echo "<td>" . $row['Obat_Cost'] . "</td>";
        echo "<td>";
        echo "<a href='edit_obat.php?reg_number=" . $row['REG_Number'] . "'>Edit</a> | ";
        echo "<a href='hapus_obat.php?reg_number=" . $row['REG_Number'] . "' onclick='return confirm(\"Apakah Anda yakin ingin menghapus obat ini?\")'>Hapus</a>";
        echo "</td>";
        echo "</tr>";
    }
    ?>
</table>
<div id="app">
        <nav>
            <ul>
                <li><a href='tambah_obat.php'>Tambah Obat</a></li>
            </ul>
        </nav>
</div>

</body>
</html>

<?php
include("footer.php");
?>
