<?php
session_start();

// Panggil koneksi database.php untuk koneksi database
require_once "../../config/database.php";

// fungsi untuk pengecekan status login user 
// jika user belum login, alihkan ke halaman login dan tampilkan pesan = 1
if (empty($_SESSION['username']) && empty($_SESSION['password'])) {
    echo "<meta http-equiv='refresh' content='0; url=login.php?alert=1'>";
}
// jika user sudah login, maka jalankan perintah untuk insert, update, dan delete
else {
    if ($_GET['act'] == 'insert') {
        if (isset($_POST['simpan'])) {
            // echo '<pre>';
            // var_dump($_POST);
            // var_dump($_FILES);
            // echo '</pre>';
            // die;
            // ambil data hasil submit dari form
            $nama_paket      = mysqli_real_escape_string($mysqli, trim($_POST['nama_paket']));
            $jenis_kendaraan = mysqli_real_escape_string($mysqli, trim($_POST['jenis_kendaraan']));
            $harga           = str_replace('.', '', trim($_POST['harga']));
            $ket_paket       = mysqli_real_escape_string($mysqli, trim($_POST['ket_paket']));

            // Upload gambar
            if (is_uploaded_file($_FILES['foto_paket']['tmp_name'])) {
                $foto_paket = upload();
            } else {
                $foto_paket = 'default.png';
            }

            // perintah query untuk menyimpan data ke tabel paket
            $query = mysqli_query($mysqli, "INSERT INTO paket(nama_paket,jenis_kendaraan,harga,foto_paket,ket_paket)
                                            VALUES('$nama_paket','$jenis_kendaraan','$harga','$foto_paket','$ket_paket')")
                or die('Ada kesalahan pada query insert : ' . mysqli_error($mysqli));

            // cek query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil simpan data
                header("location: ../../main.php?module=paket&alert=1");
            }
        }
    } elseif ($_GET['act'] == 'update') {
        if (isset($_POST['simpan'])) {
            if (isset($_POST['id_paket'])) {
                // ambil data hasil submit dari form
                $id_paket        = mysqli_real_escape_string($mysqli, trim($_POST['id_paket']));
                $nama_paket      = mysqli_real_escape_string($mysqli, trim($_POST['nama_paket']));
                $jenis_kendaraan = mysqli_real_escape_string($mysqli, trim($_POST['jenis_kendaraan']));
                $harga           = str_replace('.', '', trim($_POST['harga']));
                $ket_paket       = mysqli_real_escape_string($mysqli, trim($_POST['ket_paket']));
                $gambar_lama = mysqli_real_escape_string($mysqli, trim($_POST['gambar_lama']));

                // Cek apakah user pilih gambar baru atau tidak
                if ($_FILES['foto_paket']['error'] === 4) {
                    $foto_paket = $gambar_lama;
                } else {
                    if ($gambar_lama != 'default.png') {
                        //Hapus gambar
                        unlink('../../assets/img/paket/' . $gambar_lama);
                    };
                    $foto_paket = upload();
                }
                // perintah query untuk mengubah data pada tabel paket
                $query = mysqli_query($mysqli, "UPDATE paket SET nama_paket      = '$nama_paket',
                                                                    jenis_kendaraan = '$jenis_kendaraan',
                                                                    harga           = '$harga',
                                                                    foto_paket           = '$foto_paket',
                                                                    ket_paket           = '$ket_paket'
                                                              WHERE id_paket        = '$id_paket'")
                    or die('Ada kesalahan pada query update : ' . mysqli_error($mysqli));

                // cek query
                if ($query) {
                    // jika berhasil tampilkan pesan berhasil update data
                    header("location: ../../main.php?module=paket&alert=2");
                }
            }
        }
    } elseif ($_GET['act'] == 'delete') {
        if (isset($_GET['id'])) {
            $id_paket = $_GET['id'];

            // perintah query untuk menghapus data pada tabel paket
            $query = mysqli_query($mysqli, "DELETE FROM paket WHERE id_paket='$id_paket'")
                or die('Ada kesalahan pada query delete : ' . mysqli_error($mysqli));

            // cek hasil query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil delete data
                header("location: ../../main.php?module=paket&alert=3");
            }
        }
    }
}

function upload()
{
    $namafile = $_FILES['foto_paket']['name'];
    // $ukuranfile = $_FILES['foto_paket']['size'];
    // $error = $_FILES['foto_paket']['error'];
    $tmpName = $_FILES['foto_paket']['tmp_name'];

    $ektensigambarvalid = ['jpg', 'jpeg', 'png'];
    $ekstensigambar = explode('.', $namafile);
    $ekstensigambar = strtolower(end($ekstensigambar));
    if (!in_array($ekstensigambar, $ektensigambarvalid)) {
        echo "<script>
          alert('Yang anda upload bukan gambar!');
          </script>";
        return false;
    }

    // generate nama gambar baru
    $namafilebaru = uniqid();
    $namafilebaru .= '.';
    $namafilebaru .= $ekstensigambar;

    // Lolos pengecekan, gambar siap diUpload
    move_uploaded_file($tmpName, '../../assets/img/paket/' . $namafilebaru);

    return $namafilebaru;
}
