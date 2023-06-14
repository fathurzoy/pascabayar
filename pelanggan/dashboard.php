<?php

/**
 *  Summary
 * 
 *  file ini sebagai halaman untuk menampilkan
 *  menu dashboard
 *  @author Fajar Hafidzi
 *  @version 1.0
 *  @filesource dashboard.php
 */

// load file
include_once "template/v_header.php";
include_once "template/v_nav.php";


// @var int $jumlahPenggunaan sebagai penjumlah 
$jumlahPenggunaan = 0;

// @var int $tarifPerKwh sebagai penjumlah 
$tarifPerKwh = 0;

// @var int $golonganDaya sebagai penjumlah 
$golonganDaya = 0;

/**
 * @var $dataTagihan melakukan perulangan untuk menampilkan
 * dataTagihan yang dikembalikan dan diisi ke $dt  
 */
foreach ($dataTagihan as $dt) {
    /* @var dt as @d */
    foreach ($dt as $d) {
        // @var $jumlahPenggunaan penampung nilai $d['jumlah_meter'] 
        $jumlahPenggunaan += $d['jumlah_meter'];
        // @var @tarifPerKwh penampung nilai $d['tarifperkwh']
        $tarifPerKwh = $d['tarifperkwh'];
        // @var golonganDaya penampung nilai $d['daya']
        $golonganDaya = $d['daya'];
    }
}
?>

<!-- awal section -->
<section>
    <div class="container py-5">
        <!-- awal baris -->
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <!-- @var $_SESSION['namapelanggan'] menampilkan nama pelanggan-->
                        <h4><?= "Hallo, Selamat Datang " . $_SESSION['namapelanggan'] . " disini"; ?></h4>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- akhir baris -->

        <!-- awal kolom -->
        <div class="col-lg-12">

            <!-- awal bari -->
            <div class="row">

                <!-- awal kolom -->
                <div class="col-md-4">
                    <div class="card text-white bg-danger border-top-3 mb-3" style="max-width: 29rem;">
                        <div class="card-header">Total Penggunaan</div>
                        <div class="card-body text-center">
                            <a href="<?= base_url() ?>/pelanggan/penggunaan.php">
                                <i class="fas fa-tachometer-alt fa-3x" style="color: white;"></i>
                            </a>
                            <br>
                            <br>
                            <!-- @var $jumlahPenggunaan menampilkan total penggunaan -->
                            <h3 class="card-title text-center"><?= $jumlahPenggunaan; ?> M</h3>
                        </div>
                    </div>
                </div>
                <!-- akhir kolom -->

                <!-- awal kolom -->
                <div class="col-md-4">
                    <div class="card text-white bg-warning mb-3" style="max-width: 29rem;">
                        <div class="card-header">Total Tagihan </div>
                        <div class="card-body text-center">
                            <a href="<?= base_url() ?>/pelanggan/tagihan.php">
                                <i class="far fa-calendar-alt fa-3x" style="color: white;"></i>
                            </a>
                            <br>
                            <br>
                            <!-- @var $totaltagihan menampilkan totaltagihan-->
                            <h3 class="card-title text-center"><?= $totalTagihan; ?> Bulan</h3>
                        </div>
                    </div>
                </div>
                <!-- akhir kolom -->

                <!-- awal kolom -->
                <div class="col-md-4">
                    <div class="card text-white bg-primary mb-3" style="max-width: 29rem;">
                        <div class="card-header">Total Biaya</div>
                        <div class="card-body text-center">
                            <i class="fas fa-money-bill-wave fa-3x"></i>
                            <br>
                            <br>
                            <!-- @var $jumlahPenggunan * $tarifPerKwh menampilkan dalam format 2 angka dibelakang koma -->
                            <h3 class="card-title">Rp. <?= number_format($jumlahPenggunaan * $tarifPerKwh, 2, ',', '.'); ?></h3>
                        </div>
                    </div>
                </div>
                <!-- akhir kolom -->

            </div>
            <!-- akhir baris -->

        </div>
        <!-- akhir kolom -->

    </div>
</section>
<!-- akhir section -->

<?php
// load file
include_once "template/v_footer.php";
