
<?php 
session_start();
include("koneksi.php");
if(!isset($_SESSION['admin_username'])){
    header("location:login.php");
}
if(isset($_GET['cancel']))
		  {
mysqli_query($koneksi,"update jadwal_pasien set status_dokter='0' where ID_JADWAL ='".$_GET['id']."'");
                  $_SESSION['msg']="Appointment canceled !!";}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Doctor  | Appointments</title>
		
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
						
				<!-- end: TOP NAVBAR -->
				<div class="main-content" >
					<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
						<section id="page-title">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle">Dokter | Appointments</h1>
																	</div>
								<ol class="breadcrumb">
									<li>
										<span>User</span>
									</li>
									<li class="active">
										<span>Appointments</span>
									</li>
								</ol>
							</div>
						</section>
						<!-- end: PAGE TITLE -->
						<!-- start: BASIC EXAMPLE -->
                        
                        <div class="container-fluid container-fullw bg-white">
                        <div class="row">
								<div class="col-md-12">
                                <p style="color:red;"><?php echo htmlentities($_SESSION['msg']);?>
								<?php echo htmlentities($_SESSION['msg']="");?></p>	
									<table class="table table-hover" id="sample-table-1">
										<thead>
											<tr>
												<th class="center">#</th>
												<th class="hidden-xs">Patient Name</th>
												<th>Appointment Date</th>
												<th>Appointment Time  </th>
												<th>Current Status</th>
												<th>Action</th>
</tr>
										</thead>

<tbody>

<?php $err = '';
$username = $_SESSION['admin_username'];

$sql1 = "SELECT * FROM user_login WHERE Username = '$username'";
$q1 = mysqli_query($koneksi,$sql1);
$r1 = mysqli_fetch_array($q1);
if($r1['Nama_Dokter'] == NULL){
    $err .= "<li>Pasien tidak ditemukan</li>";
}if(empty($err)){
    $nama_dokter = $r1['Nama_Dokter'];
}
$cnt=1;
$query = "SELECT * FROM jadwal_pasien WHERE Nama_Dokter = '$nama_dokter'";
$result = mysqli_query($koneksi, $query);

while($row=mysqli_fetch_array($result))
{
?>
                                        <tr>
												<td class="center"><?php echo $cnt;?>.</td>
												<td class="hidden-xs"><?php echo $row['Nama_Pasien'];?></td>
												<td><?php echo $row['tanggal'];?></td>
												<td><?php echo $row['jam'];?> 
												</td>
												<td><?php if($row['status_pasien'] == '1' && $row['status_dokter'] == '1'&& $row['status_dokter'] == '1' && $row['aturan_pakai']=='' && $row['aturan_obat']==''){ echo "Aktif";} 
                                                if(($row['status_pasien']==0) && ($row['status_dokter']==1))  
                                                {
                                                    echo "Dibatalkan Oleh Pasien ";
                                                }
												if(($row['status_pasien']==1) && ($row['status_dokter']==0))  
{
	echo "Dibatalkan Oleh Dokter";
} 
if(($row['status_pasien']==1) && ($row['status_dokter']==1) && ($row['aturan_obat']!='') && ($row['aturan_pakai']!=''))  
{
	echo "Selesai Diagnosis";
} ?></td>
                                                <td >
												<div class="visible-md visible-lg hidden-sm hidden-xs">
							<?php if(($row['status_pasien']==1) && ($row['status_dokter']==1)&& ($row['aturan_obat']=='') && ($row['aturan_pakai']==''))  
{ ?>

													
	<a href="dokterlist.php?id=<?php echo $row['ID_JADWAL']?>&cancel=update" onClick="return confirm('Are you sure you want to cancel this appointment ?')"class="btn btn-transparent btn-xs tooltips" title="Cancel Appointment" tooltip-placement="top" tooltip="Remove">Cancel</a>
	<?php } elseif (($row['status_pasien']==1) && ($row['status_dokter']==1) && ($row['aturan_obat']!='') && ($row['aturan_pakai']!='')) {
		echo "Selesai";
	}
	else {

		echo "Canceled";
		} ?>
												</div>
												</td>
</tr>

<?php 
$cnt=$cnt+1;
											 }?>                                    
</tbody>
							
					
								
						
					
						<!-- end: SELECT BOXES -->
						
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