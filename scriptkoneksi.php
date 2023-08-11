<?php
include 'koneksi.php';
//menyimpan data kedalam variabel
$tanggal   = $_POST['tanggal'];
$nama_item = $_POST['nama_item'];
$no_request = $_POST['no_request'];
$jumlah  = $_POST['jumlah'];
$status = $_POST['status'];
//query SQL untuk insert data atau memasukkan data
$query="INSERT INTO suribu  tanggal='$tanggal',nama_item='$nama_item',no_request='$no_request',jumlah='$jumlah',status='$status'";
mysqli_query($query);

?>