<?php

require __DIR__.'/vendor/autoload.php';

define('TITLE','Edit hotel');

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

if(isset($_POST['name'], $_POST['city'], $_POST['description'], $_POST['standard'], $_POST['opened'])){

  $obHotel -> name = $_POST['name'];
  $obHotel -> city = $_POST['city'];
  $obHotel -> description = $_POST['description'];
  $obHotel -> standard = $_POST['standard'];
  $obHotel -> opened = $_POST['opened'];
  $obHotel -> update();

  header('location: index.php?status=success');
  exit;
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/forms.php';
include __DIR__.'/includes/footer.php';