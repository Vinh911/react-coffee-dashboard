<?php
        header("Access-Control-Allow-Origin: *");
        header("Content-type: application/json");
        include 'connection.php';
        
        $statement = $pdo->query("SELECT product.product, SUM(sales_reciepts.line_item_amount) AS total FROM sales_reciepts JOIN product ON sales_reciepts.product_id = product.product_id GROUP BY sales_reciepts.product_id ORDER BY `total` DESC LIMIT 10");
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($result, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
?>