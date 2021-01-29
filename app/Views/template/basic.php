<!doctype html>
<html>

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url() ?>/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="<?= base_url() ?>/assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    CRUD PHP
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="<?= base_url() ?>/assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />

  <?= $this->renderSection('pageStyles') ?>
</head>

<body>
  <?= $this->renderSection('content') ?>


  <!--   Core JS Files   -->
  <script src="<?= base_url() ?>/assets/js/core/jquery.min.js"></script>
  <script src="<?= base_url() ?>/assets/js/core/popper.min.js"></script>
  <script src="<?= base_url() ?>/assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="<?= base_url() ?>/assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDAfbHHiFrWsj1H4SHlZSC7Zqe-Jg_Ntrc"></script>
  <!-- Chartist JS -->
  <script src="<?= base_url() ?>/assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="<?= base_url() ?>/assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?= base_url() ?>/assets/js/material-dashboard.js?v=2.1.2" type="text/javascript"></script>

  <?= $this->renderSection('pageScripts') ?>
</body>

</html>