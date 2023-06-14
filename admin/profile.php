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
        <h1>Profile</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Profile</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    </section>

</main><!-- End #main -->

<?php
include_once("template/footer.php");
