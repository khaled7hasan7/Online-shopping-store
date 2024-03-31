<?php
include("db.php");


       
           
            $prs_id = isset($_GET['prs']) ? $_GET['prs'] :'';
            if($prs_id == ''){
               header("Location: index.php");
            }
            

            $state = "shipped";
            $sql = "UPDATE orders SET state =:state  WHERE prs_id=:prs_id ";
                    
                    $stmt = $conn->prepare($sql);

                $stmt->bindParam(':state', $state, PDO::PARAM_STR);
                $stmt->bindParam(':prs_id', $prs_id , PDO::PARAM_INT);
                $stmt->execute();  
                 header("Location: order_emp.php");

?>