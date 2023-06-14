<?php

// This is just for very basic implementation reference, in production, you should validate the incoming requests and implement your backend more securely.
// Please refer to this docs for snap popup:
// https://docs.midtrans.com/en/snap/integration-guide?id=integration-steps-overview

namespace Midtrans;

require_once dirname(__FILE__) . '../../asset/midtrans/Midtrans.php';
// Set Your server key
// can find in Merchant Portal -> Settings -> Access keys
Config::$serverKey = 'SB-Mid-server-_mtYaea6DE5DIkl_4B1DXiGT';
Config::$clientKey = 'SB-Mid-client-e8FstlSB04GskoqQ';

// non-relevant function only used for demo/example purpose
printExampleWarningMessage();

// Uncomment for production environment
// Config::$isProduction = true;

// Enable sanitization
Config::$isSanitized = true;

// Enable 3D-Secure
Config::$is3ds = true;

// Uncomment for append and override notification URL
// Config::$appendNotifUrl = "https://example.com";
// Config::$overrideNotifUrl = "https://example.com";


$namapelanggan  = $_POST['namapelanggan'];
$idpelanggan    = $_POST['idpelanggan'];
$idtagihan      = $_POST['idtagihan'];
$alamat         = $_POST['alamat'];
$nohp           = $_POST['nohp'];
$jumlahbayar    = $_POST['jumlahbayar'];
$bulan          = $_POST['bulan'];
$tahun          = $_POST['tahun'];
$jumlahmeter    = $_POST['jumlahmeter'];
$tarifPerKwh    = $_POST['tarifperkwh'];
$email          = $_POST['email'];
$nomorkwh       = $_POST['nomorkwh'];

// echo $namapelanggan;
// echo '<br>';
// echo $idtagihan;
// echo '<br>';
// echo $idpelanggan;
// echo '<br>';
// echo $alamat;
// echo '<br>';
// echo $jumlahbayar;
// echo '<br>';
// echo $tahun;
// echo '<br>';
// echo $bulan;



// Required
$transaction_details = array(
  'order_id' => rand(),
  'gross_amount' => $jumlahbayar, // no decimal allowed for creditcard
);

// Optional
$item1_details = array(
  'id' => $idtagihan,
  'price' => $jumlahbayar,
  'quantity' => 1,
  'name' => $idpelanggan
);

// Optional
// $item2_details = array(
//   'id' => 'a2',
//   'price' => 20000,
//   'quantity' => 2,
//   'name' => "Orange"
// );

// Optional
$item_details = array($item1_details);

// Optional
// $billing_address = array(
//   'first_name'    => $namapelanggan,
//   'last_name'     => "Litani",
//   'address'       => $alamat,
//   'city'          => "Jakarta",
//   'postal_code'   => "16602",
//   'phone'         => "081122334455",
//   'country_code'  => 'IDN'
// );

// Optional
// $shipping_address = array(
//   'first_name'    => "Obet",
//   'last_name'     => "Supriadi",
//   'address'       => "Manggis 90",
//   'city'          => "Jakarta",
//   'postal_code'   => "16601",
//   'phone'         => "08113366345",
//   'country_code'  => 'IDN'
// );

// Optional
$customer_details = array(
  'first_name'    => $namapelanggan,
  // 'last_name'    => $idpelanggan,
  // 'bulan'         => $bulan,
  'email'         => $email,
  'phone'         => $nohp,
  // 'billing_address'  => $billing_address,
  // 'shipping_address' => $shipping_address
);

// Optional, remove this to display all available payment methods
$enable_payments = array('credit_card', 'cimb_clicks', 'mandiri_clickpay', 'bca_klikpay', 'bank_transfer', 'echannel');


$time = time();
$custom_expiry = array(
  'start_time' => date("Y-m-d H:i:s O", $time),
  'unit' => 'Hours',
  'duration'  => 24,
);


// Fill transaction details
$transaction = array(
  'enabled_payments' => $enable_payments,
  'transaction_details' => $transaction_details,
  'customer_details' => $customer_details,
  'item_details' => $item_details,
  'expiry'             => $custom_expiry
);

$snap_token = '';
try {
  $snap_token = Snap::getSnapToken($transaction);
} catch (\Exception $e) {
  echo $e->getMessage();
}

"snapToken = " . $snap_token;

function printExampleWarningMessage()
{
  if (strpos(Config::$serverKey, 'your ') != false) {
    echo "<code>";
    echo "<h4>Please set your server key from sandbox</h4>";
    echo "In file: " . __FILE__;
    echo "<br>";
    echo "<br>";
    echo htmlspecialchars('Config::$serverKey = \'<your server key>\';');
    die();
  }
}

require_once("../config/config.php");

if (!isset($_SESSION['username'])) {
  echo "<script>window.location='" . base_url('pelanggan/login.php') . "';</script>";
}

?>

<!DOCTYPE html>
<html>

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <style>
    body {
      background-color: #f6f9ff;
    }


    .tombol {
      text-transform: uppercase;
      border-radius: 10px;
      background-color: slateblue;
      width: 100px;
      color: rgb(255, 208, 0);
      font-weight: bold;
    }

    .tombol:hover {
      color: slateblue;
      font-weight: bold;
    }

    .konfirm {
      height: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
      color: slateblue;
      font-family: "Roboto", sans-serif;
    }

    .konfirm-form {
      width: 400px;
      height: 600px;
      padding: 20px;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    .tombol-konfirm {
      background-color: slateblue;
      color: rgb(255, 208, 0);
      font-family: "Roboto", sans-serif;
      font-size: 18px;
    }

    .konfirm-login:hover {
      color: slateblue;
    }
  </style>
  <title>Konfirmasi</title>
</head>

<body>
  <div class="container mt-3 konfirm">
    <div class="row">
      <div class="col">
        <div class="card konfirm-form">
          <div class="card-body">
            <h1 class="card-title text-center" style="font-weight: bold;">Konfirmasi</h1>
          </div>
          <div class="card-text">
            <form action="">
              <div class="mb-3">
                <label for="idpelanggan" class="form-label">ID Pelanggan</label>
                <input type="text" class="form-control" value="<?= $idpelanggan; ?>" disabled>
              </div>
              <div class="mb-3">
                <label for="nomorkwh" class="form-label">Nomor Kwh</label>
                <input type="text" class="form-control" value="<?= $nomorkwh; ?>" disabled>
              </div>
              <div class="mb-3">
                <label for="namapelanggan" class="form-label">Nama Pelanggan</label>
                <input type="text" class="form-control" value="<?= $namapelanggan; ?>" disabled>
              </div>
              <div class="mb-3">
                <label for="jumlahbayar" class="form-label">Jumlah Bayar</label>
                <input type="text" class="form-control" value="<?= $jumlahbayar; ?>" disabled>
              </div>
              <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" value="<?= $alamat; ?>" disabled>
              </div>

            </form>
            <div class="d-grid gap-2">
              <button id="pay-button" class="btn btn-warning tombol-konfirm">Bayar</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <!-- TODO: Remove ".sandbox" from script src URL for production environment. Also input your client key in "data-client-key" -->
  <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="<?php echo Config::$clientKey; ?>"></script>
  <script type="text/javascript">
    document.getElementById('pay-button').onclick = function() {
      // SnapToken acquired from previous step
      snap.pay('<?php echo $snap_token ?>', {
        // Optional
        onSuccess: function(result) {
          /* You may add your own js here, this is just example */
          document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
        },
        // Optional
        onPending: function(result) {
          /* You may add your own js here, this is just example */
          document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
        },
        // Optional
        onError: function(result) {
          /* You may add your own js here, this is just example */
          document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
        }
      });
    };
  </script>
</body>

</html>