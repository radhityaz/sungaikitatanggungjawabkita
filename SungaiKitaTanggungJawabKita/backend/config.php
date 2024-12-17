<?php
// Sesuaikan dengan kredensial InfinityFree Anda
$db_host = "sqlXXX.epizy.com"; // contoh: host dari InfinityFree
$db_user = "if0_37931497";    // ganti dengan username InfinityFree
$db_pass = "d5JTF3aZLl";    // ganti dengan password InfinityFree
$db_name = "epiz_12345678_jagasungai"; // ganti dengan nama database yang sudah dibuat di InfinityFree

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if(!$conn){
    die("Koneksi gagal: " . mysqli_connect_error());
}
