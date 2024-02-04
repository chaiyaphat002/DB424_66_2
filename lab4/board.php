<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chess board</title>
    <style>
    * {
       box-sizing: border-box; 
    }
    table {
        border-spacing: 0;
        border: 1px solid black;
    }
    td {
        width: 50px;
        height: 50px;
    }
    .black {
         background-color: black;
    }
    .white {
        background-color: white;
    }
    </style>
</head>
<body>
  <table>
<?php
 for ($i=0; $i < 8; $i++) {
    echo '<tr>';
    for ($j=0; $j < 8; $j++) {
      //  ($i+$j)%2!=0
     //   echo "<td>{$i}, {$j}</td>";
?> 
       <td class="<?php echo ($i + $j)%2 !=0 ? 'white' : 'black';?>"></td>
<?php
    }
    echo '</tr>';
 }
?>    
  </table>  
</body>
</html>