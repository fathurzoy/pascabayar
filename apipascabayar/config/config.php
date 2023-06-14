<?php

/**
 *  Summary
 * 
 *  file ini sebagai file configurasi 
 *  untuk koneksi ke database
 * 
 *  @author Fajar Hafidzi
 *  @version 1.0
 *  @filesource config.php
 */

//@var $servername sebagai penampung nilai dari alamat server ke db
$servername = "localhost";

//@var $username sebagai penampung nilai untuk koneksi user ke db
$username   = "root";

//@var $password sebagai penampung nilai untuk password user ke db
$password   = "";

//@var $dbname sebagai penampung nilai untuk mengakses database
$dbname     = "pascabayar";

//@var $conn untuk membuat mengkoneksikan
$conn = new mysqli($servername, $username, $password, $dbname);

// cek kondisi jika error
if (mysqli_connect_errno()) {
    // tampilkan pesan kesalahan dan koneksi gagal
    echo "Koneksi database gagal :" . mysqli_connect_error();
}
