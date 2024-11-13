<?php

  // total price function
  function total_cart_price(){
    global $con;
    $get_ip_add = getIPAddress(); 
    $total_price = 0;
  
    // Join the cart_details and products table in a single query to avoid nested loops
    $cart_query = "
        SELECT p.product_price
        FROM cart_details c
        JOIN products p ON c.product_id = p.product_id
        WHERE c.ip_address = '$get_ip_add'
    ";
    $result = mysqli_query($con, $cart_query);
  
    // Sum up the prices
    while ($row = mysqli_fetch_array($result)) {
        $total_price += $row['product_price'];
    }
  
    echo $total_price;
  }


?>