<?php
include("db.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $quantity = $_POST['quantity_in_order'];
    $order_id = $_POST['order_id'];

    try {
        
        $sql = "UPDATE orders SET quantity = :quantity WHERE order_id = :order_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
        $stmt->bindParam(':order_id', $order_id, PDO::PARAM_INT);
        $stmt->execute();

        
        header("Location: basket.php");
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Error: Invalid request method.";
}
?>
