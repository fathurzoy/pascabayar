<?php
require_once("../config/config.php");

if (!isset($_SESSION['username'])) {
    echo "<script>window.location='" . base_url('admin/login.php') . "';</script>";
}

include_once("template/header.php");
include_once("template/nav.php");
include_once("template/sidebar.php");

?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Tarif</h1>
        <!-- <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Tarif</li>
            </ol>
        </nav> -->
    </div><!-- End Page Title -->

    <section>
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            <button class="btn btn-primary"><i class="bi bi-person-plus-fill"></i> Tambah Tarif
                            </button>
                        </h5>
                        <p></p>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Password</th>
                                    <th scope="col">Level</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Brandon Jacob</td>
                                    <td>Designer</td>
                                    <td>28</td>
                                    <td>2016-05-25</td>
                                    <td>
                                        <button type="button" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                        <button type="button" class="btn btn-warning"><i class="bi bi-arrow-repeat"></i></button>
                                        <!-- <button type="button" class="btn btn-success"><i class="bi bi-collection"></i></button> -->
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->

<?php
include_once("template/footer.php");
