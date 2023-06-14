<?php

/**
 *  Summary
 * 
 *  file ini sebagai header html dari template
 *  @author Fajar Hafidzi
 *  @version 1.0
 *  @filesource v_header.php
 */

// load file
require_once "../config/config.php";


// cek kondisi tombol belum dicek dan session tidak ada
if (!isset($_SESSION['username'])) {
    // arahkan ke halaman pelanggan login
    echo "<script>window.location='" . base_url('pelanggan/login.php') . "';</script>";
}


/**
 * function ambilData
 * 
 * @param $url 
 * @param $headers
 * @return 
 */
function ambilData($url, $headers)
{
    // mengaktikan curl
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
    // Mengembalikan hasil curl dengan json
    return $output;
}

/**
 * mengisi data $headers
 */
$type    = "application/json";
$token   = $_SESSION['token'];

// @var $headers set data headers
$headers = [
    "Content-Type:" . $type,
    "key:" . $token
];

// @var $getData set data session dengan idpelanggan
$getData = $_SESSION['idpelanggan'];

/**
 * Mengambil data penggunaan by id
 *
 * @var $url diset dengan api url 
 * @var $arr sebagai penampung kembalian data dari $url
 * @var $dataPenggunaan mendecode data json menjadi array
 */
$url = "http://localhost/paylistrik/apipascabayar/penggunaan/penggunaanbyid.php?id_pelanggan=" . $getData;
$arr = ambilData($url, $headers);
$dataPenggunaan = json_decode($arr, true);

/**
 * Mengambil data Tagihan by id
 *
 * @var $url diset dengan api url 
 * @var $arr sebagai penampung kembalian data dari $url
 * @var $dataTagihan mendecode data json menjadi array
 */
$url = "http://localhost/paylistrik/apipascabayar/tagihan/tagihanbyid.php?id_pelanggan=" . $getData;
$arr = ambilData($url, $headers);
$dataTagihan = json_decode($arr, true);

/**
 * Mengambil data tagihanbelum dibayar by id
 *
 * @var $url diset dengan api url 
 * @var $arr sebagai penampung kembalian data dari $url
 * @var $belumBayar mendecode data json menjadi array
 * @var $totalTagihan mengambil data tagihan dari array
 */
$url = "http://localhost/paylistrik/apipascabayar/tagihan/tagihanbelumbayar.php?id_pelanggan=" . $getData;
$arr = ambilData($url, $headers);
$belumBayar = json_decode($arr, true);
$totalTagihan   = $belumBayar['results'][0][0];

?>


<!DOCTYPE html>
<html lang="en">

<!-- Awal head -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- title -->
    <title>PayListrik</title>
    <!-- Meload file bootstrap.min.css di folder asset-->
    <link rel="stylesheet" href="<?= base_url(); ?>/asset/css/bootstrap/bootstrap.min.css">
    <!-- Meload file style.css di folder asset-->
    <link rel="stylesheet" href="<?= base_url(); ?>/asset/css/style.css">
    <!-- Meload icon di folder asset-->
    <link rel="icon" href="<?= base_url(); ?>/asset/img/icon-logo.jpg">
    <!-- Meload file all.css di folder asset-->
    <link rel="stylesheet" href="<?= base_url(); ?>/asset/css/icon/fontawesome/css/all.css">
</head>
<!-- Akhir head -->

<body>