<?php
session_start();
define("REPOSITORY", $_SERVER['DOCUMENT_ROOT']);

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

            // var_dump($_FILES['foto_galeri']);
            // die;
            // ambil data hasil submit dari form
            $judul_galeri = mysqli_real_escape_string($mysqli, trim($_POST['judul_galeri']));

            // Upload gambar
            if (is_uploaded_file($_FILES['foto_galeri']['tmp_name'])) {
                // var_dump($_FILES['foto_galeri']);
                // die;
                $gambar = upload();
            } else {
                $gambar = 'default.png';
            }

            // perintah query untuk menyimpan data ke tabel galeri
            $query = mysqli_query($mysqli, "INSERT INTO galeri(foto_galeri,judul_galeri)
                                            VALUES('$gambar','$judul_galeri')")
                or die('Ada kesalahan pada query insert : ' . mysqli_error($mysqli));

            // cek query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil simpan data
                header("location: ../../main.php?module=galeri&alert=1");
            }
        }
    } elseif ($_GET['act'] == 'update') {
        if (isset($_POST['simpan'])) {
            if (isset($_POST['id_galeri'])) {
                // var_dump($_POST);
                // die;
                // ambil data hasil submit dari form
                $id_galeri        = mysqli_real_escape_string($mysqli, trim($_POST['id_galeri']));
                $judul_galeri = mysqli_real_escape_string($mysqli, trim($_POST['judul_galeri']));
                $gambar_lama = mysqli_real_escape_string($mysqli, trim($_POST['gambar_lama']));

                // Cek apakah user pilih gambar baru atau tidak
                if ($_FILES['foto_galeri']['error'] === 4) {
                    $gambar = $gambar_lama;
                } else {
                    if ($gambar_lama != 'default.png') {
                        //Hapus gambar
                        unlink('../../assets/img/galeri/' . $gambar_lama);
                    };
                    $gambar = upload();
                }

                // perintah query untuk mengubah data pada tabel galeri
                $query = mysqli_query($mysqli, "UPDATE galeri SET foto_galeri      = '$gambar',
                                                                    judul_galeri = '$judul_galeri'
                                                              WHERE id_galeri        = $id_galeri")
                    or die('Ada kesalahan pada query update : ' . mysqli_error($mysqli));

                // cek query
                if ($query) {
                    // jika berhasil tampilkan pesan berhasil update data
                    header("location: ../../main.php?module=galeri&alert=2");
                }
            }
        }
    } elseif ($_GET['act'] == 'delete') {
        if (isset($_GET['id'])) {
            $id_galeri = $_GET['id'];
            $query = mysqli_query($mysqli, "SELECT * FROM galeri WHERE id_galeri='$id_galeri'")
                or die('Ada kesalahan pada query tampil data galeri: ' . mysqli_error($mysqli));

            $galeri = mysqli_fetch_assoc($query);

            if ($galeri['foto_galeri'] != 'default.png') {
                //Hapus gambar
                unlink('../../assets/img/galeri/' . $galeri['foto_galeri']);
            };

            // perintah query untuk menghapus data pada tabel galeri
            $query = mysqli_query($mysqli, "DELETE FROM galeri WHERE id_galeri='$id_galeri'")
                or die('Ada kesalahan pada query delete : ' . mysqli_error($mysqli));

            // cek hasil query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil delete data
                header("location: ../../main.php?module=galeri&alert=3");
            }
        }
    }
}


function upload()
{
    $namafile = $_FILES['foto_galeri']['name'];
    // $ukuranfile = $_FILES['foto_galeri']['size'];
    // $error = $_FILES['foto_galeri']['error'];
    $tmpName = $_FILES['foto_galeri']['tmp_name'];

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
    move_uploaded_file($tmpName, '../../assets/img/galeri/' . $namafilebaru);

    return $namafilebaru;
}
