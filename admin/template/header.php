<?php
require_once("../config/config.php");

if (!isset($_SESSION['username'])) {
  echo "<script>window.location='" . base_url('admin/login.php') . "';</script>";
}

function ambil_data($url, $headers)
{
  $ch = curl_init();
  // set url 
  curl_setopt($ch, CURLOPT_URL, $url);
  // set header curl
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  // set option untuk mengembalikan data transfer
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  // Menutup curl dan menghasilkan string 
  $output = curl_exec($ch);
  // Tutup curl 
  curl_close($ch);
  // Menampilkan hasil curl dengan json
  return $output;
}

// ambil data user
$type    = "application/json";
$token   = $_SESSION['token'];
$headers = [
  "Content-Type:" . $type,
  "key:" . $token
];
// $getdata = $_SESSION['iduser'];
$url = "http://localhost/paylistrik/apipascabayar/user/user.php";
$arr = ambil_data($url, $headers);
$datapenggunaan = json_decode($arr, true);

// ambil data tarif
$type    = "application/json";
$token   = $_SESSION['token'];
$headers = [
  "Content-Type:" . $type,
  "key:" . $token
];
// $getdata = $_SESSION['iduser'];
$url = "http://localhost/paylistrik/apipascabayar/tarif/tarif.php";
$arr = ambil_data($url, $headers);
$datapenggunaan = json_decode($arr, true);

// ambil data tarif
$type    = "application/json";
$token   = $_SESSION['token'];
$headers = [
  "Content-Type:" . $type,
  "key:" . $token
];
// $getdata = $_SESSION['iduser'];
$url = "http://localhost/paylistrik/apipascabayar/pelanggan/pelanggan.php";
$arr = ambil_data($url, $headers);
$datapenggunaan = json_decode($arr, true);


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link rel="icon" href="<?= base_url(); ?>/asset/img/icon-logo.jpg">
  <link href="<?= base_url(); ?>/asset/vendor/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= base_url(); ?>/asset/vendor/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url(); ?>/asset/vendor/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?= base_url(); ?>/asset/vendor/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?= base_url(); ?>/asset/vendor/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="<?= base_url(); ?>/asset/vendor/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="<?= base_url(); ?>/asset/vendor/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?= base_url(); ?>/asset/vendor/assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?= base_url(); ?>/asset/vendor/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>