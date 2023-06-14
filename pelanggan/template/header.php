<?php

/**
 *  Summary
 * 
 *  file ini sebagai header html dari template
 *  @author Fajar Hafidzi
 *  @version 1.0
 *  @filesource header.php
 */

// load file
require_once "../config/config.php";

/**
 * Membuat cek kondisi jika session['username] ada
 */
if (isset($_SESSION['username'])) {
    // diarahkan ke halaman pelanggan dashboard
    echo "<script>window.location='" . base_url('pelanggan/dashboard.php') . "';</script>";
}
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
    <link rel="stylesheet" href="<?= base_url(); ?>/asset/vendor/assets/vendor/bootstrap/css/bootstrap.min.css">
    <!-- Meload file style.css di folder asset-->
    <link rel="stylesheet" href="<?= base_url(); ?>/asset/vendor/assets/css/style.css">
    <!-- Meload icon di folder asset-->
    <link rel="icon" href="<?= base_url(); ?>/asset/img/icon-logo.jpg">
    <!-- Meload file all.css di folder asset-->
    <link rel="stylesheet" href="<?= base_url(); ?>/asset/css/icon/fontawesome/css/all.css">
</head>
<!-- Akhir head -->