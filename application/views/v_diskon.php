

<!DOCTYPE html>
<html lang="zxx">

<head>
  <meta charset="utf-8">
  <title>Kross</title>

  <!-- mobile responsive meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  
  <!-- ** Plugins Needed for the Project ** -->
  <!-- Bootstrap -->
  <link rel="stylesheet" href="<?=base_url('lib/plugins/bootstrap/bootstrap.min.css')?>">
  <!-- slick slider -->
  <link rel="stylesheet" href="<?=base_url('lib/plugins/slick/slick.css')?>">
  <!-- themefy-icon -->
  <link rel="stylesheet" href="<?=base_url('lib/plugins/themify-icons/themify-icons.css')?>">

  <!-- Main Stylesheet -->
  <link href="<?=base_url('lib/css/style.css')?>" rel="stylesheet">
  
  <!--Favicon-->
  <link rel="shortcut icon" href="<?=base_url('lib/images/favicon.ico')?>" type="image/x-icon">
  <link rel="icon" href="<?=base_url('lib/images/favicon.ico')?>" type="image/x-icon">

</head>

<body>
  

<header class="navigation fixed-top">
  <nav class="navbar navbar-expand-lg navbar-dark">
    <a class="navbar-brand font-tertiary h3" href="index.html"><img src="<?=base_url('lib/images/logo.png')?>" alt="Myself"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
      aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse text-center" id="navigation">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="<?= base_url('Front')?>">Front Office</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('Gudang')?>">Gudang</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('Transaksi')?>">Transaksi</a>
        </li>
    </div>
  </nav>
</header>

<!-- hero area -->
<section class="hero-area bg-primary" id="parallax">
  <div class="container">
    <div class="row">
      <div class="col-lg-11 mx-auto">
        <h1 class="text-white font-tertiary">Hi! I’m <br> Azis Faisal Muharam <br> ILKOM UPI</h1>
      </div>
    </div>
  </div>
  <div class="layer-bg w-100">
    <img class="img-fluid w-100" src="<?=base_url('lib/images/illustrations/leaf-bg.png')?>" alt="bg-shape">
  </div>
  <div class="layer" id="l2">
    <img src="<?=base_url('lib/images/illustrations/dots-cyan.png')?>" alt="bg-shape">
  </div>
  <div class="layer" id="l3">
    <img src="<?=base_url('lib/images/illustrations/leaf-orange.png')?>" alt="bg-shape">
  </div>
  <div class="layer" id="l4">
    <img src="<?=base_url('lib/images/illustrations/dots-orange.png')?>" alt="bg-shape">
  </div>
  <div class="layer" id="l5">
    <img src="<?=base_url('lib/images/illustrations/leaf-yellow.png')?>" alt="bg-shape">
  </div>
  <div class="layer" id="l6">
    <img src="<?=base_url('lib/images/illustrations/leaf-cyan.png')?>" alt="bg-shape">
  </div>
  <div class="layer" id="l7">
    <img src="<?=base_url('lib/images/illustrations/dots-group-orange.png')?>" alt="bg-shape">
  </div>
  <div class="layer" id="l8">
    <img src="<?=base_url('lib/images/illustrations/leaf-pink-round.png')?>" alt="bg-shape">
  </div>
  <div class="layer" id="l9">
    <img src="<?=base_url('lib/images/illustrations/leaf-cyan-2.png')?>" alt="bg-shape">
  </div>
  <!-- social icon -->
  <ul class="list-unstyled ml-5 mt-3 position-relative zindex-1">
    <li class="mb-3"><a class="text-white" href="#"><i class="ti-facebook"></i></a></li>
    <li class="mb-3"><a class="text-white" href="#"><i class="ti-instagram"></i></a></li>
    <li class="mb-3"><a class="text-white" href="#"><i class="ti-dribbble"></i></a></li>
    <li class="mb-3"><a class="text-white" href="#"><i class="ti-twitter"></i></a></li>
  </ul>
  <!-- /social icon -->
</section>
<!-- /hero area -->

<!-- about -->
<section class="section">
 <form method="post" action="<?= base_url('Transaksi/tambahDiskon')?>" class="form col-md-6 offset-3">
                        <div class="form-group">
                            <label>NAMA BARANG</label>
                            <select name="barang" class="form-control">
                                <option selected disabled>Pilih Barang</option>
                                <?php foreach($barang as $b){ ?>
                                <option><?= $b->nama_barang ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Diskon</label>
                            <input type="text" class="form-control" name="diskon" required>
                        </div>                
                        <button type="submit" class="btn btnSubmit" name="submit">Submit</button>
                </form>
</section>
<!-- /about -->

<!-- footer -->
<footer class="bg-dark footer-section">
  <div class="section">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <h5 class="text-light">Email</h5>
          <p class="text-white paragraph-lg font-secondary">steve.fruits@email.com</p>
        </div>
        <div class="col-md-4">
          <h5 class="text-light">Phone</h5>
          <p class="text-white paragraph-lg font-secondary">+880 2544 658 256</p>
        </div>
        <div class="col-md-4">
          <h5 class="text-light">Address</h5>
          <p class="text-white paragraph-lg font-secondary">125/A, CA Commercial Area, California, USA</p>
        </div>
      </div>
    </div>
  </div>
  <div class="border-top text-center border-dark py-5">
    <p class="mb-0 text-light">Copyright ©<script>
        var CurrentYear = new Date().getFullYear()
        document.write(CurrentYear)
      </script> a theme by <a href="https://themefisher.com">themefisher.com</a></p>
  </div>
</footer>
<!-- /footer -->

 <style>
        .btnSubmit {
            margin-bottom: 10px;
            font-family: 'Segoe ui light';
            text-transform: uppercase;
            letter-spacing: 1px;
            text-align: center;
            line-height: 1;
            padding: 10px;
            cursor: pointer;
            -webkit-appearance: none;
            transition: background-color 0.25s ease-out, color 0.25s ease-out;
            border: 1px solid transparent;
            border-radius: 0;
            font-size: 1.2rem;
            border: 3px solid #41228e;
            color: white;
            font-weight: 900;
            background-color: #41228e;
        }

        .btnSubmit:hover {
            background-color: white;
            color: #41228e;
        }
</style>

<!-- jQuery -->
<script src="<?=base_url('lib/plugins/jQuery/jquery.min.js')?>"></script>
<!-- Bootstrap JS -->
<script src="<?=base_url('lib/plugins/bootstrap/bootstrap.min.js')?>"></script>
<!-- slick slider -->
<script src="<?=base_url('lib/plugins/slick/slick.min.js')?>"></script>
<!-- filter -->
<script src="<?=base_url('lib/plugins/shuffle/shuffle.min.js')?>"></script>

<!-- Main Script -->
<script src="<?=base_url('lib/js/script.js')?>"></script>

</body>
</html>
