<?php

/**
 *  Summary
 * 
 *  file ini sebagai file api 
 *  untuk melakukan akses query PUT data pelanggan by id
 * 
 *  @author Fajar Hafidzi
 *  @version 1.0
 *  @filesource updatepelangganbyid.php
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
    if ($method == "PUT") {
        // parsing data 
        parse_str((file_get_contents("php://input")), $_PUT);

        // cek parameter yang dikirimkan
        if (
            isset($_PUT['idpelanggan']) and
            isset($_PUT['namapelanggan']) and isset($_PUT['email']) and  isset($_PUT['nohandphone'])
            and isset($_PUT['alamat'])
        ) {

            // @var $id_pelanggan sebagai penampung nilai $_PUT['idpelanggan']
            $id_pelanggan    = $_PUT['idpelanggan'];
            // @var $namapelanggan sebagai penampung nilai $_PUT['namapelanggan']
            $namapelanggan   = $_PUT['namapelanggan'];
            // @var $email sebagai penampung nilai $_PUT['email']
            $email           = $_PUT['email'];
            // @var $nohph sebagai penampung nilai $_PUT['nohph']
            $nohp            = $_PUT['nohandphone'];
            // @var $alamat sebagai penampung nilai $_PUT['alamat']
            $alamat          = $_PUT['alamat'];

            // Jika metode akses sesuai
            // $result['status'] = [
            //     "code" => 200,
            //     "description" => 'Data Berhasil dimasukan'
            // ];

            // @var $sql mempersiapkan query
            $sql = "UPDATE pelanggan SET nama_pelanggan='$namapelanggan', email='$email', 
            nohandphone='$nohp', alamat = '$alamat' WHERE id_pelanggan = '$id_pelanggan'";

            // @var $conn melakukan pengaksesan ke db
            $conn->query($sql);

            // @var $result['results'] untuk menampung nilai atau data yang dikembalikan 
            $result['results'] = [
                "id_pelanggan"    => $id_pelanggan,
                "namapelanggan"   => $namapelanggan,
                "alamat"          => $alamat,
                "email"           => $email,
                "nohandphone"     => $nohp
            ];
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
            "description" => 'Request Tidak Valid'
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
