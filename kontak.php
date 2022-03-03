<?php
session_start();
/* panggil file database.php untuk koneksi ke database */
require_once "config/database.php";
// $kirim = mail("andriadam2792000@gmail.com", "Test kirim pesan email", "Email ini dikirim dari localhost");
// if ($kirim == true) {
//   echo "email berhasil dikirim";
// } else {
//   echo "email gagal dikirim";
// }
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="assets/css/bootstrap.min2.css">
  <!-- font awesome -->
  <!-- <link rel="stylesheet" href="assets/css/all.css"> -->
  <link rel="stylesheet" href="assets/css/style_user.css">
  <title>Hello, world!</title>
  <style>

  </style>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg sticky-top navbar-dark" id="top-bar">

    <img src="img/top bar/logo.png" class="mr-2">
    <a class="navbar-brand d-flex" href="#">LIONEL CARWASH</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <div class="container d-flex justify-content-between">
        <ul class="navbar-nav ml-auto d-flex">
          <li class="nav-item mr-4">
            <a class="nav-link page-scroll text-white" href="index.php"><strong>BERANDA</strong></a>
          </li>
          <li class="nav-item mr-4">
            <a class="nav-link page-scroll text-white" href="paket.php"><strong>PAKET</strong></a>
          </li>
          <li class="nav-item mr-4">
            <a class="nav-link page-scroll text-white" href="galeri.php"><strong>GALERI</strong></a>
          </li>
          <li class="nav-item mr-4">
            <a class="nav-link page-scroll text-white" href="tentang.php"><strong>TENTANG KAMI</strong></a>
          </li>
          <li class="nav-item mr-4">
            <a class="nav-link page-scroll text-white" href="kontak.php"><strong>KONTAK</strong></a>
          </li>
          <a class="btn badge-pill" style="background-color:#FA6A2F; font-size: 14px;" href="login.php">Login admin</a>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Akhir Navbar -->

  <div class="jumbotron jumbotron-fluid text-center mb-0" style="height: 350px;">
    <div class="container" style="padding-top:70px">
      <h1 class="display-6">Kontak</h1>
      <hr>
    </div>
  </div>

  <!-- Maps -->
  <section class="maps" style="overflow-x: hidden;">
    <div class="row justify-content-center">
      <!-- <div class="col text-center"> -->
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63474.621856515136!2d106.60895705223082!3d-6.108626660580904!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x17028555d5e661d9!2sLaksa%20Benda!5e0!3m2!1sid!2sid!4v1621268996839!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
      <!-- </div> -->
    </div>
  </section>
  <!-- Akhir Maps -->

  <!-- Contact -->
  <section class="contact">
    <div class="container my-5">
      <div class="row">
        <div class="col-sm-12 text-center">
          <h2>Kritik dan saran</h2>
          <hr style="border-top-color: #FA6A2F;">
        </div>
      </div>

      <div class="row justify-content-center">
        <div class="col-sm-4">
          <!-- <div class="card text-white bg-dark mb-3">
            <div class="card-body  text-center">
              <h5 class="card-title">Contact me</h5>
              <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing
                elit. Ipsam, at.
              </p>
            </div>
          </div> -->
          <ul class="list-group">
            <li class="list-group-item disabled">
              <h1>Location</h1>
            </li>
            <li class="list-group-item"><i class="fas fa-envelope"></i> example@examplel.com</li>
            <li class="list-group-item"><i class="fas fa-phone-alt"></i> 0899602748612</li>
            <li class="list-group-item"><i class="fas fa-map-marker-alt"></i> Alcatraz Island Photo Album Dhaka</li>
          </ul>
        </div>

        <div class="col-sm-6">
          <form action="" method="POST">
            <div class="form-row">
              <div class="form-group col-md-6">
                <input type="nama" class="form-control" name="nama" id="nama" placeholder="Masukkan nama">
              </div>
              <div class="form-group col-md-6">
                <input type="email" class="form-control" name="email" id="email" placeholder="Masukkan email">
              </div>
            </div>
            <div class="form-group">
              <input type="subject" class="form-control" name="subject" id="subject" placeholder="Masukkan subject">
            </div>
            <div class="form-group">
              <label for="pesan">Pesan</label>
              <textarea class="form-control" rows="4" name="pesan" placeholder="Masukkan pesan"></textarea>
            </div>

            <button type="submit" name="kirim" class="btn btn-outline-dark" style="background-color: #FA6A2F;">Kirim pesan</button>
          </form>
        </div>
      </div>
      <?php
      if (isset($_POST['kirim'])) {
        $admin = 'andriadam2792000@gmail.com'; //ganti email dg email admin (email penerima pesan)

        $nama  = htmlentities($_POST['nama']);
        $email  = htmlentities($_POST['email']); // email dia
        $subject  = htmlentities($_POST['subject']);
        $pesan  = htmlentities($_POST['pesan']);

        $pengirim  = 'Dari: ' . $nama . ' <' . $email . '>';

        if (mail($admin, $subject, $pesan, $pengirim)) {
          echo '<div class="alert mt-3 alert-success" role="alert"> SUCCESS: Pesan anda berhasil di kirim. </div>';
        } else {
          echo 'ERROR: Pesan anda gagal di kirim silahkan coba lagi.';
        }
      }
      ?>
    </div>
  </section>
  <!-- Akhir Contact -->

  <!-- Footer -->
  <footer class="site-footer mt-auto">
    <div class="container my-0">
      <div class="row">
        <div class="col-sm-12 col-md-6">
          <h6>About</h6>
          <p class="text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus molestias, temporibus fuga suscipit magnam id modi commodi pariatur sed maxime?</p>
        </div>
        <div class="col-xs-6 col-md-3">
          <h6>Jam Buka</h6>
          <ul class="footer-links">
            <li>
              Senin s/d Jumat (10.00 - 17.00)
            </li>
            <li>
              Sabtu s/d Minggu (13.00 - 17.00)
            </li>
          </ul>
        </div>
        <div class="col-xs-6 col-md-3">
          <h6>Kontak</h6>
          <ul class="footer-links">
            <li><i class="fas fa-envelope"></i> Email : example@example.com</li>
            <li><i class="fas fa-phone-alt"></i> Telepon : (+62) 89602748612</li>
            <li><i class="fas fa-map-marker-alt"></i> Lokasi : Alcatraz Island </li>
          </ul>
        </div>
        <div class="col-12">
          <ul class="social-icons text-center">
            <li><a class="facebook" href="#"><i class="fab fa-facebook-square"></i></a></li>
            <li><a class="instagram" href="#"><i class="fab fa-instagram"></i></a></li>
            <li><a class="dribbble" href="#"><i class="fab fa-twitter-square"></i></a></li>
          </ul>
        </div>
      </div>
      <hr>
    </div>
    <div class="container">
      <div class="row">
        <div class="col text-center">
          <p class="copyright-text">Copyright &copy; 2021 All Rights Reserved by
            <a href="#">Ribkaelsa</a>.
          </p>
        </div>
      </div>
    </div>
  </footer>
  <!-- Akhir Footer -->




  <!-- Live Chat -->
  <a class="open-button" onclick="openForm()"><img src="assets/img/icon-livechat.png" width="50" alt="Simple Png Live Chat" /></a>

  <div class="chat-popup" id="myForm">
    <div class="form-container chat_box">
      <div class="form-control messages_display"></div>
      <div class="form-group">
        <label>Nama</label>
        <input type="text" class="input_name form-control" required placeholder="Nama" />
      </div>

      <!-- <label for="msg">Pesan</label> -->
      <textarea class="input_message" placeholder="Ketik pesan.." name="msg" required></textarea>

      <div class="input_send_holder d-inline">
        <button type="submit" class="btn input_send">Send</button>
      </div>
      <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
    </div>
  </div>
  <!-- Akhir Live chat -->





  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="assets/js/jquery-3.5.1.min.js"></script>
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/all.js"></script>

  <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.3.0/bootbox.min.js" type="text/javascript"></script>
  <script src="assets/js/script.js"></script>
  <script>
    // Navbar
    $(document).ready(function() {
      $(window).scroll(function() {
        if ($(window).scrollTop() > 200) {
          $("#top-bar").css({
            "background-color": '#35363E'
          });
        } else {
          $("#top-bar").css({
            "background-color": "rgba(53, 54, 62, 0.5)"
          });
        }

      })
    })
  </script>


</body>

</html>