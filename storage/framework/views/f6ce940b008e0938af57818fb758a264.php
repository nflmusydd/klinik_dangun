

<!DOCTYPE html>
<html lang="en">
  <head>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <?php echo $__env->make('admin.css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <style type="text/css">
        label{
            display: inline-block;
            width: 200px;
        }
    </style>

  </head>
  <body>
    <div class="container-scroller">
      <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
          <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
            <div class="ps-lg-1">
              <div class="d-flex align-items-center justify-content-between">
                <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more with this template!</p>
                <a href="https://www.bootstrapdash.com/product/corona-free/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo" target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-between">
              <a href="https://www.bootstrapdash.com/product/corona-free/"><i class="mdi mdi-home me-3 text-white"></i></a>
              <button id="bannerClose" class="btn border-0 p-0">
                <i class="mdi mdi-close text-white me-0"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- partial:partials/_sidebar.html -->
      <?php echo $__env->make('admin.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

      <!-- partial -->
      <?php echo $__env->make('admin.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

      <div class="container-fluid page-body-wrapper">
        <div class="container" align="center" style="padding-top: 100px;">

            <?php if(session()->has('message')): ?>

            <div class="alert alert-success">
            
                <?php echo e(session()->get('message')); ?>

            <button type="button"class="close" data-dismiss="alert">
                x
            </button>

            

            </div>

            <?php endif; ?>

            <form action="<?php echo e(url('upload_konsultasi')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div style="padding:15px;">
                    <label>ID Antrian</label>
                    <input type="text" name="id_antrian" style="color:black;" placeholder="" required="">
                </div>
                
                <div style="padding:15px;">
                    <label>Jenis Konsultasi</label>
                    <select name="nama_konsultasi" style= "color:black; width:200px;" required="">
                        <option>--- Pilih ---</option>
                        <?php $__currentLoopData = $jenis_konsultasi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jenis_konsultasis): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($jenis_konsultasis->nama_konsultasi); ?>"> <?php echo e($jenis_konsultasis->nama_konsultasi); ?> </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </select>
                </div>

                <div style="padding:15px;">
                    <label>Dokter</label>
                    <select name="nama_dokter" style= "color:black; width:200px;" required="">
                        <option>--- Pilih ---</option>
                        <?php $__currentLoopData = $dokter; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dokters): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($dokters->nama_dokter); ?>"> <?php echo e($dokters->spesialisasi); ?> - <?php echo e($dokters->nama_dokter); ?> </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </select>
                </div>

                <div style="padding:15px;">
                    <label>Tanggal</label>
                    <input type="date" name="tanggal" style="color:black; width:200px" placeholder="" required="">
                </div>

                <div style="padding:15px;">
                    <label>Waktu</label>
                    <input type="time" name="waktu" style="color:black; width:200px" placeholder="" required="">
                </div>

                <div style="padding:15px;">
                    <label>No Ruangan</label>
                    <input type="string" name="ruangan" style="color:black; width:200px" placeholder="" required="">
                </div>

                <div style="padding:15px;">
                    <label>Harga (Rp)</label>
                    <input type="number" name="harga" style="color:black; width:200px" placeholder="" required="">
                </div>

                <div style="padding:15px;">
                    <input type="submit" class="btn btn-success">
                </div>

            </form>
        </div>
      </div>


        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <?php echo $__env->make('admin.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  </body>
</html><?php /**PATH D:\apps\xampp\htdocs\finpro_klinik\resources\views/admin/add_konsultasi.blade.php ENDPATH**/ ?>