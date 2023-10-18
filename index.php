<?php
require "main.php";
$sql = "CREATE TABLE discount (
  vendor VARCHAR(20) PRIMARY KEY,
  trade_A INT,
  trade_B INT,
  trade_C INT,
  trade_D INT
)";
$sql = "INSERT INTO discount (vendor, trade_A, trade_B, trade_C, trade_D) VALUES
('ABC', 10, 15, 20, 25),
('DEF', 5, 10, 15, 20),
('GHI', 20, 25, 30, 35),
('JKL', 15, 20, 25, 30)";
mysqli_query($db, $sql);
echo "<h1>Discount Table</h1>";
echo "<table border='1'>";
echo "<tr>";
echo "<th>Vendor</th>";
echo "<th>Trade A</th>";
echo "<th>Trade B</th>";
echo "<th>Trade C</th>";
echo "<th>Trade D</th>";
echo "</tr>";
$sql = "SELECT * FROM discount";
$result = mysqli_query($db, $sql);
while ($row = mysqli_fetch_assoc($result)) {
 $vendor = $row['vendor'];
  $trade_A = $row['trade_A'];
  $trade_B = $row['trade_B'];
  $trade_C = $row['trade_C'];
  $trade_D = $row['trade_D'];
echo "<tr>";
  echo "<td>$vendor</td>";
  echo "<td>$trade_A%</td>";
  echo "<td>$trade_B%</td>";
  echo "<td>$trade_C%</td>";
  echo "<td>$trade_D%</td>";
  echo "</tr>";
echo "</table>";
}
?>