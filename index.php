<?php
    $homeWorkNum = '1.2';
    $homeWorkCaption = 'Основы PHP';
    $startNum = null;
    
    if (!empty($_GET['send-button'])) {
        if (!empty($_GET['input_value'])) {
            $startNum = (int)$_GET['input_value'];
        }
    }
    
    if (!empty($_GET['random-button'])) {
        $startNum = rand(1, 9999);
    }
    
    if (!is_null($startNum)) {
        $inputHint = 'Задуманное число: ' . $startNum . '.';
        $num1 = 1;
        $num2 = 1;
        $numericalSeries = array();
        $numericalSeries[0] = $num1;
        $numericalSeries[1] = $num2;
        $i = 1;
        do {
            if ($num1 > $startNum) {
                $outputHint = 'Задуманное число НЕ входит в числовой ряд: ' . fullNumericalSeries($numericalSeries);
                break;
            } elseif ($num1 == $startNum) {
                $outputHint = 'Задуманное число входит в числовой ряд: ' . fullNumericalSeries($numericalSeries);
                break;
            } else {
                $num3 = $num1;
                $num1 = $num1 + $num2;
                $num2 = $num3;
                $numericalSeries[++$i] = $num1;
            }
        } while (true);
    } else {
        $inputHint = '';
        $outputHint = '';
    }
    
    function fullNumericalSeries($array)
    {
        $str = '';
        foreach ($array as $i) {
            $str = $str . $i . ' ';
        }
        return $str;
    }

?>

<!DOCTYPE html>
<html lang="ru">
  <head>
    <title>Домашнее задание по теме <?= $homeWorkNum ?> <?= $homeWorkCaption ?></title>
    <meta charset="utf-8">
    <style>
      body {
        font-family: sans-serif;
      }
  
      input {
        margin: 10px 0;
      }
    </style>
  </head>
  
  <body>
  <h1>Здравствуйте!</h1>
  <form action="" method="GET">
    <label>Введите любое число: <input type="text" name="input_value"></label>
    <div style="display: block;">
      <input type="submit" name="send-button" value="Отправить">
      <input type="submit" name="random-button" value="Сгенерировать случайное число">
    </div>
  </form>
  <p><?= $inputHint ?></p>
  <p><?= $outputHint ?></p>
  </body>
</html>