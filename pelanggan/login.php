<?php

/**
 *  Summary
 * 
 *  file ini sebagai halaman untuk menampilkan
 *  menu login
 *  @author Fajar Hafidzi
 *  @version 1.0
 *  @filesource login.php
 */

// load file
include_once 'template/header.php';
include_once 'template/nav.php';

?>

<!-- Awal Section form login -->
<div class="container mt-5 login">
    <!-- Awal card -->
    <div class="card login-form mt-2">
        <!-- Body card -->
        <div class="card-body">
            <h1 class="card-title text-center" style="font-weight: bold;">Sign In</h1>
        </div>
        <!-- Akhir body card -->

        <!-- Awal card text -->
        <div class="card-text">

            <!-- Awal form login -->
            <form method="POST" action="<?= base_url() ?>/pelanggan/config/ceklogin.php">
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
                    <p style="color:black">Belum punya akun? <a href="#">Buat Akun</a></p>
                </div>
            </form>
            <!-- Akhir form login -->

        </div>
        <!-- Akhir card text -->
    </div>
    <!-- Akhir card -->
</div>
<!-- Akhir section form login -->

<?php
// load file
include_once 'template/footer.php';
