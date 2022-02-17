




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
 <div class="container" style="margin-top:5%;margin-bottom:5%;">
        <h2 class="text-center" style="color:#656565;">DETAIL PESANAN</h2>
        <hr class="my-4" style="width:100px;background-color:#656565;height:1px;">

        <?php foreach($user as $u){  ?>
        <form method="post" action="<?= site_url('Front/tambahPemesanan')?>" style="margin-top:5%;">
            <div class="form col-md-4">
                <div class="form-group">
                    <input type="hidden" class="form-control" name="id_user" value="<?= $u->id?>">
                    <label>NAMA BARANG</label>
                    <select name="barang" class="form-control">
                        <option selected disabled>Pilih Barang</option>
                        <?php foreach($barang as $b){ ?>
                        <option><?= $b->nama_barang ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>KUANTITAS</label>
                    <input type="number" class="form-control" name="kuantitas" required>
                </div>
            </div>
            <button type="submit" class="btn btnSubmit" name="submit">Tambah Barang</button>

        </form>
        <?php } ?>
        <div class="section" style="margin-top:5%">
            <?php if($listCount > 0){ ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">NO</th>
                        <th scope="col">NAMA BARANG</th>
                        <th scope="col">HARGA BARANG</th>
                        <th scope="col">KUANTITAS</th>
                        <th scope="col">TOTAL HARGA</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1; foreach($list as $l){ ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $l->nama_barang; ?></td>
                        <td><?= $l->harga; ?></td>
                        <td><?= $l->kuantitas; ?></td>
                        <td><?= $l->total_harga; ?></td>
                    </tr>
                    <?php $i++;} ?>
                </tbody>
            </table>
            <form method="post" action="<?= site_url('Front/updateStatus')?>" style="margin-top:5%;">
                <input type="hidden" class="form-control" name="id_user" value="<?= $u->id?>">
                <input type="hidden" class="form-control" name="nama" value="<?= $u->nama?>">
                <input type="hidden" class="form-control" name="tgl_pesan" value="<?= $u->tgl_pesan?>">
                <button type="submit" class="btn btnSubmit" name="submit">SUBMIT</button>
            </form>
            <?php }else{ ?>
            <h2 class="text-center" style="margin-top:10%;margin-bottom:10%;"> BARANG BELUM DIPESAN </h2>
            <?php } ?>
        </div>
    </div>

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
        .btnReset {
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
            background-color: white;
            color: #41228e;
            font-weight: 900;
        }

        .btnReset:hover {
            background-color: #41228e;
            color: white;
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
