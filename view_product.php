
<?php
include("db.php");

$productID = isset($_GET['id']) ? $_GET['id'] : null;

if (!$productID) {
 
    header("Location: index.php"); 
    exit();
}


$sql = "SELECT * FROM product WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $productID);
$stmt->execute();
$product = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$product) {
    
    header("Location: index.php"); 
    exit();
}



   
session_start();

    $_SESSION['location']="view_product.php";

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add-to-basket'])) {
        $quantity = $_POST['quantity_in_order'] ? intval($_POST['quantity_in_order']) : 1;

        
        if (!empty($_SESSION['your_session_key'])) {
            header("Location: basket.php?quantity=$quantity");
            exit();
        } else {
            
            header("Location: login.php");
            exit();
        }
    }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link rel="stylesheet" href="styles.css">
    
</head>
<body>

<?php include("header.php");include("leftside.php"); ?>


    <div class="center_view" >
   <div class="container"> 
    <img  src="uploads/<?php echo $product['picture']; ?>" alt="Product Image">
    <div class="view_product">
         
    
    
    <h2><?php echo $product['name']; ?></h2>
    <br><br><br>

    <h3>Description:</h3> 
    <p><?php echo $product['description']; ?></p>
    <br><br><br>

    <h3>Category:</h3>  
    <p> <?php echo $product['category']; ?></p>
      <br><br><br>


    <h3>Price:</h3>
    <p> <?php echo $product['price']; ?> $</p>
    <br><br><br>



    <h3>Size:</h3>
     <p><?php echo $product['size']; ?></p>
     <br><br><br>



    <h3>Remarks:</h3>
    <p> <?php echo $product['remark']; ?></p>

    <br><br><br>

    <div class="add-product-ptn">
    
    </div>
    <form action="add_to_basket.php" method="post">

    <label for="quantity_in_order">quantity</label>
    <input type="number" name="quantity_in_order" id="quantity_in_order" min="1" value="1">



    <input type="submit" class="add-to-basket"  value="ADD TO BASKET"  name="add-to-basket" id="add-to-basket">
    <?php
        $loc = "view_product.php?id=$productID";
        $_SESSION['location'] = $loc;


        $_SESSION['productID'] = $productID; 
        $_SESSION['productName'] = $product['name'];
        $_SESSION['productPrice'] = $product['price'];
        
        $_SESSION['productPicture'] = $product['picture'];
        


    ?>
    </form>

    <br><br>
    </div>
    
  </div>

</div>


    <?php include("footer.php"); ?>

</body>
</html>