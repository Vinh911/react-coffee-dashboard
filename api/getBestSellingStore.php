<?php
        header("Access-Control-Allow-Origin: *");
        header("Content-type: application/json");
        include 'connection.php';
        
        $statement = $pdo->query("SELECT sales_outlet.store_address, sales_outlet.store_city, SUM(sales_reciepts.line_item_amount) AS total FROM `sales_reciepts` JOIN sales_outlet ON sales_reciepts.sales_outlet_id=sales_outlet.sales_outlet_id GROUP BY sales_outlet.sales_outlet_id ORDER BY total DESC");
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($result, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
?>