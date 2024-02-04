<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>poker</title>
    <style>
        .spades, .clubs {
            color: black;
        }
        .hearts, .diams {
            color: red;
        }
        </style>
</head>
<body>
   <?php 
   $suits = ['spades','clubs','hearts','diams'];
   $ranks = explode(',','A,2,3,4,5,6,7,8,9,10,J,Q,K');
   $deck = [];
   foreach ($suits as $suit) {
    foreach ($ranks as $rank){
        $deck[] = ['suit'=>$suit, 'rank'=>$rank];
    }
   }
   
   function deal($deck){
$tmp = rand(0, 51);
$card1 = $deck[$tmp];
unset($deck[$tmp]);
sort($deck);
$tmp = rand(0, 50);
$card2 = $deck[$tmp];
return [$card1, $card2];
   }
   //echo '<pre>';
   //print_r(deal($deck));
   //echo '</pre>';
   $cards = deal($deck);
   ?>
   <h1>ไพ่ที่ได้</h1>
   <h1>
    <span class="<?php echo $cards[0]['suit'];?>">
        <?php
        echo $cards[0]['rank'].'&'.$cards[0]['suit'].';';
?>
   </span>
   +
   <span class="<?php echo $cards[1]['suit'];?>">
        <?php
        echo $cards[1]['rank'].'&'.$cards[1]['suit'].';';
        ?>
        </span>
</h1>
</body>
</html>