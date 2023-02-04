<?php
        header("Access-Control-Allow-Origin: *");
        header("Content-type: application/json");
        include 'connection.php';
        
        $statement = $pdo->query("SELECT product.product_group, SUM(sales_reciepts.quantity) AS total FROM `sales_reciepts` JOIN product ON sales_reciepts.product_id=product.product_id GROUP BY product.product_group ORDER BY `total` DESC");
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($result, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
?>