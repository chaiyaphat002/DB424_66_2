<?php
/*
function a1($a, $b) {
     return $a + $b;
}
*/

$a1 = fn($a, $b) => $a + $b;

function a3($a,$b) {
    return $a ?? "No, I con't.";
}

echo '$x =1<br>';
$x =1;
// $f = is_null($x) ? 'a3' : 'a1';
$f = is_null($x) ? 'a3' : $a1;
echo $f($x,5);
echo '<br>';

echo '$x =null<br>';
$x =null;
//$f = is_null($x) ? 'a3' : 'a1';
$f = is_null($x) ? 'a3' : $a1;
echo $f($x,5);
echo '<br>';

$a3 = explode(",", "apple,pear,peach");
echo $a3[0].'<br>';
echo $a3[1].'<br>';
echo $a3[2].'<br>';

$foods = ['morning'=>'โจ๊ก', 'lunch'=>'ข้าวผัด', 'dinner'=>'หมูกระทะ'];
echo $foods['morning'].'<br>';
echo $foods['lunch'].'<br>';
echo $foods['dinner'].'<br>';
?>
<pre>
<?php var_dump($foods);?>
<pre>

<?php
echo '<br>';

$multiarray = [[1,2,3], ['a','b',['c', 5]]];
//var_dump($multiarray);
echo '</prp>';
print_r($multiarray);
echo '</prp>';
echo $multiarray[1][0]; //a
echo '<br>';
echo $multiarray[1][2][1]; //5

sort($foods);
echo'<pre>';
print_r($foods);
echo'<pre>';
?>

<?php
$array = array('a', 'b', 'c');
$count = count($array);

for ($i = 0; $i < $count; $i++) {
    echo "i:{$i}, v:{$array[$i]}<br>";
}
?>
<?php
$colors = array('red', 'blue', 'green');

foreach ($colors as $i=>$color) {
    echo "{$i} Do you like $color?<br>";
}
?>