<?php
session_start();
/* panggil file database.php untuk koneksi ke database */
require_once "config/database.php";
// konfigurasi

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
  <!-- font awesome -->
  <link rel="stylesheet" href="assets/css/all.css">

  <title>Hello, world!</title>

</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg sticky-top navbar-dark" id="top-bar">

    <img src="assets/img/logo.png" class="mr-2 navbar-img">
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


  <!-- Tentang -->
  <section class="tentang my-4">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="accordion" id="accordionExample">
            <div class="card">
              <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                  <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Tentang Lionel
                  </button>
                </h2>
              </div>

              <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-4">
                      <img src="assets/img/logo.png" class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                      <div class="card-body">
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim repellat sequi cupiditate quo eaque alias dolores suscipit ab odit assumenda officia facilis sit inventore quas dolorem voluptas unde, quaerat ullam! Commodi quaerat fugit itaque ad, quia eum recusandae non maiores dolorem molestiae! Commodi itaque temporibus ab aliquid adipisci quisquam voluptatum officiis doloremque neque iure? Incidunt reiciendis mollitia cum, labore explicabo repellendus unde magni nam aliquid ipsam molestias nulla in fuga quidem dolorum alias atque. Veniam, aliquid laborum excepturi modi amet sequi ipsa illum necessitatibus eligendi nobis odit itaque deserunt debitis porro, deleniti perferendis magnam. Dolores, praesentium aliquid. Pariatur, eveniet voluptatem.</p>
                        <p class="card-text"><small class="text-muted">16 Mei 2021</small></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="headingTwo">
                <h2 class="mb-0">
                  <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Profil Pemilik
                  </button>
                </h2>
              </div>
              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">
                  <div class="row no-gutters">
                    <div class="col-md-8">
                      <div class="card-body">
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim repellat sequi cupiditate quo eaque alias dolores suscipit ab odit assumenda officia facilis sit inventore quas dolorem voluptas unde, quaerat ullam! Commodi quaerat fugit itaque ad, quia eum recusandae non maiores dolorem molestiae! Commodi itaque temporibus ab aliquid adipisci quisquam voluptatum officiis doloremque neque iure? Incidunt reiciendis mollitia cum, labore explicabo repellendus unde magni nam aliquid ipsam molestias nulla in fuga quidem dolorum alias atque. Veniam, aliquid laborum excepturi modi amet sequi ipsa illum necessitatibus eligendi nobis odit itaque deserunt debitis porro, deleniti perferendis magnam. Dolores, praesentium aliquid. Pariatur, eveniet voluptatem.</p>
                        <p class="card-text"><small class="text-muted">16 Mei 2021</small></p>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <img src="assets/img/ribkaelsa.jpeg" class="card-img" alt="...">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="headingThree">
                <h2 class="mb-0">
                  <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Tempat
                  </button>
                </h2>
              </div>
              <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="card-body">
                  <div class="row no-gutters justify-content-center">
                    <div class="col-sm-6">
                      <div class="card mb-3">
                        <img src="assets/img/galeri/default.png" class="card-img-top" alt="/img/icon/profile.jpg" style="max-height: 33rem;">
                        <div class="card-body">
                          <h5 class="card-title">Tangerang</h5>
                          <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta veritatis nesciunt tempore beatae perspiciatis repudiandae dolorum sed, fugiat mollitia nam. Corporis vitae quia impedit dicta fuga! Possimus deserunt dolores rem.</p>
                        </div>
                        <div class="card-footer">
                          <small class="text-muted">JL. Faliman jaya</small>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Akhir tentang -->




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
            "background-color": "transparent"
          });
        }

      })
    })
  </script>
</body>

</html>