<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Basket</title>
</head>
<body>




<?php 

    session_start();
    $_SESSION['location']="basket.php";

    if (empty($_SESSION['user_id'])) {

        $_SESSION['location']="basket.php";
        header("Location: login.php");
    }







    include("header.php"); 
    include("leftside.php"); 

    //     session_start();
    //     $_SESSION['location']="basket.php";


    //    $user_id = $_SESSION['user_id'];

    //    $product_ID = $_SESSION['productID']  ;
    //    $product_Name =  $_SESSION['productName'] ;
    //    $product_price =  $_SESSION['productPrice'] ;
    //    $product_quantity =  $_SESSION['productQuantity'] ;
    //    $product_price =   $_SESSION['productPicture'];


    //    include("db.php"); 

    
    include("db.php");
    
    
    
    if (!empty($_SESSION['username'])) {
        $username = $_SESSION['username'];
        
        $totalPrice = 0;
        $price=0 ;
        $pieces=0 ;

    
        try {

            $sql = "SELECT order_id,product_name, product_price, quantity, product_image,product_id FROM orders WHERE username = :username && state='basket'";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->execute();
            $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            if (!empty($orders)) {
                echo '<div class="layout_table">
                <table   class="basket_table">
                        <tr>
                            <th>Product Name</th>
                            <th>Product ID</th>
                            <th>Product Price</th>
                            <th>Quantity</th>
                            <th>Product Image</th>
                            <th> </th>
                        </tr>';
    
                foreach ($orders as $order) {
                    $price += $order['product_price'];
                    $pieces += $order['quantity'] ;
               
                    $quan =  $order['quantity'] ;
                    $totalPrice +=  $order['product_price'] *$order['quantity'];

                  
                    

                    echo '<form action="updata_iteminorder.php"  method="post"><tr>
                            <td><h4>' . $order['product_name'] . '</h4></td>
                            <td> <a  class="id_link" href="view_product.php?id='.$order['product_id'].'">'. $order['product_id'] . ' </a></td>
                            
                            <td>' . $order['product_price'] . ' $</td>
                            <td> '. ' <input type="number" name="quantity_in_order" id="quantity_in_order" min="1" value="'.$quan.'">
                            
                            <input type="hidden" name="order_id" value="'.$order['order_id'].'">

                            <button type="submit" class="update_item" name="update_item">
                                <img src="images/check.png" alt="Update Item">
                            </button>

                            <td> <img class="img_in_basket" src="uploads/' . $order['product_image'] . '" alt="Product Image"></td>
                            <td><a  href="delete_iteminorder.php?id=' . $order['order_id'] . '"><img class="delete_item" src="images/bin.png"></a></td>
                          </tr> </form>';
                }
                // 

                echo '<tr>

                <td colspan="2"><strong>TOTAL</strong></td> 
                <td><strong>'.$price.'   $</strong></td> 
                <td><strong>'. $pieces.'   piece </strong></td> 
                <td><strong>'. $totalPrice.'   $</strong></td> 
                <td></td> 
                </tr>';
    
                echo '</div></table>';
            } else {
                echo '<div class="empty_basket_div"> <img src="images/empty-basket.png" alt="empty-basket" > </div>';
            }


        } catch (PDOException $e) {
            echo "<section>";
            echo "<h2>Error</h2>";
            echo "<p>There was an error retrieving orders from the database. Please try again.</p>";
            echo "<p>Error Message: " . $e->getMessage() . "</p>";
            echo "</section>";
        }
    } else {
        echo '<p>User not logged in.</p>';
    }
  

   
//  $date=date("Y-m-d h:i:s A");
?>

<div class="checkout">

    <a class="btn-checkout" href="checkout.php"  onclick="return confirm('Are you sure about this order ?')"><p class="checkout_p">checkout</p></a>
   

</div>







<?php
    include 'footer.php';
?>
</body>
</html>