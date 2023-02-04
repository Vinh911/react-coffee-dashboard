<?php
        header("Access-Control-Allow-Origin: *");
        header("Content-type: application/json");
        include 'connection.php';
        
        $statement = $pdo->query("SELECT instore_yn, COUNT(*) AS total FROM `sales_reciepts` GROUP BY instore_yn");
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($result, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
?>SELECT instore_yn, COUNT(*) AS total FROM `sales_reciepts` GROUP BY instore_yn