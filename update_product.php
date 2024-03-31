<?php
include("db.php");


$id = isset($_GET['id']) ? $_GET['id'] : null;

$query = "SELECT * FROM product WHERE id = :id";
$stmt = $conn->prepare($query);
$stmt->bindParam(':id', $id);
$stmt->execute();
$product = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$product) {
   
    header("Location: index_employees.php");

    die();
}
if (isset ($_POST["updateProduct"]) ) {


    $newname = isset($_POST['name']) ? ($_POST['name']) : $product['name'];
    $newDescription = isset($_POST['description']) ? ($_POST['description']) : $product['description'];
    $newcategory = isset($_POST['category']) ? ($_POST['category']) : $product['category'];
    $newprice = isset($_POST['price']) ? ($_POST['price']) : $product['price'];
    $newsize = isset($_POST['size']) ? ($_POST['size']) : $product['size'];
    $newremark = isset($_POST['remark']) ? ($_POST['remark']) : $product['remark'];
    $newpicture = isset($_POST['picture']) ? ($_POST['picture']) : $product['picture'];
    $newquantity= isset($_POST['quantity']) ? ($_POST['quantity']) : $product['quantity'];
    
    // UPDATE `product` SET `name`='[value-1]',`description`='[value-2]',
    // `category`='[value-3]',`price`='[value-4]',`size`='[value-5]',`remark`='[value-6]',
    // `id`='[value-7]',`picture`='[value-8]',`quantity`='[value-9]' WHERE 1


    $SQLupdata = "UPDATE product SET name = :name, description = :description, category = :category,
     price = :price, size = :size, remark = :remark, picture = :picture, quantity = :quantity  WHERE id = :id";

    $updateStmt = $conn->prepare($SQLupdata);
    $updateStmt->bindParam(':name', $newname);
    $updateStmt->bindParam(':description', $newDescription);
    $updateStmt->bindParam(':category', $newcategory);
    $updateStmt->bindParam(':price', $newprice);
    $updateStmt->bindParam(':size', $newsize);
    $updateStmt->bindParam(':remark', $newremark);
    $updateStmt->bindParam(':picture', $newpicture);
    $updateStmt->bindParam(':quantity', $newquantity);
    $updateStmt->bindParam(':id', $id);

    $updateStmt->execute();
    header("Location: index_employees.php");
    die();
}

?>


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
    <title>Add Product</title>

</head>
<body>

        <?php
        include "header.php";
         ?>

       
    

    
        <section>
            
        <h2>updata Product</h2>

        
        <form class="form_signup" action="update_product.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">

        <div>
                <label for="name">Product Name:</label>
                <input type="text" id="name" name="name" value="<?php echo $product['name']; ?>" required>

                <label for="description">Brief Description:</label>
                <textarea id="description" name="description" rows="4" required><?php echo $product['description']; ?></textarea>

                <label for="category">Category:</label>
                <input type="text" id="category" name="category" value="<?php echo $product['category']; ?>" required>

                <label for="price">Price:</label>
                <input type="number" id="price" name="price" step="0.01" value="<?php echo $product['price']; ?>" required>

                <label for="size">Size:</label>
                <input type="text" id="size" name="size" value="<?php echo $product['size']; ?>" required>

                <label for="remark">Remarks:</label>
                <textarea id="remark" name="remark" rows="4"><?php echo $product['remark']; ?></textarea>

                <label for="picture">Product Image:</label>
                <input type="file" id="picture" name="picture" accept="image/*" >

                <label for="quantity">Product Quantity:</label>
                <input type="number" id="quantity" name="quantity" value="<?php echo $product['quantity']; ?>" required>

                <button class="btn_next" type="submit" name="updateProduct" id="updateProduct">Update Product</button>
            </div>
        </form>
    </section>
    

     <?php session_start(); include("footer.php"); ?> 
</body>
</html>