<?php  ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Options</title>
  </head>
  <body>
    <form class="" action="./src/saveOptions.php">
      <label for="">Nom de la partie:</label>
      <input required type="text" name="gameName">
      <label for="">Axe X</label>
      <input required type="number" name="x" min="10" max="30">
      <label for="">Axe Y</label>
      <input required type="number" name="y" min="10" max="30">
      <input type="submit" name="" value="Launch">
    </form>
  </body>
</html>
