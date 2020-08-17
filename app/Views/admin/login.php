<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Can Beauty Administrator - Login</title>

  <!-- Custom fonts for this template-->
  <link href="<?= base_url(); ?>/asset_admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href=" <?= base_url(); ?>/asset_admin/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-warning">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-8 col-lg-8 col-md-8">
        <br><br>
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-left">
                    <h1 class="h4 text-gray-900 mb-2" style="font-weight: 700;">Login Administrator</h1>
                    <p class="h6 text-gray-900 mb-2">Login untuk masuk menjadi administrator!</p>
                  </div>

                  <!-- Divider -->
                  <hr class="sidebar-divider">
                  <?php if (!empty(session()->getFlashdata('failed'))) : ?>
                    <div class="alert alert-danger" role="alert">
                      <?= session()->getFlashdata('failed'); ?>
                    </div>
                  <?php endif; ?>
                  <br>

                  <form action="users/login" method="POST">
                    <div class="form-group row">
                      <label for="email" class="col-sm-2 col-form-label" style=" font-weight: 700;">Email</label>
                      <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" name="email" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="password" class="col-sm-2 col-form-label" style="font-weight: 700;">Password</label>
                      <div class="col-sm-10">
                        <input type="password" class="form-control" id="password" name="password" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-12 mt-3">
                        <button type="submit" class="btn btn-warning btn-user btn-block col-lg-3 float-right">Log In</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src=" <?= base_url(); ?>/asset_admin/vendor/jquery/jquery.min.js"></script>
  <script src=" <?= base_url(); ?>/asset_admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src=" <?= base_url(); ?>/asset_admin/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src=" <?= base_url(); ?>/asset_admin/js/sb-admin-2.min.js"></script>

</body>

</html>