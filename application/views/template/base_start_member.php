<!-- base_start.php -->

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo (isset($title) ? 'Ujian Online | ' . $title : 'Ujian Online'); ?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="<?php echo base_url('assets/vendor/font-awesome/css/font-awesome.min.css');?>" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 

    <!-- Plugin CSS -->
    <link href="<?php echo base_url('assets/vendor/magnific-popup/magnific-popup.css');?>" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url('assets/css/creative.min.css');?>" rel="stylesheet">

    <!-- Bootstrap menu -->
			<link rel="stylesheet" href="<?php echo base_url();?>assets/assets/css/bootstrap.css">		
			<link rel="stylesheet" href="<?php echo base_url();?>assets/assets/css/animate.min.css">
			<link rel="stylesheet" href="<?php echo base_url();?>assets/assets/css/owl.carousel.css">
			<link rel="stylesheet" href="<?php echo base_url();?>assets/assets/css/main.css">

    <!-- icon -->
    <link rel="shortcut icon" href="<?php echo base_url('assets/login/ico/favicon.png');?>">

    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/datatable/datatables.min.css">


  </head>

  <body id="page-top">
    <?php $this->load->view('template/headerMember') ?>