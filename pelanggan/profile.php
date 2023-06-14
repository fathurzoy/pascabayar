<?php

/**
 *  Summary
 * 
 *  file ini sebagai halaman untuk menampilkan
 *  menu profile
 *  @author Fajar Hafidzi
 *  @version 1.0
 *  @filesource profile.php
 */


// load file
include_once "template/v_header.php";
include_once "template/v_nav.php";
?>

<!-- awal section -->
<section>
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-4">
                <div class="shadow card mb-4">
                    <div class="card-body text-center">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                        <h5 class="my-3"><?= $_SESSION['idpelanggan']; ?></h5>
                        <p class="text-muted mb-1"><?= $_SESSION['namapelanggan']; ?></p>
                        <p class="text-muted mb-4"><?= $_SESSION['alamat']; ?></p>
                        <div class="d-flex justify-content-center mb-2">
                            <button type="button" class="btn btn-md btn-warning" style="color: white;" data-bs-toggle="modal" data-bs-target="#update">Update Profile</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">ID Pelanggan</p>
                            </div>
                            <div class="col-sm-9">
                                <!-- @var $_SESSION['idpelanggan'] untuk menampilkan data idpelanggan -->
                                <p class="text-muted mb-0"><?= $_SESSION['idpelanggan']; ?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Nama Pelanggan</p>
                            </div>
                            <div class="col-sm-9">
                                <!-- @var $_SESSION['namapelanggan'] untuk menampilkan data namapelanggan -->
                                <p class="text-muted mb-0"><?= $_SESSION['namapelanggan']; ?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">No Kwh</p>
                            </div>
                            <div class="col-sm-9">
                                <!-- @var $_SESSION['nomorkwh'] untuk menampilkan data namapelanggan -->
                                <p class="text-muted mb-0"><?= $_SESSION['nomorkwh']; ?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">No Handphone</p>
                            </div>
                            <div class="col-sm-9">
                                <!-- @var $_SESSION['nohp'] untuk menampilkan data nohp -->
                                <p class="text-muted mb-0"><?= $_SESSION['nohp']; ?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Email</p>
                            </div>
                            <div class="col-sm-9">
                                <!-- @var $_SESSION['email'] untuk menampilkan data namapelanggan -->
                                <p class="text-muted mb-0"><?= $_SESSION['email']; ?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Alamat</p>
                            </div>
                            <div class="col-sm-9">
                                <!-- @var $_SESSION['alamat'] untuk menampilkan data alamat -->
                                <p class="text-muted mb-0"><?= $_SESSION['alamat']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
<!-- akhir section -->


<!-- Update data -->
<!-- Modal -->
<div class="modal fade mt-5" id="update" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="update">Update Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- awal form -->
            <!-- mengirim data ke file updateprofile.php dengan method post -->
            <form action="<?= base_url() ?>/pelanggan/config/updateprofile.php" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <!-- @var $_SESSION['token'] untuk mengisi value data token -->
                        <input type="hidden" name="token" class="form-control" value="<?= $_SESSION['token']; ?>">
                    </div>
                    <div class="form-group">
                        <!-- @var $_SESSION['idpelanggan'] untuk mengisi value data idpelanggan -->
                        <input type="hidden" name="idpelanggan" class="form-control" value="<?= $_SESSION['idpelanggan']; ?>">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="namapelanggan">&nbsp;Nama Pelanggan</label>
                        <!-- @var $_SESSION['namapelanggan'] untuk mengisi value data token -->
                        <input type="text" name="namapelanggan" class="form-control" id="namapelanggan" value="<?= $_SESSION['namapelanggan']; ?>">
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="control-label" for="email">&nbsp;Email</label>
                        <!-- @var $_SESSION['email'] untuk mengisi value data email -->
                        <input type="text" name="email" class="form-control" id="email" value="<?= $_SESSION['email']; ?>">
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="control-label" for="nohandphone">&nbsp;No Handphone</label>
                        <!-- @var $_SESSION['nohp'] untuk mengisi value data nohp -->
                        <input type="text" name="nohandphone" class="form-control" id="nohandphone" value="<?= $_SESSION['nohp']; ?>">
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="control-label" for="alamat">&nbsp;Alamat</label>
                        <!-- @var $_SESSION['alamat'] untuk mengisi value data alamat -->
                        <input type="text" name="alamat" class="form-control" id="alamat" value="<?= $_SESSION['alamat']; ?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary">Reset</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
            <!-- akhir form -->

        </div>
    </div>
</div>

<?php
// load file
include_once "template/v_footer.php";
