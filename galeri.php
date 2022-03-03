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
      <h1 class="display-6">Galeri</h1>
      <hr>
    </div>
  </div>

  <!-- Galeri -->
  <section class="galleryUtama" style="min-height: 400px;">
    <div class="container">
      <!-- <div class="row text-center">
        <div class="col mt-5">
          <h3>Melihat Bagaimana Pelayanan Kami</h3>

        </div>
      </div> -->
      <div class="row pt-5 mt-5">
        <?php
        // fungsi query untuk menampilkan data dari tabel paket
        $query = mysqli_query($mysqli, "SELECT * FROM galeri")
          or die('Ada kesalahan pada query tampil data galeri: ' . mysqli_error($mysqli));
        while ($data = mysqli_fetch_assoc($query)) :   ?>
          <div class="galleryItem col-6 col-md-4 col-lg-3 my">
            <img src="assets/img/galeri/<?php echo $data['foto_galeri']; ?>" class="gallery-img img-thumbnail" data-text="<?php echo $data['judul_galeri']; ?>">
          </div>
        <?php endwhile; ?>
        <div class="galleryShadow"></div>
        <div class="galleryModal">
          <i class="fas fa-window-close galleryIcon gIquit close"></i> <i class="fas fa-chevron-left galleryIcon gIleft nav-left"></i> <i class="fas fa-chevron-right galleryIcon gIright nav-right"></i>
          <div class="galleryContainer">
            <img src="">
          </div>
        </div>
      </div>
  </section>
  <!-- Akhir galeri -->



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
  <script>
    // Galeri Index
    $(function() {
      $('.gIquit').click(function() {
        $('.galleryModal').css({
          'transform': 'scale(0)'
        })
        $('.galleryShadow').css({
          'display': 'none'
        }).fadeOut()
      })
      $('.galleryUtama').on('click', '.galleryItem', function() {
        galleryNavigate($(this), 'opened')
        $('.galleryModal').css({
          'transform': 'scale(1)'
        })
        $('.galleryShadow').css({
          'display': 'block'
        }).fadeIn()
      })
      let galleryNav
      let galleryNew
      let galleryNewImg
      let galleryNewText
      $('.gIleft').click(function() {
        galleryNew = $(galleryNav).prev()
        galleryNavigate(galleryNew, 'last')
      })
      $('.gIright').click(function() {
        galleryNew = $(galleryNav).next()
        galleryNavigate(galleryNew, 'first')
      })

      function galleryNavigate(gData, direction) {
        galleryNewImg = gData.children('img').attr('src')
        if (typeof galleryNewImg !== "undefined") {
          galleryNav = gData
          $('.galleryModal img').attr('src', galleryNewImg)
        } else {
          gData = $('.galleryItem:' + direction)
          galleryNav = gData
          galleryNewImg = gData.children('img').attr('src')
          $('.galleryModal img').attr('src', galleryNewImg)
        }
        galleryNewText = gData.children('img').attr('data-text')
        if (typeof galleryNewText !== "undefined") {
          $('.galleryModal .galleryContainer .galleryText').remove()
          $('.galleryModal .galleryContainer').append('<div class="galleryText">' + galleryNewText + '</div>')
        } else {
          $('.galleryModal .galleryContainer .galleryText').remove()
        }
      }
    })
  </script>
</body>

</html>