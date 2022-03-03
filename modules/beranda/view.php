  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-home icon-title"></i> Beranda
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda</a></li>
    </ol>
  </section>

  <!-- Main content -->
  <?php
  // echo "<pre>";
  // var_dump($bulan_ini);
  // echo "</pre>";

  // fungsi query untuk menampilkan data dari tabel transaksi
  $query1 = mysqli_query($mysqli, "SELECT * FROM transaksi as a INNER JOIN paket as b ON a.paket=b.id_paket")
    or die('Ada kesalahan pada query tampil data transaksi: ' . mysqli_error($mysqli));
  $jumlah_transaksi  = mysqli_num_rows($query1);
  $total_transaksi = 0;
  // tampilkan data
  while ($data = mysqli_fetch_assoc($query1)) {
    $jumlah = $data['harga'];
    $total_transaksi += $jumlah;
  }

  // fungsi query untuk menampilkan data dari tabel transaksi bulan ini
  $hari_ini = date("Y-m-d");
  $explode   = explode('-', $hari_ini);
  $bulan_ini = $explode[0] . "-" . $explode[1];
  $query2 = mysqli_query($mysqli, "SELECT * FROM transaksi as a INNER JOIN paket as b ON a.paket=b.id_paket WHERE tanggal LIKE '%$bulan_ini%'")
    or die('Ada kesalahan pada query tampil data transaksi: ' . mysqli_error($mysqli));
  $jumlah_transaksi_bulan_ini  = mysqli_num_rows($query2);
  $total_transaksi_bulan_ini = 0;
  while ($data = mysqli_fetch_assoc($query2)) {
    $jumlah = $data['harga'];
    $total_transaksi_bulan_ini += $jumlah;
  }

  $query3 = mysqli_query($mysqli, "SELECT * FROM users")
    or die('Ada kesalahan pada query tampil data users: ' . mysqli_error($mysqli));
  $jumlah_user  = mysqli_num_rows($query3);


  ?>
  <section class="content">
    <div class="row">
      <div class="col-lg-12 col-xs-12">
        <div class="alert alert-info alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <p style="font-size:15px">
            <i class="icon fa fa-user"></i> Selamat datang <strong><?php echo $_SESSION['nama_user']; ?></strong> di Aplikasi Steam Mobil dan Motor.
          </p>
        </div>
      </div>
    </div>
    <br><br>
    <div class="row">
      <div class="col-6 col-sm-6 col-lg-4">
        <div class="info-box">
          <span class="info-box-icon bg-grey"><i class="fa fa-check-square"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Jumlah Transaksi</span>
            <span class="info-box-number"><?= $jumlah_transaksi; ?></span>
          </div>
        </div><!-- /.info-box -->
      </div>
      <div class="col-6 col-sm-6 col-lg-4">
        <div class="info-box">
          <span class="info-box-icon bg-green"><i class="fa fa-money"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Total transaksi</span>
            <span class="info-box-number">Rp. <?= format_rupiah($total_transaksi) ?></span>
          </div>
        </div><!-- /.info-box -->
      </div>
      <div class="col-6 col-sm-6 col-lg-4">
        <div class="info-box">
          <span class="info-box-icon bg-red"><i class="fa fa-user"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Pengguna</span>
            <span class="info-box-number"><?= $jumlah_user; ?></span>
          </div>
        </div><!-- /.info-box -->
      </div>
      <div class="col-6 col-sm-6 col-lg-4">
        <div class="info-box">
          <span class="info-box-icon bg-yellow"><i class="fa fa-check-circle"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Jumlah transaksi bulan ini</span>
            <span class="info-box-number"><?= $jumlah_transaksi_bulan_ini; ?></span>
          </div>
        </div><!-- /.info-box -->
      </div>
      <div class="col-6 col-sm-6 col-lg-4">
        <div class="info-box">
          <span class="info-box-icon bg-green"><i class="fa fa-money"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Penghasilan bulan ini</span>
            <span class="info-box-number">Rp. <?= format_rupiah($total_transaksi_bulan_ini) ?></span>
          </div>
        </div><!-- /.info-box -->
      </div>
    </div>
  </section><!-- /.content -->