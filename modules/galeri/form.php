 <?php
  // fungsi untuk pengecekan tampilan form
  // jika form add data yang dipilih
  if ($_GET['form'] == 'add') { ?>
   <!-- tampilan form add data -->
   <!-- Content Header (Page header) -->
   <section class="content-header">
     <h1>
       <i style="margin-right:7px" class="fa fa-edit"></i> Input Data Galeri
     </h1>
     <ol class="breadcrumb">
       <li><a href="?module=home"><i class="fa fa-home"></i> Beranda </a></li>
       <li><a href="?module=galeri"> galeri </a></li>
       <li class="active"> Tambah </li>
     </ol>
   </section>

   <!-- Main content -->
   <section class="content">
     <div class="row">
       <div class="col-md-12">
         <div class="box box-primary">
           <!-- form start -->
           <form role="form" class="form-horizontal" method="POST" action="modules/galeri/proses.php?act=insert" enctype="multipart/form-data">
             <div class="box-body">
               <div class="form-group">
                 <label class="col-sm-2 control-label">Judul Foto</label>
                 <div class="col-sm-5">
                   <input type="text" class="form-control" name="judul_galeri" autocomplete="off" required>
                 </div>
               </div>
               <div class="form-group">
                 <label class="col-sm-2 control-label">Foto</label>
                 <div class="col-sm-2">
                   <img src="assets/img/galeri/default.png" class="img-thumbnail img-preview">
                 </div>
                 <div class="col-sm-5">
                   <input type="file" class="custom-file-input" name="foto_galeri" onchange="previewImg(this)">
                 </div>
               </div>
             </div><!-- /.box body -->

             <div class="box-footer">
               <div class="form-group">
                 <div class="col-sm-offset-2 col-sm-10">
                   <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                   <a href="?module=galeri" class="btn btn-default btn-reset">Batal</a>
                 </div>
               </div>
             </div><!-- /.box footer -->
           </form>
         </div><!-- /.box -->
       </div>
       <!--/.col -->
     </div> <!-- /.row -->
   </section><!-- /.content -->
 <?php
  }
  // jika form edit data yang dipilih
  // isset : cek data ada / tidak
  elseif ($_GET['form'] == 'edit') {
    if (isset($_GET['id'])) {
      // fungsi query untuk menampilkan data dari tabel galeri
      $query = mysqli_query($mysqli, "SELECT * FROM galeri WHERE id_galeri='$_GET[id]'")
        or die('Ada kesalahan pada query tampil data galeri : ' . mysqli_error($mysqli));
      $data  = mysqli_fetch_assoc($query);
    }
  ?>
   <!-- tampilan form edit data -->
   <!-- Content Header (Page header) -->
   <section class="content-header">
     <h1>
       <i style="margin-right:7px" class="fa fa-edit"></i> Ubah Data Galeri
     </h1>
     <ol class="breadcrumb">
       <li><a href="?module=home"><i class="fa fa-home"></i> Beranda </a></li>
       <li><a href="?module=galeri"> Galeri </a></li>
       <li class="active"> Ubah </li>
     </ol>
   </section>

   <!-- Main content -->
   <section class="content">
     <div class="row">
       <div class="col-md-12">
         <div class="box box-primary">
           <!-- form start -->
           <form role="form" class="form-horizontal" method="POST" action="modules/galeri/proses.php?act=update" enctype="multipart/form-data">
             <div class="box-body">

               <input type="hidden" name="id_galeri" value="<?php echo $data['id_galeri']; ?>">
               <input type="hidden" name="gambar_lama" value="<?php echo $data['foto_galeri']; ?>">
               <div class="form-group">
                 <label class="col-sm-2 control-label">Judul Foto</label>
                 <div class="col-sm-5">
                   <input type="text" class="form-control" name="judul_galeri" autocomplete="off" value="<?php echo $data['judul_galeri']; ?>" required>
                 </div>
               </div>
               <div class="form-group">
                 <label class="col-sm-2 control-label">Foto</label>
                 <div class="col-sm-2">
                   <img src="assets/img/galeri/<?php echo $data['foto_galeri']; ?>" class="img-thumbnail img-preview">
                 </div>
                 <div class="col-sm-5">
                   <input type="file" class="custom-file-input" name="foto_galeri" onchange="previewImg(this)">
                 </div>
               </div>
             </div><!-- /.box body -->

             <div class="box-footer">
               <div class="form-group">
                 <div class="col-sm-offset-1 col-sm-11">
                   <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                   <a href="?module=galeri" class="btn btn-default btn-reset">Batal</a>
                 </div>
               </div>
             </div><!-- /.box footer -->
           </form>
         </div><!-- /.box -->
       </div>
       <!--/.col -->
     </div> <!-- /.row -->
   </section><!-- /.content -->
 <?php
  }
  ?>


 <script>
   function previewImg(input) {
     //  const gambarLabel = input.nextElementSibling;
     const imgPreview = input.parentElement.previousElementSibling.firstElementChild;
     // console.log(gambar);
     //  gambarLabel.textContent = input.files[0].name;

     const fileGambar = new FileReader();
     fileGambar.readAsDataURL(input.files[0]);


     fileGambar.onload = function(e) {
       imgPreview.src = e.target.result;
     }
   }
 </script>