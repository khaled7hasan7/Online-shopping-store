 
<?php
    include("db.php");

    session_start();
   
    try {
        $username = $_SESSION['username'];
        $state='processing' ;


        function GetPrs() {
            $time = time();
            $randomNumber = mt_rand(100000000, 999999999); 
            $prs = $time . $randomNumber; 
            return substr($prs, 0, 10); 
          }

          
          $prs_id = GetPrs();

 

        $date=date("Y-m-d h:i:s A");
        
        $sqll = " INSERT INTO prossing (`prs_id`,`username`, `date`) VALUES (:prs_id,:username,:date)";

        $stmtt = $conn->prepare($sqll);
        $stmtt->bindParam(':prs_id', $prs_id , PDO::PARAM_INT);
        $stmtt->bindParam(':username', $username , PDO::PARAM_STR);
        $stmtt->bindParam(':date', $date , PDO::PARAM_STR);
        
        $stmtt->execute(); 
     

               


  
        

        $sql = "UPDATE orders SET prs_id=:prs_id ,state =:state  ,date=:date WHERE username=:username && state='basket'";
 
        
        $stmt = $conn->prepare($sql);
        
         $stmt->bindParam(':state', $state, PDO::PARAM_STR);
         $stmt->bindParam(':date', $date , PDO::PARAM_STR);
         $stmt->bindParam(':username', $username , PDO::PARAM_STR);
         $stmt->bindParam(':prs_id', $prs_id , PDO::PARAM_INT);
         $stmt->execute();  







          header("Location: basket.php");


        
        }   catch (PDOException $e) {
        
            echo "<section>";
            echo "<h2>Error</h2>";
            echo "<p>There was an error inserting your data into the database. Please try again.</p>";
            echo "<p>Error Message: " . $e->getMessage() . "</p>";
            echo "</section>";
        
        
            }



?>