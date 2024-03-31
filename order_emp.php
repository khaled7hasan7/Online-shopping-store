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
    <title>orders</title>
</head>
<body>




<?php 

    session_start();

    include("header_emp.php"); 
    include("leftside_emp.php"); 
    include("db.php");
    











    try{

        $sql3 = "SELECT prs_id,username,date FROM prossing ORDER BY date asc ";
        $stmt3 = $conn->prepare($sql3);
        // $stmt3->bindParam(':username', $username, PDO::PARAM_STR);ORDER BY date DESC
        $stmt3->execute();
        $pross = $stmt3->fetchAll(PDO::FETCH_ASSOC); 
    
        if (!empty($pross)) {
            foreach ($pross as $pross) {
                $prs_id = $pross['prs_id'];
                $username = $pross['username'];
                $date = $pross['date'];
   

                try {
                    // Fetch orders for the given username
                    $sql = "SELECT order_id,product_name, product_price, quantity, product_image,product_id,date ,state FROM orders WHERE username=:username && prs_id = :prs_id  && state ='processing'";
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
                                    <td><h4>' . $order['product_id'] . '</h4></td>
                                    <td>' . $order['product_price'] . ' $</td>
                                    <td>'.  $order['quantity'] .'</td>
                                    
                                  
        
                                    <td> <img class="img_in_order" src="uploads/' . $order['product_image'] . '" alt="Product Image"></td>
                                    
                                  </tr>';
                        }
                        // 
        
                        echo '<tr>
        
                        <td colspan="2"><strong>TOTAL</strong></td>
                       
                        <td><strong>'.$price.'   $</strong></td> 
                        
                        <td><strong>'. $pieces.'   piece </strong></td> 
                        <td><strong>'. $totalPrice.'   $</strong></td> 
                        
                        </tr>';
        
                       
            
                        echo '</div></table>';
                        echo '<div class="layout_stat_in_order_emp"><p class="stat_in_order_emp"> username  :'.$username.'<br>    Date : '.$date.'</p> ';
                        echo ' <a class="btn_shipped" href="shipped.php?prs='.$prs_id.'">shipped</a></div>';
                       
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



















 
              
?>


      

          




<?php
    include 'footer.php';
?>
</body>
</html>