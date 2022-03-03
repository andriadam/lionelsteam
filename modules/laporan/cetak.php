<?php

use Dompdf\Dompdf;

session_start();
ob_start();

// Panggil koneksi database.php untuk koneksi database
require_once "../../config/database.php";
// panggil fungsi untuk format tanggal
include "../../config/fungsi_tanggal.php";
// panggil fungsi untuk format rupiah
include "../../config/fungsi_rupiah.php";

$hari_ini = date("d-m-Y");
// ambil data hasil submit dari form
$tgl1     = $_GET['tgl_awal'];
$explode  = explode('-', $tgl1);
$tgl_awal = $explode[2] . "-" . $explode[1] . "-" . $explode[0];

$tgl2      = $_GET['tgl_akhir'];
$explode   = explode('-', $tgl2);
$tgl_akhir = $explode[2] . "-" . $explode[1] . "-" . $explode[0];

if (isset($_GET['tgl_awal'])) {
    $no    = 1;
    $total = 0;
    // fungsi query untuk menampilkan data dari tabel transaksi
    $query = mysqli_query($mysqli, "SELECT * FROM transaksi as a INNER JOIN paket as b
                                    ON a.paket=b.id_paket
                                    WHERE a.tanggal BETWEEN '$tgl_awal' AND '$tgl_akhir'
                                    ORDER BY a.id_transaksi ASC")
        or die('Ada kesalahan pada query tampil Transaksi : ' . mysqli_error($mysqli));
    $count  = mysqli_num_rows($query);
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Rekap Data Transaksi</title>
    <!-- <link rel="stylesheet" type="text/css" href="../../assets/css/laporan.css" /> -->
</head>

<body>
    <style type="text/css">
        body {
            font-family: sans-serif;
            font-size: 14px;
        }

        .table {
            width: 100%;
        }

        th,
        td {}

        .table,
        .table th,
        .table td {
            padding: 5px;
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>


    <div id="title">
        REKAP DATA TRANSAKSI
    </div>
    <?php
    if ($tgl_awal == $tgl_akhir) { ?>
        <div id="title-tanggal">
            Tanggal <?php echo tgl_eng_to_ind($tgl1); ?>
        </div>
    <?php
    } else { ?>
        <div id="title-tanggal">
            Tanggal <?php echo tgl_eng_to_ind($tgl1); ?> s.d. <?php echo tgl_eng_to_ind($tgl2); ?>
        </div>
    <?php
    }
    ?>

    <hr><br>
    <div id="isi">
        <table width="100%" border="0.3" cellpadding="0" class="table" cellspacing="0">
            <thead>
                <tr class="tr-title">
                    <th height="20" align="center" valign="middle">No.</th>
                    <th height="20" align="center" valign="middle">ID Transaksi</th>
                    <th height="20" align="center" valign="middle">Tanggal</th>
                    <th height="20" align="center" valign="middle">Nama Pelanggan</th>
                    <th height="20" align="center" valign="middle">Jenis Kendaraan</th>
                    <th height="20" align="center" valign="middle">No. Plat</th>
                    <th height="20" align="center" valign="middle">Paket</th>
                    <th height="20" align="center" valign="middle">Biaya</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // jika data ada
                if ($count == 0) {
                    echo "  <tr>
                    <td align='center' valign='middle'></td>
                    <td align='center' valign='middle'></td>
                    <td align='center' valign='middle'></td>
                    <td style='padding-left:5px;' valign='middle'></td>
                    <td align='center' valign='middle'></td>
                    <td align='center' valign='middle'></td>
                    <td style='padding-left:5px;' valign='middle'></td>
                    <td style='padding-right:5px;' align='right' valign='middle'></td>
                </tr>
                <tr>
                    <tdcolspan='7' align='center' valign='middle'><strong>Total</strong></tdcolspan=>
                    <td style='padding-right:5px;'width='120' align='right' valign='middle'><strong></strong></td>
                </tr>";
                }
                // jika data tidak ada
                else {
                    // tampilkan data
                    while ($data = mysqli_fetch_assoc($query)) {
                        $t_transaksi       = $data['tanggal'];
                        $exp               = explode('-', $t_transaksi);
                        $tanggal_transaksi = tgl_eng_to_ind($exp[2] . "-" . $exp[1] . "-" . $exp[0]);

                        $jumlah = $data['harga'];
                        // menampilkan isi tabel dari database ke tabel di aplikasi
                        echo "  <tr>
                        <td align='center' valign='middle'>$no</td>
                        <td align='center' valign='middle'>$data[id_transaksi]</td>
                        <td align='center' valign='middle'>$tanggal_transaksi</td>
                        <td style='padding-left:5px;' valign='middle'>$data[nama_pelanggan]</td>
                        <td align='center' valign='middle'>$data[jenis_kendaraan]</td>
                        <td align='center' valign='middle'>$data[no_plat_kendaraan]</td>
                        <td style='padding-left:5px;' valign='middle'>$data[nama_paket]</td>
                        <td style='padding-right:5px;' align='right' valign='middle'>Rp. " . format_rupiah($jumlah) . "</td>
                    </tr>";
                        $no++;

                        $total += $jumlah;
                    }
                    echo "  <tr>
                        <td colspan='7' align='center' valign='middle'><strong>Total</strong></td>
                        <td style='padding-right:5px;' align='right' valign='middle'><strong>Rp. " . format_rupiah($total) . "</strong></td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>

        <div id="footer-tanggal">
            Tangerang, <?php echo tgl_eng_to_ind("$hari_ini"); ?>
        </div>
        <div id="footer-jabatan">
            Pimpinan
        </div>

        <div id="footer-nama">
            Lionel Steam.
        </div>
    </div>
</body>

<script>
    // window.print();
</script>

<?php
require_once '../../assets/plugins/dompdf/autoload.inc.php';

// use Dompdf\Dompdf;

$dompdf = new Dompdf();
$dompdf->load_html(ob_get_clean());
// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$dompdf->stream("Laporan.pdf", array("Attachment" => false));
?>

</html><!-- Akhir halaman HTML yang akan di konvert -->