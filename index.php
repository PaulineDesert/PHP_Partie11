<?php

$historic;

function calcul($number1, $number2) {

  $calcul = '';
  $result = '';
  $regexNumber = '/[0-9.]/';
  global $historic;

  $checkNumber1 = isset($number1) && preg_match($regexNumber, $number1);
  $checkNumber2 = isset($number2) && preg_match($regexNumber, $number2);

  if ($checkNumber1 && $checkNumber2) {
    if (isset($_POST['addition'])) {
      $calcul = $number1 . chr(10) . $_POST['addition'] . chr(10) . $number2 . ' = ';
      $result = $number1 + $number2;
    }
    if (isset($_POST['soustraction'])) {
      $calcul = $number1 . chr(10) . $_POST['soustraction'] . chr(10) . $number2 . ' = ';
      $result = $number1 - $_POST['chiffre2'];
    }
    if (isset($_POST['multiplication'])) {
      $calcul = $number1 . chr(10) . $_POST['multiplication'] . chr(10) . $number2 . ' = ';
      $result = $number1 * $number2;
    }
    if (isset($_POST['division'])) {
      if ($number2 == 0) {
        $calcul = 'Vous ne pouvez pas diviser ' . $number1 . ' par 0, veuillez choisir un autre nombre.';
      } else {
        $calcul = $number1 . chr(10) . $_POST['division'] . chr(10) . $number2 . ' = ';
        $result = $number1 / $number2;
      }
    }
  } else {
    $calcul = 'Veuillez choisir un chiffre';
  }

  echo $calcul . $result;

  $historic += $calcul;

  var_dump($_POST);

  var_dump($historic);
  

}
var_dump($historic);


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
    <input type="text" name="chiffre1" value="<?= isset($_POST['chiffre1']) ? $_POST['chiffre1'] : '0' ?>" />
    <input type="text" name="chiffre2" value="<?= isset($_POST['chiffre2']) ? $_POST['chiffre2'] : '0' ?>" />
    <input type="submit" name="addition" value="+" />
    <input type="submit" name="soustraction" value="-" />
    <input type="submit" name="multiplication" value="*" />
    <input type="submit" name="division" value="/" />
    <input type="hidden" name="historic" value="<?= $historic ?>" />
  </form>
  <p>Résultat : <?= isset($_POST['chiffre1']) && isset($_POST['chiffre2']) ? calcul($_POST['chiffre1'], $_POST['chiffre2']) : '' ?></p>
  <p></p>
</body>

</html>