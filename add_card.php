<? php
require "main.php";
$_SESSION['cart'][] = $product_id;
    
    //display a success message
    echo "<p>Product added to cart successfully!</p>";
} else {
echo "<p>Invalid product id!</p>";
 }
}
if (isset($_POST['delete'])) {
  $shopping_id = $_POST['shopping_id'];
  $sql = "DELETE FROM shopping WHERE id = $shopping_id";
  mysqli_query($db, $sql);
 
  $sql = "SELECT product_id FROM shopping WHERE id = $shopping_id";
  $result = mysqli_query($db, $sql);
$product = mysqli_fetch_assoc($result);
$product_id = $product['product_id'];
?>