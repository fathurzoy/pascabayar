<?php
require_once("../config/config.php");

if (isset($_SESSION['username'])) {
    echo "<script>window.location='" . base_url('admin/dashboard.php') . "';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PayListrik</title>
    <link rel="stylesheet" href="<?= base_url(); ?>/asset/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/asset/css/stylee.css">
    <link rel="icon" href="<?= base_url(); ?>/asset/img/icon-logo.jpg">
    <link rel="stylesheet" href="<?= base_url(); ?>/asset/css/icon/fontawesome/css/all.css">

</head>

<div class="container mt-5 login">

    <div class="card login-form mt-2">
        <div class="card-body">
            <h1 class="card-title text-center" style="font-weight: bold;">Sign In</h1>
        </div>
        <div class="card-text">
            <form method="POST" action="<?= base_url() ?>/admin/config/aksilogin.php">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="username" name="username" class="form-control" id="username" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password">
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" name="login" value="login" class="btn btn-warning tombol-login" style="font-weight: bold;">Sign In</button>
                </div>
                <div class="mt-3">
                    <!-- <p style="color:black">Belum punya akun? <a href="#">Buat Akun</a></p> -->
                </div>
            </form>
        </div>
    </div>

</div>

<script src="<?= base_url(); ?>/asset/js/bootstrap/bootstrap.bundle.min.js"></script>
</body>

</html>