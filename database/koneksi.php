<?php
session_start();
$host = '192.168.1.93'; // Ganti dengan host database Anda jika berbeda
$username = 'root';     // Ganti dengan username database Anda
$password = '123';         // Ganti dengan password database Anda jika ada
$dbname = 'ppdbsmk';    // Ganti dengan nama database Anda

// Membuat koneksi ke database
$conn = mysqli_connect($host, $username, $password, $dbname);

// Cek apakah koneksi berhasil
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>