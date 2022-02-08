<?php

require __DIR__.'/vendor/autoload.php';

define('TITLE','Register hotel');

use \App\Entity\Hotel;
$obHotel = new Hotel;

if(isset($_POST['name'], $_POST['city'], $_POST['description'], $_POST['standard'], $_POST['opened'])){

  $obHotel -> name = $_POST['name'];
  $obHotel -> city = $_POST['city'];
  $obHotel -> description = $_POST['description'];
  $obHotel -> standard = $_POST['standard'];
  $obHotel -> opened = $_POST['opened'];
  $obHotel -> register();

  header('location: index.php?status=success');
  exit;
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/forms.php';
include __DIR__.'/includes/footer.php';