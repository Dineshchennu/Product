<? php
require "main.php";
$sql = "CREATE TABLE product (
  id INT AUTO_INCREMENT PRIMARY KEY,
  product_name VARCHAR(50),
  price DECIMAL(10,2),
  trade_tag VARCHAR(10),
  vendor VARCHAR(20),
  FOREIGN KEY (vendor) REFERENCES discount(vendor))";
  $sql = "INSERT INTO product (product_name, price, trade_tag, vendor) VALUES
('Laptop', 50000.00, 'trade_A', 'ABC'),
('Mobile', 20000.00, 'trade_B', 'DEF'),
('Headphone', 3000.00, 'trade_C', 'GHI'),
('Mouse', 500.00, 'trade_D', 'JKL')";
mysqli_query($db, $sql);
echo "<h1>Product Table</h1>";
echo "<table border='1'>";
echo "<tr>";
echo "<th>ID</th>";
echo "<th>Product Name</th>";
echo "<th>Price</th>";
echo "<th>Trade Tag</th>";
echo "<th>Vendor</th>";
echo "<th>Add to Cart</th>";
echo "</tr>";
$sql = "SELECT * FROM product";
$result = mysqli_query($db, $sql);
while ($row = mysqli_fetch_assoc($result)) {
$id = $row['id'];
  $product_name = $row['product_name'];
  $price = $row['price'];
  $trade_tag = $row['trade_tag'];
  $vendor = $row['vendor'];
echo "<tr>";
  echo "<td>$id</td>";
  echo "<td>$product_name</td>";
  echo "<td>$price</td>";
  echo "<td>$trade_tag</td>";
  echo "<td>$vendor</td>";
echo "<td><form method='post' action=''><input type='hidden' name='product_id' value='$id'><input type='submit' name='add_to_cart' value='Add to Cart'></form></td>";
  
  echo "</tr>";
}
echo "</table>";
?>