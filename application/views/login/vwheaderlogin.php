<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html id="identified" lang="en" style="background-color:black ;">
<style>
  * {
    margin: 0%;
    padding: 0%;

 
  }


  #identified {
    width: 100%;
    height: 100%;
    color: #fff;
    background: linear-gradient(100deg,brown, gray, black,purple);
    background-size: 200% 200%;
    position: relative;
    animation: cambiar 10s ease-in-out infinite;
  }
  
  #identified1 {
    
    border-radius: 10px;
    width: 100%;
    height: 100%;
    color: #fff;
    background: linear-gradient(45deg ,red ,black,red);
    background-size: 400% 400%;
    position: relative;
    animation: cambiar 10s ease-in-out infinite;
  }

  @keyframes cambiar {
    0% {
      background-position: 0 50%;
    }

    50% {
      background-position: 100% 50%;
    }

    100% {
      background-position: 0 50%;
    }
  }
</style>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>SISMRBB | Iniciar Sesión </title>
  <link href="<?php echo base_url(); ?>gentelella/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>gentelella/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>gentelella/vendors/nprogress/nprogress.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>gentelella/vendors/animate.css/animate.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>gentelella/build/css/custom.min.css" rel="stylesheet">
  <!-- Icono de pestaña -->
  <link href="<?php echo base_url() ?>img/sismrbb.png" rel="icon" type="image/png" />

</head>

<body class="login" style="background-color:black ;">
  <div>