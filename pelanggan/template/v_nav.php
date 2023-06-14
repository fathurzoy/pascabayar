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
                    <!-- Mengarahkan ke halaman dashboard -->
                    <a href="<?= base_url() ?>/pelanggan/dashboard.php" class="nav-link">Dashboard</a>
                </li>
                <li class="nav-item">
                    <!-- Mengarahkan ke halaman profile -->
                    <a href="<?= base_url() ?>/pelanggan/profile.php" class="nav-link">Profile</a>
                </li>
                <li class="nav-item">
                    <!-- Mengarahkan ke halaman penggunaan -->
                    <a href="<?= base_url() ?>/pelanggan/penggunaan.php" class="nav-link">Penggunaan</a>
                </li>
                <li class="nav-item">
                    <!-- Mengarahkan ke halaman tagihan -->
                    <a href="<?= base_url() ?>/pelanggan/tagihan.php" class="nav-link">Tagihan</a>
                </li>
                <li class="nav-item">
                    <!-- Mengarahkan ke halaman logout -->
                    <a href="<?= base_url() ?>/pelanggan/logout.php" class="btn btn-warning tombol">SignOut</a>
                </li>
            </ul>
        </div>

    </div>
</nav>
<!-- Akhir nav -->