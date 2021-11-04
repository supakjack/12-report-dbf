<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="apple-touch-icon" sizes="76x76" href="<?= $base_url ?>templates/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="https://raw.githubusercontent.com/supakjack/check-3-files/main/frontend/src/assets/hh-logo.jpeg">

  <title>
    12 แฟ้มประมวลผล .DBF
  </title>

  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />

  <!-- Nucleo Icons -->
  <link href="<?= $base_url ?>templates/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="<?= $base_url ?>templates/assets/css/nucleo-svg.css" rel="stylesheet" />

  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

  <!-- CSS Files -->
  <link id="pagestyle" href="<?= $base_url ?>templates/assets/css/material-kit.css?v=3.0.0" rel="stylesheet" />
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  
</head>

<body class="index-page bg-gray-200">

  <!-- Header -->
  <?= $this->load->view('templates/header', [], true) ?>

  <div class="card card-body blur shadow-blur mx-3 mx-md-4 mt-n6">

    <?= $this->load->view($body, [], true) ?>

  </div>

  <!--   Core JS Files   -->
  <script src="<?= $base_url ?>templates/assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="<?= $base_url ?>templates/assets/js/core/bootstrap.min.js" type="text/javascript"></script>
  <script src="<?= $base_url ?>templates/assets/js/plugins/perfect-scrollbar.min.js"></script>
  <!--  Plugin for TypedJS, full documentation here: https://github.com/inorganik/CountUp.js -->
  <script src="<?= $base_url ?>templates/assets/js/plugins/countup.min.js"></script>
  <script src="<?= $base_url ?>templates/assets/js/plugins/choices.min.js"></script>
  <script src="<?= $base_url ?>templates/assets/js/plugins/prism.min.js"></script>
  <script src="<?= $base_url ?>templates/assets/js/plugins/highlight.min.js"></script>
  <!--  Plugin for Parallax, full documentation here: https://github.com/dixonandmoe/rellax -->
  <script src="<?= $base_url ?>templates/assets/js/plugins/rellax.min.js"></script>
  <!--  Plugin for TiltJS, full documentation here: https://gijsroge.github.io/tilt.js/ -->
  <script src="<?= $base_url ?>templates/assets/js/plugins/tilt.min.js"></script>
  <!--  Plugin for Parallax, full documentation here: https://github.com/wagerfield/parallax  -->
  <script src="<?= $base_url ?>templates/assets/js/plugins/parallax.min.js"></script>
  <!-- Control Center for Material UI Kit: parallax effects, scripts for the example pages etc -->
  <script src="<?= $base_url ?>templates/assets/js/material-kit.min.js?v=3.0.0" type="text/javascript"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
  
</body>

</html>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Prompt&display=swap');

  * {
    font-family: 'Prompt', sans-serif;
  }
  
</style>