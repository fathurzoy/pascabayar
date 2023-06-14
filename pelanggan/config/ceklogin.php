<?php

/**
 *  Summary
 * 
 *  file ini sebagai aksi dari proses login
 *  @author Fajar Hafidzi
 *  @version 1.0
 *  @filesource ceklogin.php
 */

/**
 * function sebelum login
 * 
 * @param $url 
 * @param $postData
 * @return 
 */
function doLogin($url, $postData)
{
    // persiapkan curl
    $ch = curl_init();
    // set url 
    curl_setopt($ch, CURLOPT_URL, $url);
    // set post data
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
    // set option untuk mengembalikan data transfer
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    // Menutup curl dan menghasilkan string 
    $output = curl_exec($ch);
    // Tutup curl 
    curl_close($ch);
    // Menampilkan hasil curl dengan json
    return $output;
}

// @var $postData set data yang akan dikirimkan di dalam array $postData
$postData = [
    'username' => trim($_POST['username']),
    'password' => md5(trim($_POST['password']))
];

// @var $output sebagai penampung kembalian data yang dikirimkan
$output   = doLogin("http://localhost/paylistrik/apipascabayar/pelanggan/pelangganlogin.php", $postData);

// @var arr sebagai penampung data yang di decode menjadi array
$arr      = json_decode($output, true);

// @var $idpelanggan sebagai penampung data dari $arr['results'][0]['id_pelanggan']
$idpelanggan    = $arr['results'][0]['id_pelanggan'];
// @var $username sebagai penampung data dari $arr['results'][0]['username']
$username       = $arr['results'][0]['username'];
// @var $password sebagai penampung data dari $arr['results'][0]['password']
$password       = $arr['results'][0]['password'];
// @var $nomorkwh sebagai penampung data dari $arr['results'][0]['nomorkwh']
$nomorkwh       = $arr['results'][0]['nomor_kwh'];
// @var $namapelanggan sebagai penampung data dari $arr['results'][0]['namapelanggan']
$namapelanggan  = $arr['results'][0]['nama_pelanggan'];
// @var $alamat sebagai penampung data dari $arr['results'][0]['alamat']
$alamat         = $arr['results'][0]['alamat'];
// @var $idtarif sebagai penampung data dari $arr['results'][0]['idtarif']
$idtarif        = $arr['results'][0]['id_tarif'];
// @var $token sebagai penampung data dari $arr['results'][0]['token']
$token          = $arr['results'][0]['token'];
// @var $email sebagai penampung data dari $arr['results'][0]['email']
$email          = $arr['results'][0]['email'];
// @var $nohp sebagai penampung data dari $arr['results'][0]['nohp']
$nohp           = $arr['results'][0]['nohandphone'];

// cek kondisi jika password dan username tidak kosong
if ($username != '' && $password != '') {
    // buatkan sessin
    session_start();
    // @var $_SESSION['username'] sebagai penampung data $username
    $_SESSION['username']       = $username;
    // @var $_SESSION['password'] sebagai penampung data $password
    $_SESSION['password']       = $password;
    // @var $_SESSION['namapelanggan'] sebagai penampung data $namapelanggan
    $_SESSION['namapelanggan']  = $namapelanggan;
    // @var $_SESSION['idpelanggan'] sebagai penampung data $idpelanggan
    $_SESSION['idpelanggan']    = $idpelanggan;
    // @var $_SESSION['idtarif'] sebagai penampung data $idtarif
    $_SESSION['idtarif']        = $idtarif;
    // @var $_SESSION['nomorkwh'] sebagai penampung data $nomorkwh
    $_SESSION['nomorkwh']       = $nomorkwh;
    // @var $_SESSION['token'] sebagai penampung data $token
    $_SESSION['token']          = $token;
    // @var $_SESSION['alamat'] sebagai penampung data $alamat
    $_SESSION['alamat']         = $alamat;
    // @var $_SESSION['email'] sebagai penampung data $email
    $_SESSION['email']          = $email;
    // @var $_SESSION['nohp'] sebagai penampung data $nohp
    $_SESSION['nohp']           = $nohp;
    // arahkan kehalaman dashboard pelanggan
    header('Location:http://localhost/paylistrik/pelanggan/dashboard.php');
} else {
    // arahkan ke halaman login
    header('Location:http://localhost/paylistrik/pelanggan/login.php');
}
