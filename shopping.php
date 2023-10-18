<php
require "main.php";
session_start();
if (isset($_POST['add_to_cart'])) {
  $product_id = $_POST['product_id'];
 $sql = "SELECT * FROM product WHERE id = $product_id";
   $result = mysqli_query($db, $sql);
    if (mysqli_num_rows($result) > 0) {
     $product = mysqli_fetch_assoc($result);
     $product_name = $product['product_name'];
     $org_price = $product['price'];
    $vendor = $product['vendor'];
    $trade_tag = $product['trade_tag'];
    $sql="select trade_tag from discount where vendor='$vendor'";
    $result = mysqli_query($db, $sql);
    
    $discount = mysqli_fetch_assoc($result);
    
    $discount_percentage = $discount[$trade_tag];
    
    $discounted_price = $org_price - ($org_price * ($discount_percentage / 100));
    
$sql = "CREATE TABLE shopping (
  id INT AUTO_INCREMENT PRIMARY KEY,
  product_name VARCHAR(50),
  org_price DECIMAL(10,2),
  discount_percentage INT,
  discounted_price DECIMAL(10,2),
  vendor VARCHAR(20)
)";
mysqli_query($db, $sql);
 $sql = "INSERT INTO shopping (product_name, org_price, discount_percentage, discounted_price, vendor) VALUES ('$product_name', '$org_price', '$discount_percentage', '$discounted_price', '$vendor')";
mysqli_query($db, $sql);
echo "<h1>Shopping Table</h1>";
echo "<table border='1'>";
echo "<tr>";
echo "<th>ID</th>";
echo "<th>Product Name</th>";
echo "<th>Org Price</th>";
echo "<th>Discount Percentage</th>";
echo "<th>Discounted Price</th>";
echo "<th>Vendor</th>";
echo "<th>Delete</th>";
echo "</tr>";
$total_price = 0;
$sql = "SELECT * FROM shopping";
$result = mysqli_query($db, $sql);
?>