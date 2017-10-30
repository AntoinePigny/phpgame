<?php
session_start();

function displayCase($x, $y)
{
  return "<div style='border:1px solid black; width:26px; height:26px; background-color:black;'></div>";
}
function displayObject($x, $y)
{
  return "<div style='border:1px solid black; width:26px; height:26px;'><img style='width: 100%;' src='./vivi.jpg'></div>";
}
// var_dump($_SESSION["phpGame"]);die;
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title><?php echo $_SESSION['phpGame']['gameName'] ?></title>
</head>
<body style="display: flex; flex-wrap:wrap;width:<?php echo ($_SESSION['phpGame']['axes']['x'] * 28) ?>px;">
  <!-- le 20 au dessus est la largeur totale d'un element, elle doit etre ajustée -->
  <?php
  // FOr qui itere sur chaque element de l'axe y
  for ($y=1; $y <= $_SESSION['phpGame']['axes']['y']; $y++) {
    // FOr qui itère sur chaque element de l'axe x
    for ($x=1; $x <= $_SESSION['phpGame']['axes']['x']; $x++) {
      // if qui vérifie si le joueur demarre une nouvelle session (ou nouvelle partie dans ce cas précis)
      if (!isset ($_SESSION['posPlayer'])) {
        //if qui verifie si en plus d'avoir une nouvelle partie la position par defaut du generateur de plateau est la case 1.1
        if ($y == 1 && $x == 1) {
          // alors alors on attribue au joueur la position par defaut et on affiche la div avec le joueur dedans
          $_SESSION['posPlayer'] = array(
            "x" => $x,
            "y" => $y,
          );
          echo displayObject($x, $y);
          // sinon on affiche une case standard a toutes les autres cases sauf celle de depart
        } else {
          echo displayCase($x, $y);
        }
        //else if verifie qu'on est dans une partie existante donc que le joueur a deja une position x et y
      } else if($y == $_SESSION['posPlayer']['y'] && $x == $_SESSION['posPlayer']['x']) {
        // alors on affiche la case modifiée a l'endroit ou se trouve le joueur
        echo displayObject($x, $y);
        //else correspondant au else if qui couvre toutes les autres valeurs de x et y, celles ou le joueur ne se trouve pas
      } else {
        //alors on affiche une case standard a toutes les autres valeurs de x et y
        if($x == $_SESSION['phpGame']['victory']['x'] && $y == $_SESSION['phpGame']['victory']['y']) {
          echo "<div style='border:1px solid black; width:26px; height:26px;'><img style='width: 100%;' src='./door.png'></div>";
        } else if ($x == $_SESSION['phpGame']['defeat']['x'] && $y == $_SESSION['phpGame']['defeat']['y']) {
          echo "<div style='border:1px solid black; width:26px; height:26px;'><img style='width: 100%;' src='./skull.png'></div>";
        } else {
        echo displayCase($x, $y);
        }
      }
    }
  }
  if ($_SESSION['phpGame']['victory']['x'] == $_SESSION['posPlayer']['x'] && $_SESSION['phpGame']['victory']['y'] == $_SESSION['posPlayer']['y']) {
    var_dump('Victoire');
  }
  if ($_SESSION['phpGame']['defeat']['x'] == $_SESSION['posPlayer']['x'] && $_SESSION['phpGame']['defeat']['y'] == $_SESSION['posPlayer']['y']) {
    var_dump('Défaite');
  }
  ?>
  <form class="" action="./src/reset.php">
    <input type="hidden" name="" value="on">
    <input type="submit" name="" value="reset">
  </form>
  <form class="" action="./src/move.php" method="post">
    <input type="hidden" name="direction" value="UP">
    <input type="submit" name="" value="&#8593;">
  </form>
  <form class="" action="./src/move.php" method="post">
    <input type="hidden" name="direction" value="DOWN">
    <input type="submit" name="" value="&#8595;">
  </form>
  <form class="" action="./src/move.php" method="post">
    <input type="hidden" name="direction" value="LEFT">
    <input type="submit" name="" value="&#8592;">
  </form>
  <form class="" action="./src/move.php" method="post">
    <input type="hidden" name="direction" value="RIGHT">
    <input type="submit" name="" value="&#8594;">
  </form>
</body>
</html>
