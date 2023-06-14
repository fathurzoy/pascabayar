<?php

/**
 *  Summary
 * 
 *  file ini sebagai halaman untuk menampilkan
 *  menu tagihan
 *  @author Fajar Hafidzi
 *  @version 1.0
 *  @filesource tagihan.php
 */


// load file
include_once "template/v_header.php";
include_once "template/v_nav.php";
?>

<!-- awal section -->
<section>
    <div class="container py-5">
        <div class="card shadow-lg">
            <div class="card-body">

                <div class="row text-center">
                    <div class="col">
                        <h4>Tagihan Pelanggan</h4>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-lg-8">
                        <table style="font-size:16px">
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
                    </div>
                    <div class="col-lg-4">
                        <table style="font-size:18px">
                            <tr>
                                <td>Nomor Hp &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td>
                                <td></td>
                                <td>:</td>
                                <!-- @var $_SESSION['nohp'] untuk menampilkan data nohp -->
                                <td><?= $_SESSION['nohp']; ?></td>
                            </tr>
                            <tr>
                                <td colspan="">Email</td>
                                <td></td>
                                <td>:</td>
                                <!-- @var $_SESSION['email'] untuk menampilkan data email -->
                                <td><?= $_SESSION['email']; ?></td>
                            </tr>
                            <tr>
                                <td colspan="">Alamat</td>
                                <td></td>
                                <td>:</td>
                                <!-- @var $_SESSION['alamat'] untuk menampilkan data alamat -->
                                <td><?= $_SESSION['alamat']; ?></td>
                            </tr>
                        </table>
                    </div>
                </div>


                <div class="row mt-3">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover text-center">
                            <thead class="table" style="background-color: slateblue; color:#E6E6E6">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">ID Tagihan</th>
                                    <th scope="col">Bulan</th>
                                    <th scope="col">Tahun</th>
                                    <th scope="col">Total Digunakan</th>
                                    <th scope="col">Daya</th>
                                    <th scope="col">Tarif Per Kwh</th>
                                    <th scope="col">Biaya Perbulan</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // @var int $jumlahPenggunaan sebagai penjumlah 
                                $jumlahPenggunaan = 0;

                                // @var int $tarifPerKwh sebagai penjumlah 
                                $tarifPerKwh = 0;

                                // @var int $golonganDaya sebagai penjumlah 
                                $golonganDaya = 0;

                                // @var int $i sebagai counter
                                $i = 1; ?>

                                <!--  @var $dataTagihan melakukan perulangan untuk menampilkan
                                    dataTagihan yang dikembalikan dan diisi ke $dt  -->
                                <?php foreach ($dataTagihan as $dt) :
                                    // @var dt as @key
                                    foreach ($dt as $key) :
                                        // @var $jumlahPenggunaan penampung nilai $key['jumlah_meter'] 
                                        $jumlahPenggunaan += $key['jumlah_meter'];
                                        // @var @tarifPerKwh penampung nilai $key['tarifperkwh']
                                        $tarifPerKwh = $key['tarifperkwh'];
                                        // @var golonganDaya penampung nilai $key['daya']
                                        $golonganDaya = $key['daya'];
                                ?>
                                        <tr>
                                            <th scope="row"><?= $i; ?></th>
                                            <!-- @var $key['id_tagihan'] menampilkan data idtagihan -->
                                            <td><?= $key['id_tagihan']; ?></td>
                                            <!-- @var $key['bulan'] menampilkan data bulan -->
                                            <td><?= $key['bulan']; ?></td>
                                            <!-- @var $key['tahun'] menampilkan data tahun -->
                                            <td><?= $key['tahun']; ?></td>
                                            <!-- @var $key['jumlaj_meter'] menampilkan data jumlah_meter -->
                                            <td><?= $key['jumlah_meter']; ?> M</td>
                                            <!-- @var $key['daya'] menampilkan data daya -->
                                            <td><?= $key['daya']; ?></td>
                                            <!-- @var $key['tarifpekwh'] menampilkan data tarifperkwh dalam format 2 angka dibelakang koma -->
                                            <td>Rp. <?= number_format($key['tarifperkwh'], 2, ',', '.'); ?></td>
                                            <!-- @var $key['tarifperkwh']*$key['tarifperkwh'] menampilkan jumlah biaya bulanan dalam format 2 angka dibelakang koma -->
                                            <td>Rp. <?= number_format($key['tarifperkwh'] * $key['jumlah_meter'], 2, ',', '.'); ?></td>
                                            <td>
                                                <!-- Membuat form hidden -->
                                                <!-- mengirim data ke file checkout-process.php dengan method post -->
                                                <form action="checkout-process.php" method="POST">
                                                    <input type="hidden" name="idpelanggan" value="<?= $_SESSION['idpelanggan']; ?>">
                                                    <input type="hidden" name="namapelanggan" value="<?= $_SESSION['namapelanggan']; ?>">
                                                    <input type="hidden" name="alamat" value="<?= $_SESSION['alamat']; ?>">
                                                    <input type="hidden" name="nohp" value="<?= $_SESSION['nohp']; ?>">
                                                    <input type="hidden" name="email" value="<?= $_SESSION['email']; ?>">
                                                    <input type="hidden" name="nomorkwh" value="<?= $_SESSION['nomorkwh']; ?>">
                                                    <input type="hidden" name="idtagihan" value="<?= $key['id_tagihan']; ?>">
                                                    <input type="hidden" name="bulan" value="<?= $key['bulan']; ?>">
                                                    <input type="hidden" name="tahun" value="<?= $key['tahun']; ?>">
                                                    <input type="hidden" name="tarifperkwh" value="<?= $key['tarifperkwh']; ?>">
                                                    <input type="hidden" name="jumlahmeter" value="<?= $key['jumlah_meter']; ?>">
                                                    <input type="hidden" name="jumlahbayar" value="<?= $key['jumlah_meter'] * $key['tarifperkwh']; ?>">
                                                    <button class="btn btn-danger btn-sm" type="submit">Bayar</button>
                                                </form>
                                                <!-- akhir form -->
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                    <?php endforeach; ?>
                                <?php endforeach; ?>
                            <tfoot>
                                <tr style="font-weight: bold;">
                                    <td colspan="4">Total</td>
                                    <!-- @var $jumlahPenggunaan menampilkan data total penggunaan -->
                                    <td><?= $jumlahPenggunaan; ?> M</td>
                                    <!-- @var $golongandaya menampilkan golongan daya -->
                                    <td><?= $golonganDaya; ?></td>
                                    <!-- @var $tarifPerKwh menampilkan data tarifperkwh dalam format 2 angka dibelakang koma -->
                                    <td>Rp. <?= number_format($tarifPerKwh, 2, ',', '.'); ?></td>
                                    <!-- @var $tarifperkwh*$tarifperkwh menampilkan jumlah biaya total belum dibayar dalam format 2 angka dibelakang koma -->
                                    <td>Rp. <?= number_format($jumlahPenggunaan * $tarifPerKwh, 2, ',', '.'); ?></td>
                                </tr>
                            </tfoot>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- akhir section -->

<?php
// load file
include_once "template/v_footer.php";
