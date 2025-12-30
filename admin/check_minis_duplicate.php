<?php
include "../connection/StartConnect.php";

header('Content-Type: application/json');

if (isset($_POST['m_name'])) {
    $m_name = trim($_POST['m_name']);

    // Check for duplicate ministry name
    $sql = "SELECT m_id FROM ministry WHERE m_name = ?";
    $result = dbQueryPrepared($sql, [$m_name]);

    if (dbNumRows($result) > 0) {
        echo json_encode(['exists' => true]);
    } else {
        echo json_encode(['exists' => false]);
    }
} else {
    echo json_encode(['error' => 'No ministry name provided']);
}
?>