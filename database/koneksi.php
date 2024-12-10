<?php 
session_start();
$conn = mysqli_connect("localhost","root","","ppdbsmk");
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
 
?>