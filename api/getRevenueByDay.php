<?php
        header("Access-Control-Allow-Origin: *");
        header("Content-type: application/json");
        include 'connection.php';
        
        $statement = $pdo->query("SELECT transaction_date, SUM(line_item_amount) AS total FROM sales_reciepts GROUP BY transaction_date");
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($result, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
?>