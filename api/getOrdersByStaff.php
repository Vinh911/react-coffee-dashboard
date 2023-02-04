<?php
        header("Access-Control-Allow-Origin: *");
        header("Content-type: application/json");
        include 'connection.php';
        
        $statement = $pdo->query("SELECT sales_reciepts.staff_id, COUNT(*) AS total, staff.first_name, staff.last_name, staff.position FROM sales_reciepts JOIN staff ON sales_reciepts.staff_id = staff.staff_id GROUP BY sales_reciepts.staff_id ORDER BY COUNT(*) DESC");
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($result, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
?>