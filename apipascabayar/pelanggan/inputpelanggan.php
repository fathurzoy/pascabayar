<?php

/**
 *  Summary
 * 
 *  file ini sebagai file api 
 *  untuk melakukan akses query POST input data pelanggan
 * 
 *  @author Fajar Hafidzi
 *  @version 1.0
 *  @filesource inputpelanggan.php
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
    if ($method == "POST") {
        // cek parameter yang dikirimkan
        if (
            isset($_POST['id_pelanggan']) and isset($_POST['username']) and  isset($_POST['password'])
            and isset($_POST['nomor_kwh']) and isset($_POST['nama_pelanggan']) and isset($_POST['alamat'])
            and isset($_POST['id_tarif']) and isset($_POST['nohandphone']) and isset($_POST['email'])
        ) {
            // @var $id_pelanggan sebagai penampung nilai $_POST['id_pelanggan']
            $id_pelanggan   = $_POST['id_pelanggan'];
            // @var $username sebagai penampung nilai $_POST['username']
            $username       = $_POST['username'];
            // @var $password sebagai penampung nilai $_POST['password']
            $password       = $_POST['password'];
            // @var $nomor_kwh sebagai penampung nilai $_POST['nomor_kwh']
            $nomor_kwh      = $_POST['nomor_kwh'];
            // @var $nama_pelanggan sebagai penampung nilai $_POST['nama_pelanggan']
            $nama_pelanggan = $_POST['nama_pelanggan'];
            // @var $alamat sebagai penampung nilai $_POST['alamat']
            $alamat         = $_POST['alamat'];
            // @var $idtarif sebagai penampung nilai $_POST['idtarif']
            $tarif          = $_POST['tarif'];
            // @var $nohandphone sebagai penampung nilai $_POST['nohandphone']
            $nohandphone          = $_POST['nohandphone'];
            // @var $email sebagai penampung nilai $_POST['email']
            $email          = $_POST['email'];

            // @var $results set nilai dalam bentuk array
            $result['status'] = [
                "code" => 200,
                "description" => 'Data Berhasil dimasukan'
            ];

            // @var $sql mempersiapkan query
            $sql = "INSERT INTO pelanggan (id_pelanggan, username, password, nomor_kwh nama_pelanggan, alamat, tarif, nohandphone, email)
                VALUES ('$id_pelanggan', '$username', '$password', '$nomor_kwh', '$nama_pelanggan', '$alamat', '$tarif', '$nohandphone', '$email')
                ";

            // @var $conn melakukan pengaksesan ke db
            $conn->query($sql);

            // @var $result['results'] untuk menampung nilai atau data yang dikembalikan 
            $result['results'] = [
                "id_pelanggan"    => $id_pelanggan,
                "username"        => $username,
                "password"        => $password,
                "nama_pelanggan"  => $nama_pelanggan,
                "alamat"          => $alamat,
                "tarif"           => $tarif,
                "nohandohone"     => $nohandphone,
                "email"           => $email
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
