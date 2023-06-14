<?php

function doLogin($url, $postdata)
{
    // persiapkan curl
    $ch = curl_init();
    // set url 
    curl_setopt($ch, CURLOPT_URL, $url);
    // set post data
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
    // set option untuk mengembalikan data transfer
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    // Menutup curl dan menghasilkan string 
    $output = curl_exec($ch);
    // Tutup curl 
    curl_close($ch);
    // Menampilkan hasil curl dengan json
    return $output;
}

$postdata = [
    'username' => trim($_POST['username']),
    'password' => md5(trim($_POST['password']))
];

$output = doLogin("http://localhost/paylistrik/apipascabayar/user/userlogin.php", $postdata);
$arr      = json_decode($output, true);

// menampikan data
// echo "<pre>";
// print_r($arr);
// echo "</pre>";


$iduser      = $arr['results'][0]['id_user'];
$username    = $arr['results'][0]['username'];
$password    = $arr['results'][0]['password'];
$level       = $arr['results'][0]['level'];
$token       = $arr['results'][0]['token'];
$namauser    = $arr['results'][0]['nama'];


if ($username != '' && $password != '') {
    session_start();
    $_SESSION['username']       = $username;
    $_SESSION['password']       = $password;
    $_SESSION['namauser']       = $namauser;
    $_SESSION['iduser']         = $iduser;
    $_SESSION['token']         = $token;
    $_SESSION['namauser']       = $namauser;
    header('Location:http://localhost/paylistrik/admin/dashboard.php');
} else {
    header('Location:http://localhost/paylistrik/admin/login.php');
}
