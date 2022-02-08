<?php

require __DIR__.'/vendor/autoload.php';

use \App\Entity\Hotel;

if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
  header('location: index.php?status=error');
  exit;
}

$obHotel = Hotel::getHotel($_GET['id']);

if(!$obHotel instanceof Hotel){
  header('location: index.php?status=error');
  exit;
}

if(isset($_POST['delete'])){

  $obHotel->delete();

  header('location: index.php?status=success');
  exit;
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/confirm-delete.php';
include __DIR__.'/includes/footer.php';