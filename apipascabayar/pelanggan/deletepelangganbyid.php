<?php

/**
 *  Summary
 * 
 *  file ini sebagai file api 
 *  untuk melakukan akses query DELETE data pelanggan by id
 * 
 *  @author Fajar Hafidzi
 *  @version 1.0
 *  @filesource deletepelangganbyid.php
 */


// load file
require_once "../config/config.php";

// header hasil berbentuk json
header("Content-Type:application/json");

// @var $headers ambil key token
$headers = apache_request_headers();

// @var $key sebagai penampung data $header['key']
$key     = $headers['key'];

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
    if ($method == "DELETE") {
        // parsing data
        parse_str((file_get_contents("php://input")), $_DELETE);

        // cek parameter yang dikirimkan
        if (isset($_DELETE['idpelanggan'])) {

            // @var $id_pelanggan sebagai penampung nilai $_PUT['idpelanggan']
            $id_pelanggan    = $_DELETE['idpelanggan'];

            // Jika metode akses sesuai
            // $result['status'] = [
            //     "code" => 200,
            //     "description" => 'Data Berhasil dimasukan'
            // ];

            // @var $sql mempersiapkan query
            $sql = "DELETE FROM pelanggan WHERE id_pelanggan = '$id_pelanggan'";

            // @var $conn melakukan pengaksesan ke db
            $conn->query($sql);

            // @var $result['results'] untuk menampung nilai atau data yang dikembalikan 
            $result['results'] = [];
        } else {
            // @var $results set nilai dalam bentuk array
            $result['status'] = [
                "code" => 400,
                "description" => 'Parameter Tidak Valid'
            ];
        }
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
