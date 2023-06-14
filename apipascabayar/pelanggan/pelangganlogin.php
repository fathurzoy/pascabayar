<?php

/**
 *  Summary
 * 
 *  file ini sebagai file api 
 *  untuk melakukan akses query post pelanggan login
 * 
 *  @author Fajar Hafidzi
 *  @version 1.0
 *  @filesource pelangganlogin.php
 */

// load file
require_once "../config/config.php";

// header hasil berbentuk json
header("Content-Type:application/json");

// @var $method tangkap metode akses
$method = $_SERVER['REQUEST_METHOD'];

// @var $result untuk menampung nilai hasil dengan format array
$result = array();

// @var $method cek methodnya
if ($method == "POST") {

    // @var $_POST['username'] dan $_POST['password'] tombol ditekan
    if (isset($_POST['username']) and isset($_POST['password'])) {

        // @var $user sebagai penampung nilai $_POST['username]
        $user = $_POST['username'];

        // @var $pass sebagai penampung nilai $_POST['password']
        $pass = $_POST['password'];

        // @var $token set dengan enkripsi md5 yang dibuat dari $user dan $password
        $token = md5($user . $pass);

        // @var $results set nilai dalam bentuk array
        $result['status'] = [
            "code" => 200,
            "description" => 'Request Valid'
        ];

        // @var $query mempersiapkan query
        $query = "SELECT*FROM pelanggan WHERE username = '$user' AND password='$pass'";

        // @var $sql melakukan pengaksesan ke db
        $sql = $conn->query($query);

        // @var $data untuk menampung nilai atau data yang dikembalikan 
        $data = mysqli_fetch_array($sql);

        // @var $data['token'] cek jika tidak null
        if ($data['token'] != null) {
            // @var $query mempersiapkan query
            $query = "SELECT*FROM pelanggan WHERE username = '$user' AND password='$pass'";
            // @var $sql melakukan pengaksesan ke db
            $sql = $conn->query($query);
            // @var $result['results'] untuk menampung nilai atau data yang dikembalikan 
            $result['results'] = $sql->fetch_all(MYSQLI_ASSOC);
        } else {
            // @var $updatetoken mempersiapkan query
            $updatetoken = "UPDATE pelanggan SET token='$token' WHERE username = '$user' AND password='$pass'";
            // @var $conn melakukan pengaksesan ke db
            $conn->query($updatetoken);
            // @var $result['results'] untuk menampung nilai atau data yang dikembalikan 
            $result['results'] = $sql->fetch_all(MYSQLI_ASSOC);
        }
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

// Tampil data dalam format json
echo json_encode($result);
