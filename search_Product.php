<!-- search_product.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Search Results</title>
</head>
<body>

<?php 
    include("header.php"); 
    include("leftside.php");
    session_start(); 
    $_SESSION['location'] ='search_Product.php';

?>


<main>



    <div class="search-style">
    <form class="search-form" action="search_Product.php" method="get">
        <label for="name">Name:</label>
        <input type="text" id="name_product" name="name_product">


        <br>
        <label for="min_price">Min Price:</label>
        <input type="number" id="min_price" name="min_price">


        <label for="max_price">Max Price:</label>
        <input type="number" id="max_price" name="max_price">


        <input type="submit" value="Search" id="btn2-search" name="btn2-search">
    </form>
</div>

</main>
<div class="search-results">
        <form action="shortlist.php" method="post">
            <?php
            include("db.php");
            if(isset($_GET["btn2-search"]) ||isset($_GET["btn-search"]) ) {
            


            $productName = isset($_GET['name_product ']) ? $_GET['name-product'] : '';
            $minPrice = isset($_GET['min_price']) ? $_GET['min_price'] : null;
            $maxPrice = isset($_GET['max_price']) ? $_GET['max_price'] : null;

            if($productName == '' && $minPrice == null && $maxPrice == null){
                $sql = "SELECT * FROM product";

                $stmt = $conn->prepare($sql);
                $stmt->execute();

            } else {
            $sql = "SELECT * FROM product WHERE name LIKE :name_product AND (price >= :min_price OR :min_price IS NULL) AND (price <= :max_price OR :max_price IS NULL)";

            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':name_product', '%' . $productName . '%');
            $stmt->bindValue(':min_price', $minPrice, PDO::PARAM_STR);
            $stmt->bindValue(':max_price', $maxPrice, PDO::PARAM_STR);
            $stmt->execute();

            }

            echo '<div class="layout_search"><table class="search_table">
                    
                        <tr>
                            <th><button type="submit" name="shortlist">Shortlist</button></th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Size</th>
                            <!-- Add more columns as needed -->
                        </tr>';

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo '<tr>
                        <td><input type="checkbox" name="shortlist[]" value="' . $row['id'] . '"></td>
                        <td><a href="view_product.php?id=' . $row['id'] . '">' . $row['name'] . '</a></td>
                        <td>' . $row['price'] . ' $</td>
                        <td>' . $row['size'] . '</td>
                        <!-- Add more cells as needed -->
                      </tr>';
            }

            echo '</table></div>';
        }
    
            ?>

          
        </form>
    </div> 






<?php include("footer.php"); ?>

</body>
</html>
