<? php
require "main.php";
$_SESSION['cart'] = array_diff($_SESSION['cart'], array($product_id));
  
  //display a success message
  echo "<p>Product deleted from cart successfully!</p>";
  
}
?>