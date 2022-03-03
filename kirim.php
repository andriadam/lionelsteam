<?php
echo '<pre>';
var_dump($_POST);
echo '</pre>';
if (isset($_POST['kirim'])) {
  $admin = 'andriadam2792000@gmail.com'; //ganti email dg email admin (email penerima pesan)

  $nama  = htmlentities($_POST['nama']);
  $email  = htmlentities($_POST['email']); // email dia
  $subject  = htmlentities($_POST['subject']);
  $pesan  = htmlentities($_POST['pesan']);

  $pengirim  = 'Dari: ' . $nama . ' <' . $email . '>';

  if (mail($admin, $subject, $pesan, $pengirim)) {
    echo 'SUCCESS: Pesan anda berhasil di kirim. <a href="index.php">Kembali</a>';
  } else {
    echo 'ERROR: Pesan anda gagal di kirim silahkan coba lagi. <a href="index.php">Kembali</a>';
  }
}
