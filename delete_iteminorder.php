<?php

    include("db.php");


    // DELETE FROM `orders` WHERE order_id =1;

        $orderid = $_GET['id'];


        $query = "DELETE FROM `orders` WHERE order_id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id', $orderid);
        $stmt->execute();
        header("Location: basket.php");
        exit();




?>