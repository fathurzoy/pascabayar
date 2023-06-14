<?php

/**
 *  Summary
 * 
 *  file ini sebagai halaman untuk menampilkan
 *  menu penggunaan
 *  @author Fajar Hafidzi
 *  @version 1.0
 *  @filesource penggunaan.php
 */


// load file
include_once "template/v_header.php";
include_once "template/v_nav.php";
?>

<!-- awal section -->
<section>
    <div class="container py-5">

        <!-- awal card -->
        <div class="card shadow-lg">
            <div class="card-body">

                <!-- awal baris -->
                <div class="row text-center">
                    <div class="col">
                        <h4>Detail Penggunaan Pelanggan</h4>
                    </div>
                </div>
                <!-- akhir baris -->

                <!-- awal baris -->
                <div class="row mt-3">

                    <!-- awal kolom -->
                    <div class="col-lg-8">

                        <!-- awal table -->
                        <table style="font-size:18px">
                            <tr>
                                <td>ID Pelanggan</td>
                                <td></td>
                                <td>:</td>
                                <!-- @var $_SESSION['idpelanggan'] untuk menampilkan data idpelanggan -->
                                <td><?= $_SESSION['idpelanggan']; ?></td>
                            </tr>
                            <tr>
                                <td colspan="">Nama Pelanggan</td>
                                <td></td>
                                <td>:</td>
                                <!-- @var $_SESSION['namapelanggan'] untuk menampilkan data namapelanggan -->
                                <td><?= $_SESSION['namapelanggan']; ?></td>
                            </tr>
                            <tr>
                                <td colspan="">No Kwh</td>
                                <td></td>
                                <td>:</td>
                                <!-- @var $_SESSION['nomorkwh'] untuk menampilkan data nomorkwh -->
                                <td><?= $_SESSION['nomorkwh']; ?></td>
                            </tr>
                        </table>
                        <!-- akhir table -->

                    </div>
                    <!-- akhir kolom -->

                    <!-- awal kolom -->
                    <div class="col-lg-4">

                        <!-- awal table -->
                        <table style="font-size:18px">
                            <tr>
                                <td>Nomor Hp &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td>
                                <td></td>
                                <td>:</td>
                                <!-- @var $_SESSION['nohp'] untuk menampilkan data nomor hp -->
                                <td><?= $_SESSION['nohp']; ?></td>
                            </tr>
                            <tr>
                                <td colspan="">Email</td>
                                <td></td>
                                <td>:</td>
                                <!-- @var $_SESSION['email'] untuk menampilkan data email -->
                                <td><?= $_SESSION['email']; ?></td>
                            </tr>
                            <tr></tr>
                            <tr>
                                <td colspan="">Alamat</td>
                                <td></td>
                                <td>:</td>
                                <!-- @var $_SESSION['alamat'] untuk menampilkan data alamat -->
                                <td><?= $_SESSION['alamat']; ?></td>
                            </tr>
                        </table>
                        <!-- akhir table -->

                    </div>
                    <!-- akhir kolom -->
                </div>
                <!-- akhir baris -->

                <!-- awal baris -->
                <div class="row mt-4">
                    <div class="col-lg-12">

                        <!-- awal table -->
                        <table class="table table-bordered table-hover text-center">
                            <thead class="table" style="background-color: slateblue; color:#E6E6E6">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Bulan</th>
                                    <th scope="col">Tahun</th>
                                    <th scope="col">Meter Awal</th>
                                    <th scope="col">Meter Akhir</th>
                                    <th scope="col">Total Penggunaan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- @var $i sebagai counter -->
                                <?php $i = 1; ?>

                                <!-- @var $dataPenggunaan melakukan perulangan dataPenggunaan
                                     yang dikembalikan dan diisi ke $rp -->
                                <?php foreach ($dataPenggunaan as $rp) :
                                    // @rp as key
                                    foreach ($rp as $key) :
                                ?>
                                        <tr>
                                            <th scope="row"><?= $i; ?></th>
                                            <!-- @var $['bulan'] untuk menampilkan data bulan -->
                                            <td><?= $key['bulan']; ?></td>
                                            <!-- @var $['tahun'] untuk menampilkan data tahun -->
                                            <td><?= $key['tahun']; ?></td>
                                            <!-- @var $['meter_awal'] untuk menampilkan data meter_awal -->
                                            <td><?= $key['meter_awal']; ?> M</td>
                                            <!-- @var $['meter_akhir'] untuk menampilkan data meter_akhir -->
                                            <td><?= $key['meter_akhir']; ?> M</td>
                                            <!-- @var $['meter_akhir']*$key['meter_awal'] untuk menampilkan total penggunaan -->
                                            <td><?= $key['meter_akhir'] - $key['meter_awal']; ?> M</td>
                                        </tr>
                                        <?php $i++; ?>
                                    <?php endforeach; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <!-- akhir table -->

                    </div>
                </div>
                <!-- akhir baris -->

            </div>
        </div>
        <!-- akhir card -->

    </div>
</section>
<!-- akhir section -->

<?php
// load file
include_once("template/v_footer.php");
