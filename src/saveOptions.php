<?php
  session_start();
  unset($_SESSION['phpGame']);
  $options = array(
    "gameName" => $_GET['gameName'],
    "axes" => array(
      "x" => $_GET['x'],
      "y" => $_GET['y'],
    ),
    "victory" => array(
      "x" => rand(2, $_GET['x']),
      "y" => rand(1, $_GET['y']),
      "appearance" => "door.png",
    ),
    "defeat" => array(
      "x" => rand(2, $_GET['x']),
      "y" => rand(1, $_GET['y']),
      "appearance" => "skull.png",
    )
  );
  $_SESSION['phpGame'] = $options;
  header('Location: ../index.php');
