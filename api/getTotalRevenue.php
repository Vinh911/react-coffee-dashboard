<?php
        header("Access-Control-Allow-Origin: *");
        header("Content-type: application/json");

        include 'connection.php';
        $statement = $pdo->query("SELECT SUM(line_item_amount) AS total FROM sales_reciepts");
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        echo json_encode($result["total"], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
?>