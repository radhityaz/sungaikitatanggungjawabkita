<?php
include 'config.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
  $nama = $_POST['nama'];
  $lokasi = $_POST['lokasi'];
  $deskripsi = $_POST['deskripsi'];

  // Proses upload file jika ada
  $file_name = null;
  if(isset($_FILES['file_media']) && $_FILES['file_media']['error'] == 0) {
    $upload_dir = "../uploads/";
    if(!is_dir($upload_dir)) {
      mkdir($upload_dir, 0777, true);
    }
    $file_name = time() . "_" . basename($_FILES['file_media']['name']);
    $target_file = $upload_dir . $file_name;
    if(move_uploaded_file($_FILES['file_media']['tmp_name'], $target_file)) {
      // berhasil upload
    } else {
      $file_name = null;
    }
  }

  $sql = "INSERT INTO pengaduan (nama, lokasi, deskripsi, file_media) VALUES (?,?,?,?)";
  $stmt = mysqli_prepare($conn, $sql);
  mysqli_stmt_bind_param($stmt, "ssss", $nama, $lokasi, $deskripsi, $file_name);

  if(mysqli_stmt_execute($stmt)){
    echo "<script>alert('Terima kasih! Laporan Anda berhasil disimpan.'); window.location.href = '../pengaduan.html';</script>";
  } else {
    echo "<script>alert('Terjadi kesalahan.'); window.location.href = '../pengaduan.html';</script>";
  }

  mysqli_stmt_close($stmt);
}

mysqli_close($conn);
