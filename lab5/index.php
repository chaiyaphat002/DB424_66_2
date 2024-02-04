<?php
$servername = "db403-mysql";
$database = "northwind";
$username = "root";
$password = "P@ssw0rd";

try{
$con = new mysqli($servername, $username, $password, $database);
}
catch (Exception $e){
    //echo $e->getMessage();
    die("Connection failed");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connect to MYSQL</title>
</head>
<body>
    <?php
    $sql = "SELECT * FROM categories";
    try{
    $result = $con->query($sql);
    echo "<table>";
while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>{$row['CategoryID']}</td>";
    echo "<td>{$row['CategoryName']}</td>";
    echo "</tr>";
}
echo "</table>";
    }
    catch (Exception $e){
        //echo 'Something went wrong.';
        echo 'Something went wrong.';
    }
    ?>
    <ol>
        <li>
            <p>แสดงจำนวนวันเฉลี่ยที่ใช้ในการขนส่งสินค้านับจากวันที่มีการสั่งสินค้าถึงวันที่ส่งสินค้า (เศษของวันนับเป็น 1 วัน) ของแต่ละประเทศ เรียงลำดับจากมากไปหาน้อย
                <table>
                    <tr><th>ShipCountry</th><th>Average Shipped days</th></tr>
                <?php
                $sql = 'SELECT ShipCountry, AVG(DATEDIFF(ShippedDate, OrderDate)) `ค่าเฉลี่ยก่อนปัดทศนิยม`, CEILING(AVG(DATEDIFF(ShippedDate, OrderDate))) `ค่าเฉลี่ยหลังปัดทศนิยม`
                FROM orders
                GROUP BY ShipCountry
                ORDER BY CEILING(AVG(DATEDIFF(ShippedDate, OrderDate))) DESC';
                $result = $con->query($sql);
                while ($row = $result->fetch_assoc()){
                echo '<tr>';
                echo "<td>{$row['ShipCountry']}</td>";
                echo "<td>{$row['ค่าเฉลี่ยก่อนปัดทศนิยม']}</td>";
                echo "<td>{$row['ค่าเฉลี่ยหลังปัดทศนิยม']}</td>";
                echo '</tr>';
                }
                ?>
                </table>
</li>

                <li>
    <p>แสดงจำนวนรายการสั่งซื้อของแต่ละเดือน ในปี 1995</p>
        <table>
            <tr><th>month(OrderDate)</th><th>จำนวนสินค้า</th></tr>
<?php 
$sql = 'SELECT month(OrderDate), COUNT(*) จำนวนสินค้า
FROM orders
WHERE YEAR(OrderDate) =1995
GROUP BY month(OrderDate)';
$result =$con->query($sql);
while ($row =$result->fetch_assoc()) {
    echo' <tr>';
    echo "<td>{$row['month(OrderDate)']}</td>";
    echo "<td>{$row['จำนวนสินค้า']}</td>";
    echo '</tr>';
}
?>
 </table>
    </li>
    <li>
    <p>ค้นหาว่าประเทศใดมีลูกค้ามากที่สุด</p>
        <table>
            <tr><th>Country</th><th>No fo customers</th></tr>
<?php 
$sql = 'SELECT Country, COUNT(*) `No fo customers`
FROM customers
GROUP BY Country
ORDER BY `No fo customers` DESC
LIMIT 1';
$result =$con->query($sql);
while ($row =$result->fetch_assoc()) {
    echo' <tr>';
    echo "<td>{$row['Country']}</td>";
    echo "<td>{$row['No fo customers']}</td>";
    echo '</tr>';
}
?>
 </table>
    </li>
    <li>
    <p>ค้นหาว่าประเทศใดมีลูกค้ามากที่สุด</p>
        <table>
            <tr><th>CategoryName</th><th>Country</th><th>#Orders</th></tr>
<?php 
$sql= 'SELECT CategoryName, Country, COUNT(*) `#Orders`
FROM categories G 
JOIN products P ON G.CategoryID = P.CategoryID 
JOIN `order details` D ON P.ProductID = D.ProductID
JOIN orders O ON D.OrderID = O.OrderID
JOIN customers C ON O.CustomerID = C.CustomerID
GROUP BY CategoryName, Country';
$result =$con->query($sql);
while ($row =$result->fetch_assoc()) {
    echo' <tr>';
    echo "<td>{$row['CategoryName']}</td>";
    echo "<td>{$row['Country']}</td>";
    echo "<td>{$row['#Orders']}</td>";
    echo '</tr>';
}
$con->close();
?>
 </table>
    </li>
</ol>
</body>
</html>