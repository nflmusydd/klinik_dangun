<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo $__env->make('user.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>
<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>

  <header>
    <div class="topbar">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 text-sm">
            <div class="site-info">
              <a href="#"><span class="mai-call text-primary"></span> +00 123 4455 6666</a>
              <span class="divider">|</span>
              <a href="#"><span class="mai-mail text-primary"></span> mail@example.com</a>
            </div>
          </div>
          <div class="col-sm-4 text-right text-sm">
            <div class="social-mini-button">
              <a href="#"><span class="mai-logo-facebook-f"></span></a>
              <a href="#"><span class="mai-logo-twitter"></span></a>
              <a href="#"><span class="mai-logo-dribbble"></span></a>
              <a href="#"><span class="mai-logo-instagram"></span></a>
            </div>
          </div>
        </div> <!-- .row -->
      </div> <!-- .container -->
    </div> <!-- .topbar -->

    <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
      <div class="container">
        <a class="navbar-brand" href="#"><span class="text-primary">Klinik</span>-Dangun</a>

        <form action="#">
          <div class="input-group input-navbar">
            <div class="input-group-prepend">
              <span class="input-group-text" id="icon-addon1"><span class="mai-search"></span></span>
            </div>
            <input type="text" class="form-control" placeholder="Enter keyword.." aria-label="Username" aria-describedby="icon-addon1">
          </div>
        </form>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport" aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupport">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="/home">Beranda</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="/list_konsultasi">Konsultasi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/riwayat">Riwayat</a>
              </li>
            <li class="nav-item">
              <a class="nav-link" href="about.html">Tentang Kami</a>
            </li>
            
           

            <?php if(Route::has('login')): ?>
            <?php if(auth()->guard()->check()): ?>
                
            
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <?php echo e(Auth::user()->name); ?>

                </a>
                <div class="dropdown-menu" aria-labelledby="profileDropdown">
                  <a class="dropdown-item" href="<?php echo e(route('profile.edit')); ?>">Manage Profile</a>
                  <form method="POST" action="<?php echo e(route('logout')); ?>">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="dropdown-item">Logout</button>
                  </form>
                </div>
              </li>
            
            
            <?php else: ?>
            <li class="nav-item">
              <a class="btn btn-primary ml-lg-3" href="<?php echo e(route('login')); ?>">Login</a>
            </li>

            <li class="nav-item">
                <a class="btn btn-primary ml-lg-3" href="<?php echo e(route('register')); ?>">Register</a>
              </li>

            <?php endif; ?>
            <?php endif; ?>

          </ul>
        </div> <!-- .navbar-collapse -->
      </div> <!-- .container -->
    </nav>
  </header>
  
  <div class="page-section">
    <div class="container">
      <h1 class="text-center wow fadeInUp">Pesan Konsultasi</h1>

      <form class="main-form" method="POST" action = "<?php echo e(route('memproses_konsultasi')); ?>">

        <?php echo csrf_field(); ?>

        <div class="row mt-5 ">
            
                <input type="text" name="idpasien" value="<?php echo e(Auth::user()->id); ?>" class="form-control" style="display:none">
                <input type="text" name="idantriasli" value="<?php echo e($antrian->id); ?>" class="form-control" style="display:none">
              
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
            Pasien <input type="text" name="pasien" value="<?php echo e(Auth::user()->name); ?>" class="form-control" readonly>
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight">
            ID Antrian <input type="text" name="antri" value="<?php echo e($antrian->id_antrian); ?>" class="form-control" readonly>
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
            Dokter <input type="text" name="dok" value="<?php echo e($antrian->nama_dokter); ?>" class="form-control" readonly>
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight">
            Kategori Pelayanan <input name="kategori" type="text" value="<?php echo e($antrian->nama_konsultasi); ?>" class="form-control" readonly>
          </div>
          <div class="col-12 col-sm-4 py-2 wow fadeInLeft" data-wow-delay="300ms">
            Tanggal <input type="date" name="tgl" value="<?php echo e($antrian->tanggal); ?>" class="form-control" readonly>
          </div>
          <div class="col-12 col-sm-4 py-2 wow fadeInUp" data-wow-delay="300ms">
            Waktu <input type="time" name="wkt" value="<?php echo e($antrian->waktu); ?>" class="form-control" readonly>
          </div>
          <div class="col-12 col-sm-4 py-2 wow fadeInRight" data-wow-delay="300ms">
            Ruang <input type="text" name="room" value="<?php echo e($antrian->ruangan); ?>" class="form-control" placeholder="Number.." readonly>
          </div>
          
        </div>

        <button type="submit" class="btn btn-primary mt-5 wow zoomIn">Ajukan Konsultasi</button>
      </form>
    </div>
  </div> <!-- .page-section -->

  <div class="container-lg" style="margin: 0 auto;">
    
  </div>


<script src="../assets/js/jquery-3.5.1.min.js"></script>

<script src="../assets/js/bootstrap.bundle.min.js"></script>

<script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

<script src="../assets/vendor/wow/wow.min.js"></script>

<script src="../assets/js/theme.js"></script>
  
</body>
</html><?php /**PATH D:\apps\xampp\htdocs\finpro_klinik\resources\views/user/pesan_konsultasi.blade.php ENDPATH**/ ?>