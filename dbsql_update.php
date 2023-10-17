<?php
    $servername = "prognet.localnet";
    $username = "2205551009";
    $password = "2205551009";
    $dbname = "db_2205551009";

    // membentuk koneksi ke database mysql
    $conn = new mysqli($servername, $username, $password, $dbname);

    if(isset($_POST['update'])){
        //mengambil data dari form//
        $NIM=$_POST['nim'];
        $Nama_Lengkap=$_POST['fullname'];
        $Nama_Panggilan=$_POST['nickname'];
        $Tanggal_Lahir=$_POST['tgllahir'];
        $Email=$_POST['email'];
        $Angkatan=$_POST['angkatan'];
        $Program_Studi=$_POST['prodi'];
        $Jenis_Kelamin=$_POST['jeniskelamin'];
        $Hobi=$_POST['hobi'];

    // proses update
    $sql = "UPDATE tb_biodatamhs SET
            nim ='$NIM',fullname ='$Nama_Lengkap',nickname ='$Nama_Panggilan',tanggallahir ='$Tanggal_Lahir',email ='$Email', angkatan ='$Angkatan',program_studi ='$Program_Studi',jenis_kelamin ='$Jenis_Kelamin',hobi ='$Hobi'
            WHERE nim ='$NIM'";
    if ($conn->query($sql) === TRUE) {
        header("Location:dbsql_select.php");
        }
    }

    $idtoupdate=$_GET['nim'];

    $sql = "SELECT * FROM tb_biodatamhs WHERE nim='$idtoupdate'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Tugas Prognet - Nadila</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Kelly - v4.10.0
  * Template URL: https://bootstrapmade.com/kelly-free-bootstrap-cv-resume-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container-fluid d-flex justify-content-between align-items-center">

      <h1 class="logo me-auto me-lg-0"><a href="index.html">Prognet.</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a href="index.html">Home</a></li>
          <li><a href="about.html">About Me</a></li>
          <li><a class="active" href="tugasprognet.html">Tugas Prognet</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <div class="header-social-links">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>

    </div>

  </header><!-- End Header -->

  <main id="main"><!-- Start main -->

  <section id="form" class="form-mf sect-pt4 route">
    <div class="container mt-4">
      <h1 class="text-center mb-2">Form Biodata Mahasiswa</h1>
        <form name="formBiodata" action="dbsql_insert.php" method="post" onsubmit="return validateForm()">
        <div class="form-group mb-3">
            <label><strong>NIM :</strong></label>
            <input type="text" name="nim" id="nim" placeholder="NIM" class="form-control">
        </div>
        <div class="form-group mb-3">
            <label><strong>Nama Lengkap :</strong></label>
            <input type="text" name="fullname" id="fullname" placeholder="Nama Lengkap" class="form-control">
        </div>
        <div class="form-group mb-3">
            <label><strong>Nama Panggilan :</strong></label>
            <input type="text" name="nickname" id="nickname" placeholder="Nama Panggilan" class="form-control">
        </div>
        <div class="form-group mb-3">
            <label><strong>Tanggal Lahir :</strong></label>
            <input type="date" name="tgllahir" id="tgllahir" class="form-control" placeholder="Tanggal Lahir">
        </div>
        <div class="form-group mb-3">
            <label><strong>Email :</strong></label>
            <input type="email" name="email" id="email" placeholder="name@example.com" class="form-control">
        </div>
        <div class="form-group mb-3">
            <label><strong>Angkatan :</strong></label>
            <select name="prodi" id="prodi" class="form-control">
              <option selected>Pilih Angkatan</option>
              <option value="Angkatan 19">Angkatan 19</option>
              <option value="Angkatan 20">Angkatan 20</option>
              <option value="Angkatan 21">Angkatan 21</option>
              <option value="Angkatan 22">Angkatan 22</option>
              <option value="Angkatan 23">Angkatan 23</option>
            </select>
        </div>
        <div class="form-group mb-3">
            <label><strong>Program Studi:</strong></label>
            <select name="prodi" id="prodi" class="form-control">
              <option selected>Pilih Program Studi</option>
              <option value="S1 Arsitektur">S1 Arsitektur</option>
              <option value="S1 Teknik Sipil">S1 Teknik Sipil</option>
              <option value="S1 Teknik Mesin">S1 Teknik Mesin</option>
              <option value="S1 Teknik Elektro">S1 Teknik Elektro</option>
              <option value="S1 Teknologi Informasi">S1 Teknologi Informasi</option>
              <option value="S1 Teknik Industri">S1 Teknik Industri</option>
              <option value="S1 Teknik Lingkungan">S1 Teknik Lingkungan</option>
            </select>
        </div>
        <div>
            <label"><strong>Jenis Kelamin :</strong></label>
            <p><input class="me-1" type='radio' name='jeniskelamin' id="jeniskelamin" value='Laki - Laki'>Laki - Laki</p>
            <p><input class="me-1" type='radio' name='jeniskelamin' id="jeniskelamin" value='Perempuan'>Perempuan</p>
        </div>
          <div class="form-group mb-3">
            <label><strong>Hobi :</strong></label>
            <input type="text" name="hobi" id="hobi" class="form-control" placeholder="Hobi">
          </div>
          <div>
            <button type="submit" name="submit" class="btn btn-primary mb-4">Submit</button>
          </div>
        </form>
      </div>
    <script>
      function validateForm() {
        // Validasi NIM
        if (document.forms["formBiodata"]["nim"].value == "") {
            alert("Masukkan NIM Anda");
            document.forms["formBiodata"]["nim"].focus();
            return false;
        }
        // Validasi Nama Lengkap
        if (document.forms["formBiodata"]["fullname"].value == "") {
            alert("Masukkan Nama Lengkap Anda");
            document.forms["formBiodata"]["fullname"].focus();
            return false;
        }
         // Validasi Nama Panggilan
         if (document.forms["formBiodata"]["nickname"].value == "") {
            alert("Masukkan Nama Panggilan Anda");
            document.forms["formBiodata"]["nickname"].focus();
            return false;
        }
        // Validasi Tanggal Lahir
        if (document.forms["formBiodata"]["tgllahir"].value == "") {
            alert("Masukkan Tanggal Lahir Anda");
            document.forms["formBiodata"]["tgllahir"].focus();
            return false;
        }
        // Validasi E-mail
        if (document.forms["formBiodata"]["email"].value == "") {
            alert("Masukkan E-mail Aktif Anda");
            document.forms["formBiodata"]["email"].focus();
            return false;
        }
        // Validasi Angkatan
        if (document.forms["formBiodata"]["angkatan"].selectedIndex < 1) {
            alert("Pilih Jurusan Anda");
            document.forms["formBiodata"]["angkatan"].focus();
            return false;
        }
        // Validasi Program Studi
        if (document.forms["formBiodata"]["prodi"].selectedIndex < 1) {
            alert("Pilih Jurusan Anda");
            document.forms["formBiodata"]["prodi"].focus();
            return false;
        }
        // Validasi Jenis Kelamin
        var jeniskelamin = document.getElementsByName('jeniskelamin');
        var genValue = false;
          for(var i=0; i<jeniskelamin.length;i++){
            if(jeniskelamin[i].checked == true){
                genValue = true;    
            }
          }
          if(!genValue){
            alert("Pilih Jenis Kelamin Anda");
            return false;
          }
        // Validasi Hobi
        if (document.forms["formBiodata"]["hobi"].value == "") {
            alert("Masukkan Hobi Anda");
            document.forms["formBiodata"]["hobi"].focus();
            return false;
        }
      }
    </script>
  </section>
  <!-- ======= End Form ======= -->

</main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer class="bg-dark">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="copyright-box">
            <p class="copyright">&copy; Copyright <strong>Portofolio</strong>. All Rights Reserved</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- ======= End  Footer ======= -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/typed.js/typed.umd.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
</body>

</html>