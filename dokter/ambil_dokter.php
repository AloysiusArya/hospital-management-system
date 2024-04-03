<?php
session_start();
include('koneksi.php');
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
if(!empty($_POST["specilizationid"])) 
{

 $sql=mysqli_query($koneksi,"select Nama_Pasien from jadwal_pasien where tanggal='".$_POST['specilizationid']."' and status_pasien != 0 and status_dokter != 0 and Nama_Dokter = '$nama_dokter'");?>
 <option selected="selected">Pilih Pasien</option>
 <?php
 while($row=mysqli_fetch_array($sql))
 	{?>
  <option value="<?php echo htmlentities($row['Nama_Pasien']); ?>"><?php echo htmlentities($row['Nama_Pasien']); ?></option>
  <?php
}
}

if(!empty($_POST["doctor"])) 
{

 $sql=mysqli_query($koneksi,"select Nama_Pasien from jadwal_pasien where jam='".$_POST['doctor']."'");?>
 <option selected="selected">Pilih Pasien</option>
 <?php while($row=mysqli_fetch_array($sql))
 	{?>
 <option value="<?php echo htmlentities($row['Nama_Pasien']); ?>"><?php echo htmlentities($row['Nama_Pasien']); ?></option>
  <?php
}
}
?>

