<?php

$message = '';
$calcul = '';

if (isset($_POST['chiffre1']) && isset($_POST['chiffre2'])) {
    if (isset($_POST['addition'])) {
        $message = $_POST['chiffre1'] + $_POST['chiffre2'];
        $calcul = '+';
    }
    if (isset($_POST['soustraction'])) {
        $message = $_POST['chiffre1'] - $_POST['chiffre2'];
        $calcul = '-';
    }
    if (isset($_POST['multiplication'])) {
        $message = $_POST['chiffre1'] * $_POST['chiffre2'];
        $calcul = '*';
    }
    if (isset($_POST['division'])) {
        $message = $_POST['chiffre1'] / $_POST['chiffre2'];
        $calcul = '/';
    }
}


?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Calculatrice</title>
  </head>
  <body>
    <h1>Une calculatrice en PHP</h1>
    <form action="" method="post">
      <input type="text" name="chiffre1" value="<?= isset($_POST['chiffre1']) ? $_POST['chiffre1'] : '0' ?>"/>
      <span><?= $calcul ?></span>
      <input type="text" name="chiffre2" value="<?= isset($_POST['chiffre2']) ? $_POST['chiffre2'] : '0' ?>"/>
      <input type="submit" name="addition" value="+"/>
      <input type="submit" name="soustraction" value="-"/>
      <input type="submit" name="multiplication" value="*"/>
      <input type="submit" name="division" value="/"/>
    </form>
    <p>Résultat : <?= $message ?></p>
  </body>
</html>
