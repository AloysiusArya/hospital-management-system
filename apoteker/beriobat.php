<?php 
session_start();
include("koneksi.php");
if(!isset($_SESSION['admin_username'])){
    header("location:login.php");
}

$err = '';
$username = $_SESSION['admin_username'];

$sql1 = "SELECT * FROM user_login WHERE Username = '$username'";
$q1 = mysqli_query($koneksi,$sql1);
$r1 = mysqli_fetch_array($q1);
if($r1['Nama_Apoteker'] == NULL){
    $err .= "<li>Pasien tidak ditemukan</li>";
}if(empty($err)){
    $nama_apoteker = $r1['Nama_Apoteker'];
}

if(isset($_POST['submit']))
{
$specilization=$_POST['Doctorspecialization'];
$namadokter=$_POST['doktor'];
$namapasien=$_POST['doctor'];
$obat=$_POST['fees'];
$beriobat=$_POST['beriobat'];
$jumlah=$_POST['jumlah'];
$obatstatus=1;
$query=mysqli_query($koneksi,"update jadwal_pasien set status_obat = '$obatstatus' where tanggal = '$specilization' and Nama_Dokter = '$namadokter' and Nama_Pasien = '$namapasien' and aturan_obat ='$beriobat'");
	if($query)
	{
		echo "<script>alert('Berhasil Memberi Obat');</script>";
	}
$query2=mysqli_query($koneksi,"update obat set Stock = Stock - '$jumlah' where Nama_Obat = '$beriobat'");

}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Doctor  | Dashboard</title>
		
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

        <script>
    function getdoctor(val) {
	$.ajax({
	type: "POST",
	url: "ambil_dokter.php",
	data:'specilizationid='+val,
	success: function(data){
		$("#doctor").html(data);
	}
	});
}
</script>

<script>
function getdok(val) {
	$.ajax({
	type: "POST",
	url: "ambil_dokter.php",
	data:'doctor='+val,
	success: function(data){
		$("#doktor").html(data);
	}
	});
}

</script>

<script>
function getfee(val) {
	$.ajax({
	type: "POST",
	url: "ambil_dokter.php",
	data:'doktor='+val,
	success: function(data){
		$("#fees").html(data);
	}
	});
}

</script>	

	</head>
	<body>
		<div id="app">		
        <?php include('include/sidebar.php');?>
        <div class="app-content">
			
            <?php include('include/header.php');?>
        
    <!-- end: TOP NAVBAR -->
    <div class="main-content" >
        <div class="wrap-content container" id="container">
            <!-- start: PAGE TITLE -->
            <section id="page-title">
                <div class="row">
                    <div class="col-sm-8">
                        <h1 class="mainTitle">Apoteker | Beri Obat</h1>
                                                        </div>
                    <ol class="breadcrumb">
                        <li>
                            <span>User</span>
                        </li>
                        <li class="active">
                            <span>Beri Obat</span>
                        </li>
                    </ol>
            </section>
            <!-- end: PAGE TITLE -->
            <!-- start: BASIC EXAMPLE -->
            <div class="container-fluid container-fullw bg-white">
                <div class="row">
                    <div class="col-md-12">
                        
                        <div class="row margin-top-30">
                            <div class="col-lg-8 col-md-12">
                                <div class="panel panel-white">
                                    <div class="panel-heading">
                                        <h5 class="panel-title">Beri Obat</h5>
                                    </div>
                                    <div class="panel-body">
                    <p style="color:red;"><?php echo htmlentities($_SESSION['msg1']);?>
                    <?php echo htmlentities($_SESSION['msg1']="");?></p>	
                                        <form role="form" name="book" method="post" >
                                            


<div class="form-group">
                                                <label for="DoctorSpecialization">
                                                    Pilih Tanggal
                                                </label>
                <select name="Doctorspecialization" class="form-control" onChange="getdoctor(this.value);" required="required">
                                                    <option value="">Select Date</option>

                                                    <?php $ret=mysqli_query($koneksi,"select * from jadwal_pasien where aturan_pakai != '' and aturan_obat != '' and status_obat = 0");
while($row=mysqli_fetch_array($ret))
{
?>
																<option value="<?php echo htmlentities($row['tanggal']);?>">
																	<?php echo htmlentities($row['tanggal']);?>
																</option>
																<?php } ?>
                                                </select>
                                            </div>




                                            <div class="form-group">
                                                <label for="doctor">
                                                    Nama Pasien
                                                </label>
            <select name="doctor" class="form-control" id="doctor" onChange="getdok(this.value);" required="required">
            </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="doktor">
                                                    Nama Dokter
                                                </label>
            <select name="doktor" class="form-control" id="doktor" onChange="getfee(this.value);" required="required">
            </select>
                                            </div>





                                            <div class="form-group">
                                                <label for="consultancyfees">
                                                    Obat
                                                </label>
        <select name="fees" class="form-control" id="fees"  readonly>
            
            </select>
                                            </div>	

                                            <div class="form-group">
                                                <label for="beriobat">
                                                    Pilih Obat
                                                </label>
                <select name="beriobat" class="form-control"  required="required">
                                                    <option value="">Pilih Obat Untuk Diberi</option>

                                                    <?php $ret=mysqli_query($koneksi,"select * from obat");
while($row=mysqli_fetch_array($ret))
{
?>
																<option value="<?php echo htmlentities($row['Nama_Obat']);?>">
																	<?php echo htmlentities($row['Nama_Obat']);?>
																</option>
																<?php } ?>
                                                </select>
                                            </div>    

                                    <div class="form-group">
                                        <label for="Appointmenttime">
                                            
                                           Jumlah
                                        
                                                </label>
<input class="form-control" name="jumlah" id="timepicker1" required="required">
                                            </div>	

                                            <button type="submit" name="submit" class="btn btn-o btn-primary">
                                                Submit
                                            </button>
                                        </form>
                                    </div>
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
