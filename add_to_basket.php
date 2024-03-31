<?php
           
            
            include("db.php");
            session_start();


            if (!empty($_SESSION['user_id'])) {
                


            


                $username = $_SESSION['username'];
                $product_id = $_SESSION['productID']  ;
                $product_name =  $_SESSION['productName'] ;
                $product_price =  $_SESSION['productPrice'] ;
                $quanity = $_POST['quantity_in_order'];
                $product_image =   $_SESSION['productPicture'];
                $state="basket";
                $date=date("Y-m-d h:i:s A");
                $prs_id ="0";

                // echo $product_id ."<br>" . $username  ."<br>";
                // echo $product_name ."    <br>   ".$product_price ."   <br>    ".$product_image ."  <br>     ". $quanity ;
                


                try {
                    
                    //INSERT INTO `orders`(`order_id`, `user_id`, `product_id`, `product_name`, `quantity`, `product_price`, `product_image`)
                    //  VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]')

                    

                    $sql = "INSERT INTO orders 
                    (username, product_id, product_name, quantity, product_price, product_image,state,date,prs_id) 
                    VALUES (:username, :product_id, :product_name, :quanity, :product_price, :product_image,:state,:date,:prs_id)";
                    echo $date ;
                    
                    $stmt = $conn->prepare($sql);
                    
            
                    $stmt->bindParam(':username', $username , PDO::PARAM_STR);
                    $stmt->bindParam(':product_id', $product_id, PDO::PARAM_STR);
                    $stmt->bindParam(':product_name', $product_name, PDO::PARAM_STR);
                    $stmt->bindParam(':quanity', $quanity, PDO::PARAM_INT);
                    $stmt->bindParam(':product_price', $product_price, PDO::PARAM_INT);
                    $stmt->bindParam(':product_image', $product_image, PDO::PARAM_STR);
                    $stmt->bindParam(':state', $state, PDO::PARAM_STR);
                    $stmt->bindParam(':date', $date, PDO::PARAM_STR);
                    $stmt->bindParam(':prs_id', $prs_id, PDO::PARAM_INT);
                    $stmt->execute();  


                        $conn = null;
                       $loc= $_SESSION['location'] ;
                        header("Location: $loc");

                    }   catch (PDOException $e) {
                    
                        echo "<section>";
                        echo "<h2>Error</h2>";
                        echo "<p>There was an error inserting your data into the database. Please try again.</p>";
                        echo "<p>Error Message: " . $e->getMessage() . "</p>";
                        echo "</section>";
                    
                    
                        }
                

                
            } else {

                header("Location: login.php ");
            }



?>