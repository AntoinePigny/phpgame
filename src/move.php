<?php
  session_start();


  if ($_POST['direction'] == 'UP') {
    if (($_SESSION['posPlayer']['y'] - 2) > 0) {
      $_SESSION['posPlayer']['y']-=2;
      header('Location: ../game.php');
    } else if (($_SESSION['posPlayer']['y'] - 1) > 0) {
      $_SESSION['posPlayer']['y']--;
      header('Location: ../game.php');
    } else {
      var_dump('Pas possible d\'aller vers le haut');die;
    }

  } else if ($_POST['direction'] == 'DOWN') {
    if ($_SESSION['posPlayer']['y'] + 2 <= $_SESSION['phpGame']['axes']['y']) {
      $_SESSION['posPlayer']['y']+=2;
      header('Location: ../game.php');
    } else if (($_SESSION['posPlayer']['y'] - 1) > 0) {
      $_SESSION['posPlayer']['y']--;
      header('Location: ../game.php');
    } else {
      var_dump('Pas possible d\'aller vers le bas');die;
    }

  } else if ($_POST['direction'] == 'LEFT') {
    if (($_SESSION['posPlayer']['x'] - 2) > 0) {
      $_SESSION['posPlayer']['x']-=2;
      header('Location: ../game.php');
    } else if (($_SESSION['posPlayer']['x'] - 1) > 0) {
      $_SESSION['posPlayer']['x']--;
      header('Location: ../game.php');
    } else {
      var_dump('Pas possible d\'aller vers la gauche');die;
    }

  } else if ($_POST['direction'] == 'RIGHT') {
    if ($_SESSION['posPlayer']['x'] + 2 <= $_SESSION['phpGame']['axes']['x']) {
      $_SESSION['posPlayer']['x']+=2;
      header('Location: ../game.php');
    } else if (($_SESSION['posPlayer']['x'] - 1) > 0) {
      $_SESSION['posPlayer']['x']--;
      header('Location: ../game.php');
    } else {
      var_dump('Pas possible d\'aller vers la droite');die;
    }

  } else {

  }
