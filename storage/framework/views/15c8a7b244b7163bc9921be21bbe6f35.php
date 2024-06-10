

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
        .btn-danger, .btn-success, .btn-primary{
            font-size: 12px;
            cursor: pointer;
            border-radius: 3px;
            width: auto;
            height: auto;
        }
        .scrollable-container {
            overflow-x: auto;
            width: 100%;
            white-space: nowrap; /* Prevents content from wrapping */
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
      <div class="scrollable-container">
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

                <table class="table">
                    <thead>
                        <tr>
                            <th scope = "col">ID Antrian</th>
                            <th scope = "col">Jenis Konsultasi</th>
                            <th scope = "col">Dokter</th>
                            <th scope = "col">Tanggal</th>
                            <th scope = "col">Waktu</th>
                            <th scope = "col">Ruang</th>
                            <th scope = "col">Status Booking</th>
                            <th scope = "col" style="text-align: center;">Kelola</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $konsultasi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $konsultasis): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($konsultasis->status != 'Dipesan'): ?>
                            <tr>
                                <th scope="row"> <?php echo e($konsultasis->id_antrian); ?></td>
                                <td><?php echo e($konsultasis->nama_konsultasi); ?></td>
                                <td><?php echo e($konsultasis->nama_dokter); ?></td>
                                <td><?php echo e($konsultasis->tanggal); ?></td>
                                <td><?php echo e($konsultasis->waktu); ?></td>
                                <td><?php echo e($konsultasis->ruangan); ?></td>
                                <td><?php echo e($konsultasis->status); ?></td>
                                
                                <td>
                                    
                                    
                                    
                                    <form action="<?php echo e(route('editdata_konsultasi')); ?>" style="display: inline-block;" method="POST">
                                        <?php echo csrf_field(); ?>                                        
                                        <div style="padding:5px;">
                                            <input type="number" name="idkonsultasi" value="<?php echo e($konsultasis->id); ?>" style="display:none">
                                            <input type="submit" value="Edit" class="btn btn-primary">
                                        </div>
                                    </form>

                                    <form action="<?php echo e(route('hapus_konsultasi', ['id' => $konsultasis->id])); ?>" style="display: inline-block;" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <div style="padding:5px;">
                                            <input type="number" name="idkonsultasi" value="<?php echo e($konsultasis->id); ?>" style="display:none">
                                            <input type="submit" value="Hapus" class="btn btn-danger">
                                        </div>

                                    </form>
                                    
                                </td>
                                
                                
                                
                            </tr>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>

                
            </div>
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
</html><?php /**PATH D:\apps\xampp\htdocs\finpro_klinik\resources\views/admin/edit_konsultasi.blade.php ENDPATH**/ ?>