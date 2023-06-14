<?php

/**
 *  Summary
 * 
 *  file ini sebagai halaman logout
 *  @author Fajar Hafidzi
 *  @version 1.0
 *  @filesource logout.php
 */

// load file
require_once '../config/config.php';

/**
 * Menghancurkan session kemudian
 * mengarahkannya ke halaman login.php
 */
unset($_SESSION['username']);
unset($_SESSION['idpelanggan']);
unset($_SESSION['password']);
unset($_SESSION['token']);
echo "<script>window.location='" . base_url('pelanggan/login.php') . "';</script>";
