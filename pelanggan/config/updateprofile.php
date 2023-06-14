<?php

/**
 *  Summary
 * 
 *  file ini sebagai aksi dari updateprofile
 *  @author Fajar Hafidzi
 *  @version 1.0
 *  @filesource updateprofile.php
 */

/**
 * function Update Profile
 * 
 * @param $url 
 * @param $headers
 * @param $postData
 * @return 
 */
function updateProfile($url, $postData, $headers)
{
    // persiapkan curl
    $ch = curl_init();
    // set url 
    curl_setopt($ch, CURLOPT_URL, $url);
    // set header
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    // kirm request metode
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
    // set post data
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
    // set option untuk mengembalikan data transfer
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    // Menutup curl dan menghasilkan string 
    $output = curl_exec($ch);
    // Tutup curl 
    curl_close($ch);
    // Menampilkan hasil curl dengan json
    return $output;
}


/**
 * mengisi data $headers
 */
$type    = "application/json";
$token   = $_POST['token'];

// @var $headers set data headers
$headers = [
    "Content-Type:" . $type,
    "key:" . $token
];

// @var $idpelanggan menampung data yang dikirimkan dari $_POST['idpelanggan']
$idpelanggan    = $_POST['idpelanggan'];
// @var $namapelanggan menampung data yang dikirimkan dari $_POST['namapelanggan']
$namapelanggan  = $_POST['namapelanggan'];
// @var $email menampung data yang dikirimkan dari $_POST['email']
$email          = $_POST['email'];
// @var $nohandphone menampung data yang dikirimkan dari $_POST['idpelanggan']
$nohanphone     = $_POST['nohandphone'];
// @var $alamat menampung data yang dikirimkan dari $_POST['idpelanggan']
$alamat         = $_POST['alamat'];

// @var $postData set data yang akan dikirimkan di dalam array $postData
$postData = [
    "idpelanggan"    => $idpelanggan,
    "namapelanggan"  => $namapelanggan,
    "email"          => $email,
    "nohandphone"    => $nohanphone,
    "alamat"         => $alamat
];

/**
 * Mengirim data update pelanggan by id
 *
 * @var $url diset dengan api url 
 * @var $arr sebagai penampung kembalian data dari $url
 * @var $updateData mendecode data json menjadi array
 */
$url = "http://localhost/paylistrik/apipascabayar/pelanggan/updatepelangganbyid.php";
$arr = updateProfile($url, $postData, $headers);
$updateData = json_decode($arr, true);


// menampikan data
// echo "<pre>";
// print_r($updatedata);
// echo "</pre>";

// echo $updatedata['results']['id_pelanggan'];
// echo $arr['username'];
