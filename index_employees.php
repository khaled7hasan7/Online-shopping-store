<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>
<body>
        <?php
             include("header_emp.php");
             session_start();
            $_SESSION['location']="index_employees.php";
         ?>
        





    
        <?php 
         include "leftside_emp.php" ;
          ?>
<main>
    
    <?php
        include("db.php");
    
       
        $sql = "SELECT * FROM product";
        $stmt = $conn->query($sql);
    
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <div class="product">
                <h2><?php echo $row['name']; ?></h2>
                <img class="product_img" src="uploads/<?php echo $row['picture']; ?>" alt="Product Image">
            

                <br>
                <h3>Category: </h3>
                <p><?php echo $row['category']; ?></p>
                <br>


                <h3>Price: </h3>
                <p><?php echo $row['price']; ?> $</p>
                <br>


                
                <h3>Size: </h3>
                <p><?php echo $row['size']; ?></p>
                <br>
                
                <h3>Quantity: </h3>
                <p><?php echo $row['quantity']; ?></p>
                <br>
                
                <h3>ID : </h3>
                <p><a href="update_product.php?id=<?php echo $row['id']; ?>" ><?php echo $row['id']; ?>    </a></p>

              
                
            </div>
            <?php
        }
        ?>
       
    </main>



    


<?php  include ("footer.php"); ?>


    
</body>
</html>