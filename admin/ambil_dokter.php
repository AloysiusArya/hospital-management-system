<?php
include('koneksi.php');
if(!empty($_POST["specilizationid"])) 
{

 $sql=mysqli_query($koneksi,"select Nama_Dokter,ID_Dokter from dokter where Spesialisasi='".$_POST['specilizationid']."'");?>
 <option selected="selected">Select Doctor </option>
 <?php
 while($row=mysqli_fetch_array($sql))
 	{?>
  <option value="<?php echo htmlentities($row['Nama_Dokter']); ?>"><?php echo htmlentities($row['Nama_Dokter']); ?></option>
  <?php
}
}

if(!empty($_POST["doctor"])) 
{

 $sql=mysqli_query($koneksi,"select harga,ID_Dokter from dokter where Nama_Dokter='".$_POST['doctor']."'");
 while($row=mysqli_fetch_array($sql))
 	{?>
 <option value="<?php echo htmlentities($row['harga']); ?>"><?php echo htmlentities($row['harga']); ?></option>
  <?php
}
}
?>

