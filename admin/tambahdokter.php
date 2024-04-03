<?php 
session_start();
include("koneksi.php");
if(!isset($_SESSION['admin_username'])){
    header("location:login.php");
}


if(isset($_POST['submit']))
{
$namadokter=$_POST['patname'];
$spesialisasi=$_POST['spesialisasi'];
$gender=$_POST['gender'];
$username=$_POST['username'];
$password=$_POST['password'];
$hashedPassword = md5($password);
$harga= 500;
$level = 2;
$query=mysqli_query($koneksi,"insert into user_login(Nama_Dokter,Level,Username,Password) values('$namadokter','$level','$username','$hashedPassword')");
$query=mysqli_query($koneksi,"insert into dokter(Nama_Dokter,Gender_Dokter,Spesialisasi,harga) values('$namadokter','$gender','$spesialisasi','$harga')");
	if($query)
	{
		echo "<script>alert('Dokter sukses ditambahkan');</script>";
	}

}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Admin| Tambah Dokter</title>
		
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
		<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
		<link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="assets4/css/styles.css">
		<link rel="stylesheet" href="assets4/css/plugins.css">
		<link rel="stylesheet" href="assets4/css/themes/theme-1.css" id="skin_color" />

	</head>
	<body>
		<div id="app">		
<?php include('include/sidebar.php');?>
<div class="app-content">
<?php include('include/header.php');?>
						
<div class="main-content" >
<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
<section id="page-title">
<div class="row">
<div class="col-sm-8">
<h1 class="mainTitle">Admin | Tambah Dokter</h1>
</div>
<ol class="breadcrumb">
<li>
<span>Medicine</span>
</li>
<li class="active">
<span>Tambah Dokter</span>
</li>
</ol>
</div>
</section>
<div class="container-fluid container-fullw bg-white">
<div class="row">
<div class="col-md-12">
<div class="row margin-top-30">
<div class="col-lg-8 col-md-12">
<div class="panel panel-white">
<div class="panel-heading">
<h5 class="panel-title">Tambah Dokter</h5>
</div>
<div class="panel-body">
<form role="form" name="" method="post">

<div class="form-group">
<label for="doctorname">
Nama Dokter
</label>
<input type="text" name="patname" class="form-control"  placeholder="Nama Dokter" required="true">
</div>
<div class="form-group">
<label for="fess">
Spesialisasi
</label>
<input type="text" name="spesialisasi" class="form-control"  placeholder="Spesialisasi" required="true">
<div class="form-group">
<label class="block">
Gender
</label>
<div class="clip-radio radio-primary">
<input type="radio" id="rg-female" name="gender" value="P" >
<label for="rg-female">
Female
</label>
<input type="radio" id="rg-male" name="gender" value="L">
<label for="rg-male">
Male
</label>
</div>
</div>
<div class="form-group">
<label for="fess">
Username
</label>
<input type="text" id="patemail" name="username" class="form-control"  placeholder="username" required="true" onBlur="userAvailability()">
<span id="user-availability-status1" style="font-size:12px;"></span>
</div>
<div class="form-group">
<label for="fess">
Password
</label>
<input type="password" id="patemail" name="password" class="form-control"  placeholder="password" required="true" onBlur="userAvailability()">
<span id="user-availability-status1" style="font-size:12px;"></span>
</div>
<button type="submit" name="submit" id="submit" class="btn btn-o btn-primary">
Add
</button>
</form>
</div>
</div>
</div>
</div>
</div>
<div class="col-lg-12 col-md-12">
<div class="panel panel-white">
</div>
</div>
</div>
</div>
</div>
</div>				
</div>
</div>
</div>
			<!-- start: FOOTER -->
<?php include('include/footer.php');?>
			<!-- end: FOOTER -->
		
			<!-- start: SETTINGS -->
<?php include('include/setting.php');?>
			
			<!-- end: SETTINGS -->
		</div>
		<!-- start: MAIN JAVASCRIPTS -->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
		<script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
		<script src="vendor/autosize/autosize.min.js"></script>
		<script src="vendor/selectFx/classie.js"></script>
		<script src="vendor/selectFx/selectFx.js"></script>
		<script src="vendor/select2/select2.min.js"></script>
		<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
		<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CLIP-TWO JAVASCRIPTS -->
		<script src="assets4/js/main.js"></script>
		<!-- start: JavaScript Event Handlers for this page -->
		<script src="assets4/js/form-elements.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				FormElements.init();
			});
		</script>
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
</html>

