<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>FINANCE STAR</title>

  <!-- Custom fonts for this template-->
  <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Poppins:200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/'); ?>css/sweetalert.css" rel="stylesheet">
  <link href="<?= base_url('assets/'); ?>datatables/datatables.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/datepicker/css/bootstrap-datepicker.min.css'); ?>">
  <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
  <!-- css buatan  -->
  <link href="<?= base_url('assets/'); ?>css/custom_header.css" rel="stylesheet">
  <!-- css buatan  -->
  

  <style>

  /* Taruh kodingan CSS Disini hanya jika di custom_header.css tidak bisa work */
    
  </style>

  <?php

  if (count(@$load ? $load : []) > 0) {
    foreach ($load as $file) {
      echo "<script src='" . base_url('assets/js/' . $file) . "'></script>";
    }
  }

  ?>

  <script>
    var baseUrl = "<?= base_url() ?>";

    function base_url(uri){
      return baseUrl+uri;
    }
  </script>

</head>

<body id="page-top" style="background: #E5E5E5;font-family: Poppins;font-style: normal;font-weight: normal;color:black;">