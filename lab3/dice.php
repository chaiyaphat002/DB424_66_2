<?php
function dices_roller($score = false) {
 $dice1 = rand(1,6);
 $dice2 = rand(1,6);
 $RESULT = $dice1 + $dice2;
 $display = '2 Dices roll => ';
 $display .= $score ? "{$dice1} + {$dice2} => " : '';
 $display .= "ผลรวมคือ {$RESULT} ";
 return $display;
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dices Roller</title>
</head>
<body>
 <h1>Without score</h1>   
 <?php echo dices_roller();?>
 <h1>With score</h1>   
 <?php echo dices_roller(true);?>
</body>
</html>