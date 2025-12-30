<?php
include "../connection/StartConnect.php";

header('Content-Type: application/json');

if (isset($_POST['d_name'])) {
    $d_name = trim($_POST['d_name']);

    // Check for duplicate department name
    $sql = "SELECT dep_id FROM depart WHERE dep_name = ?";
    $result = dbQueryPrepared($sql, [$d_name]);

    if (dbNumRows($result) > 0) {
        echo json_encode(['exists' => true]);
    } else {
        echo json_encode(['exists' => false]);
    }
} else {
    echo json_encode(['error' => 'No department name provided']);
}
?>