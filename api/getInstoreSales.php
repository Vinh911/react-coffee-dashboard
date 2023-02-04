<?php
        header("Access-Control-Allow-Origin: *");
        header("Content-type: application/json");
        include 'connection.php';
        
        $statement = $pdo->query("SELECT instore_yn, COUNT(*) AS total FROM `sales_reciepts` WHERE instore_yn = 'Y'");
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        echo json_encode($result["total"], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
?>