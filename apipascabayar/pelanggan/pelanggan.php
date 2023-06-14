<?php

/**
 *  Summary
 * 
 *  file ini sebagai file api 
 *  untuk melakukan akses query get data pelanggan
 * 
 *  @author Fajar Hafidzi
 *  @version 1.0
 *  @filesource pelanggan.php
 */

// load file
require_once '../config/config.php';

// header hasil berbentuk json
header("Content-Type:application/json");

// @var $headers ambil key token
$header =  apache_request_headers();

// @var $key sebagai penampung data $header['key']
$key = $header['key'];

// @var $method tangkap metode akses
$method = $_SERVER['REQUEST_METHOD'];

// @var $result untuk menampung nilai hasil dengan format array
$result = array();

// @var $query mempersiapkan pencarian token user 
$query = "SELECT*FROM pelanggan WHERE token='$key'";

// @var $user melakukan pengaksesan ke db
$user   = $conn->query($query);

// @var $data untuk menampung nilai atau data yang dikembalikan 
$data = mysqli_fetch_array($user);

// cek kondisi jika data user sama dengan key yang dikirimkan
if ($data['token'] == $key) {
    // @var $method cek methodnya
    if ($method == "GET") {
        // @var $results set nilai dalam bentuk array
        $result['status'] = [
            "code" => 200,
            "description" => 'Request Valid'
        ];

        // @var $sql mempersiapkan query
        $sql = "SELECT*FROM pelanggan";

        // @var $hasil_query melakukan pengaksesan ke db
        $hasil_query = $conn->query($sql);

        // @var $result['results'] untuk menampung nilai atau data yang dikembalikan 
        $result['results'] = $hasil_query->fetch_all(MYSQLI_ASSOC);
    } else {
        // @var $results set nilai dalam bentuk array
        $result['status'] = [
            "code" => 405,
            "description" => 'Metode Tidak Valid'
        ];
    }
} else {
    // @var $results set nilai dalam bentuk array
    $result['status'] = [
        "code" => 401,
        "description" => 'Token Tidak Valid'
    ];
}

// kembalikan data $result dalam format json
echo json_encode($result);
