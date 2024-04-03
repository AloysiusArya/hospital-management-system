<?php
include("koneksi.php");
//validasi kelengkapan
$valid = true;
$pesanError = "";
foreach($_POST as $value) {
 if (trim($value) == "") {
  $valid = false;
  $pesanError .= 'Data tidak lengkap <br/>'; 
  
 }
}

//validasi kesamaan password
if($_POST["password"] != $_POST["confirmPassword"]) {
 $valid = false;
 $pesanError .= 'Password dan konfirm password berbeda<br/>';

 
}

if($valid) {
 $password = md5($_POST["password"]);
 $sql = mysqli_query($koneksi, "INSERT INTO user_login VALUES ('0', '".$_POST["fullName"]."', '0', '0', '0', '3','".$_POST["username"]."','".$password."')");
 $sql = mysqli_query($koneksi, "INSERT INTO pasien VALUES ('0', '".$_POST["fullName"]."', '".$_POST["nik"]."', '".$_POST["tanggal"]."', '".$_POST["gender"]."', '".$_POST["alamat"]."','".$_POST["metode"]."')");
 echo mysqli_error($koneksi);

 echo "Register Berhasil"; 
} else {
 echo $pesanError;
 
}
if ($valid) {
    echo "<br/><a href='./login.php'>Login Sekarang</a>";
}else{echo "<br/><a href='./signup.php'>Kembali ke form</a>";}

?>