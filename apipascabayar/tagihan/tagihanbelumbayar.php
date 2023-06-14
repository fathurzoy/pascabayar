<?php

/**
 *  Summary
 * 
 *  file ini sebagai file api 
 *  untuk melakukan akses query get data tagihan 
 *  pelanggan belum di bayar by id
 * 
 *  @author Fajar Hafidzi
 *  @version 1.0
 *  @filesource tagihanbelumbayar.php
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
        // @var $_GET['id_pelanggan'] jika tombol ditekan
        if (isset($_GET['id_pelanggan'])) {
            // @var id_pelanggan sebagai penampung nilai $_GET['id_pelanggan']
            $idpelanggan = $_GET['id_pelanggan'];

            // @var $results set nilainya 
            // $result['status'] = [
            //     "code" => 200,
            //     "description" => 'Request Valid'
            // ];

            // @var $sql mempersiapkan query
            $sql = "SELECT COUNT(bulan) FROM tagihan WHERE id_pelanggan='$idpelanggan' AND status='belum bayar'";

            // @var $hasil_query melakukan pengaksesan ke db
            $hasil_query = $conn->query($sql);

            // @var $result['results'] untuk menampung nilai atau data yang dikembalikan 
            $result['results'] = $hasil_query->fetch_all();
        } else {
            // @var $results set nilainya 
            $result['status'] = [
                "code" => 400,
                "description" => 'Parameter Tidak Valid'
            ];
        }
    } else {
        // @var $results set nilainya 
        $result['status'] = [
            "code" => 405,
            "description" => 'Request Tidak Valid'
        ];
    }
} else {
    // @var $results set nilainya 
    $result['status'] = [
        "code" => 401,
        "description" => 'Token Tidak Valid'
    ];
}

// kembalikan data $result dalam format json
echo json_encode($result);
