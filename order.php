<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">

    <style>

        body{

            background-color: #f4e9df;
        }
    </style>
    <title>order</title>
</head>
<body>




<?php 

    session_start();

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








    $username = $_SESSION['username'];

    if (!empty($_SESSION['username'])) {
        $username = $_SESSION['username'];
        
        // $totalPrice = 0;
        // $price=0 ;
        // $pieces=0 ;
        // $state ='';



        try{

        $sql3 = "SELECT prs_id,username FROM prossing WHERE username = :username ORDER BY date DESC ";
        $stmt3 = $conn->prepare($sql3);
        $stmt3->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt3->execute();
        $pross = $stmt3->fetchAll(PDO::FETCH_ASSOC); 
    
        if (!empty($pross)) {
            foreach ($pross as $pross) {
                $prs_id = $pross['prs_id'];
   

                try {
                    // Fetch orders for the given username
                    $sql = "SELECT order_id,product_name, product_price, quantity, product_image ,product_id,state FROM orders WHERE prs_id = :prs_id && username = :username && state !='basket'";
                    $stmt = $conn->prepare($sql);
                    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
                    $stmt->bindParam(':prs_id', $prs_id, PDO::PARAM_INT);
                    $stmt->execute();
                    $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
                    if (!empty($orders)) {
                        echo '<div class="layout_table_order"> 
                        <table   class="order_table">
                                <tr>
                                    <th>Product Name</th>
                                    <th>Product ID</th>
                                    <th>Product Price</th>
                                    <th>Quantity</th>
                                    <th>Product Image</th>
                                    
                                </tr>';
                                 
                            $totalPrice = 0;
                            $price=0 ;
                            $pieces=0 ;
                            $state ='';
            
                        foreach ($orders as $order) {
                            $price += $order['product_price'];
                            $pieces += $order['quantity'] ;
                            $quan =  $order['quantity'] ;
                            $totalPrice +=  $order['product_price'] *$order['quantity'];
                            $state = $order['state'];
                            
        
                            echo '<tr>
                                    <td><h4>' . $order['product_name'] . '</h4></td>
                                    <td>' . $order['product_id'] . '</td>
                                    <td>' . $order['product_price'] . ' $</td>
                                    <td>'.  $order['quantity'] .'</td>
                                    
                                  
        
                                    <td> <img class="img_in_order" src="uploads/' . $order['product_image'] . '" alt="Product Image"></td>
                                    
                                  </tr>';
                        }
                        // 
        
                        echo '<tr>
        
                        <td colspan="2"><strong>TOTAL</strong></td> 
                        <td ><strong >'.$price.'   $</strong></td> 
                        <td><strong>'. $pieces.'   piece </strong></td> 
                        <td><strong>'. $totalPrice.'   $</strong></td> 
                        
                        </tr>';
        
                       
            
                        echo '</div></table>';
                        echo '<div class="layout_stat_in_order"><p class="stat_in_order"> The Order Is '. $state.'</p> </div>';
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












                

            }
        }



        }
        catch(PDOException $e){
           echo('ERROR is'. $e->getMessage());
        }




    
    } else {
        echo '<p>User not logged in.</p>';
    }


            // if ( $state != '') {
            // echo '<div class="layout_stat_in_order"><h4 class="stat_in_order"> The Order Is '. $state.'</h4> </div>';}

  

?>


          




<?php
    include 'footer.php';
?>
</body>
</html>