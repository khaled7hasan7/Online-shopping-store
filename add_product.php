<?php
function GetProductID() {
            $time = time();
            $randomNumber = mt_rand(100000000, 999999999); 
            $productID = $time . $randomNumber; 
            return substr($productID, 0, 10);
          }



    include("db.php");

        session_start();
        $_SESSION['location']="add_product.php";

    if (isset($_POST['addProduct'])) {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $category = $_POST['category'];
        $price = $_POST['price'];
        $size = $_POST['size'];
        $remark = $_POST['remark'];
        $id = (GetProductID());
        $quantity = $_POST['quantity'];


        

        // File handling
        $fileTmpPath = $_FILES['picture']['tmp_name'];
        $fileName = $_FILES['picture']['name'];
        $fileSize = $_FILES['picture']['size'];
        $fileType = $_FILES['picture']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

            $uploadPath = 'uploads/';
        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        $newFileName = 'item' . $id . 'img1.' . $fileExtension;
        $destPath = $uploadPath . $newFileName;
        move_uploaded_file($fileTmpPath, $destPath);
        $sql = "INSERT INTO `product`(`name`, `description`, `category`, `price`, `size`, `remark`, `id`, `picture`,`quantity`) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?,?)";

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(1, $name, PDO::PARAM_STR);
        $stmt->bindValue(2, $description, PDO::PARAM_STR);
        $stmt->bindValue(3, $category, PDO::PARAM_STR);
        $stmt->bindValue(4, $price, PDO::PARAM_STR);
        $stmt->bindValue(5, $size, PDO::PARAM_STR);
        $stmt->bindValue(6, $remark, PDO::PARAM_STR);
        $stmt->bindValue(7, $id, PDO::PARAM_STR);
        $stmt->bindValue(8, $newFileName, PDO::PARAM_STR);
        $stmt->bindValue(9, $quantity, PDO::PARAM_STR);
        $stmt->execute();
        
        echo "Product added successfully with ID: " . $id;
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
        include"header_emp.php";
         ?>

       
    

    
        <section>
            
        <h2>Add Product</h2>

        
        <form class="form_signup" action="add_product.php" method="post" enctype="multipart/form-data">

            
            <div>
            <label for="name">Product Name:</label>
            <input type="text" id="name" name="name" required>
            <div>
            <label for="description">Brief Description:</label>
            <textarea id="description" name="description" rows="4" required></textarea>
            
            <label for="category">Category:</label>
            <input type="text" id="category" name="category" required>

            <label for="price">Price:</label>
            <input type="text" id="price" name="price" step="0.5" required>

            <label for="size">Size:</label>
            <input type="text" id="size" name="size" required>

            <label for="remark">Remarks:</label>
            <textarea  id="remark" name="remark" rows="4"></textarea>
            
            <!-- <label for="id">Product ID:</label>
            <input type="text" id="id" name="id" required> -->


            <label for="picture">Product Image:</label>
            <input type="file" id="picture" name="picture" accept="image/*" required>

            
            <label for="quantity">Product Quantity:</label>
            <input type="number" id="quantity" name="quantity" required>

           
           <button  class="btn_next" type="submit" name="addProduct" id="addProduct">Add Product</button> 


        
            </div>
        </form>
    </section>
    

     <?php  include("footer.php"); ?> 
</body>
</html>