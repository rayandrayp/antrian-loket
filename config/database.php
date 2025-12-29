<?php
// deklarasi parameter koneksi database
$host     = "10.10.10.7"; 
$username = "client_antrian";   
$password = "Barokah123#";  
$database = "antrian"; 

// buat koneksi database
$mysqli = mysqli_connect($host, $username, $password, $database);

// cek koneksi
// jika koneksi gagal 
if (!$mysqli) {
  // tampilkan pesan gagal koneksi
  die('Koneksi Database Gagal : ' . mysqli_connect_error());
}
