<?php
session_start();
include("koneksi.php");
if(!isset($_SESSION['admin_username'])){
    header("location:login.php");
}
print_r($_SESSION['admin_akses']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="app">
        <nav>
            <ul>
                <li><a href='laman_pasien.php'>Laman Pasien</a></li>
                
                <li><a href='laman_dokter.php'>Laman Dokter</a></li>
                
                <li><a href='laman_apoteker.php'>Laman Apoteker</a></li>
                
                <li><a href='laman_staff.php'>Laman Staff</a></li>

                <li><a href='logout.php'>Logout>></a></li>
            </ul>
        </nav>