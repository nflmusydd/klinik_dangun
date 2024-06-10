<div class="page-section">
    <div class="container">
      <h1 class="text-center mb-5 wow fadeInUp">Dokter Kami</h1>

      <div class="owl-carousel wow fadeInUp" id="doctorSlideshow">

      <?php $__currentLoopData = $dokter; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dokters): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="item">
          <div class="card-doctor">
            <div class="header">
              <img height = "230px" src="doctorimage/<?php echo e($dokters->foto_dokter); ?>" alt="">
              <div class="meta">
                <a href="#"><span class="mai-call"></span></a>
                <a href="#"><span class="mai-logo-whatsapp"></span></a>
              </div>
            </div>
            <div class="body">
              <p class="text-xl mb-0"><?php echo e($dokters->nama_dokter); ?></p>
              <span class="text-sm text-grey">Dokter <?php echo e($dokters->spesialisasi); ?></span>
            </div>
          </div>
        </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
      </div>


    </div>
  </div><?php /**PATH D:\apps\xampp\htdocs\finpro_klinik\resources\views/user/doctor.blade.php ENDPATH**/ ?>