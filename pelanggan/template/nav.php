<!-- Awal nav -->
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: slateblue;">
    <div class="container">
        <a class="navbar-brand" href="#">PayListrik</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <!-- Mengarahkan ke halaman home -->
                    <a href="<?= base_url() ?>/pelanggan/home.php" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <!-- Mengarahkan ke halaman about -->
                    <a href="<?= base_url() ?>/pelanggan/about.php" class="nav-link">About</a>
                </li>
                <li class="nav-item">
                    <!-- Mengarahkan ke halaman login -->
                    <a href="<?= base_url() ?>/pelanggan/login.php" class="btn btn-warning tombol">Sign In</a>
                </li>
            </ul>
        </div>

    </div>
</nav>
<!-- Akhir nav -->