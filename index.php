<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>index</title>
</head>
<body>


    <?php 
        include("header.php"); 
        session_start();
        $_SESSION['location']="index.php";
    ?>

    
     <!-- <img class="img_backg" src="images/backg.jpg" alt="">  -->
    

    <?php
        include("leftside.php");
    ?>

  <main>

 
<?php
    include("db.php");

    $sql = "SELECT * FROM product";
    $stmt = $conn->query($sql);
    
    
    
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        ?>

        <a class="show_products" href="view_product.php?id=<?php echo $row['id']; ?>">
        <div class="product">
            <h2><?php echo $row['name']; ?></h2>
            <img class="product_img"  src="uploads/<?php echo $row['picture']; ?>" alt="Product Image">

            <br>
            
            <h3>Price: </h3>
            <p><?php echo $row['price']; ?> $</p>
            <br>

            <h3>Size: </h3>
            <p><?php echo $row['size']; ?></p>

            <div class="puy">
            <button ><img width="15px" src="images/shopping-cart.png" alt="puy"></button>
        
            </div>
                
            
        </div>
    </a>
        <?php
             }
        ?>

</main>


<?php  

 include("footer.php"); ?>


    
</body>
</html>