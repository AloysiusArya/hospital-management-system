<?php
include('koneksi.php');
if(!empty($_POST["specilizationid"])) 
{

 $sql=mysqli_query($koneksi,"select Nama_Pasien,Nama_Dokter from jadwal_pasien where tanggal='".$_POST['specilizationid']."'and aturan_pakai != '' and aturan_obat != '' and status_obat = 0");?>
 <option selected="selected">Select Patient</option>
 <?php
 while($row=mysqli_fetch_array($sql))
 	{?>
  <option value="<?php echo htmlentities($row['Nama_Pasien']); ?>"><?php echo htmlentities($row['Nama_Pasien']); ?></option>
  <?php
}
}

if(!empty($_POST["doctor"])) 
{

 $sql=mysqli_query($koneksi,"select Nama_Dokter from jadwal_pasien where Nama_Pasien='".$_POST['doctor']."'and aturan_pakai != '' and aturan_obat != '' and status_obat = 0");?>
 <option selected="selected">Select Dokter</option>
 <?php
 while($row=mysqli_fetch_array($sql))
 	{?>
 <option value="<?php echo htmlentities($row['Nama_Dokter']); ?>"><?php echo htmlentities($row['Nama_Dokter']); ?></option>
  <?php
}
}
if(!empty($_POST["doktor"])) 
{

 $sql=mysqli_query($koneksi,"select aturan_obat from jadwal_pasien where Nama_Dokter='".$_POST['doktor']."'and aturan_pakai != '' and aturan_obat != '' and status_obat = 0");
 while($row=mysqli_fetch_array($sql))
 	{?>
 <option value="<?php echo htmlentities($row['aturan_obat']); ?>"><?php echo htmlentities($row['aturan_obat']); ?></option>
  <?php
}
}
?>

