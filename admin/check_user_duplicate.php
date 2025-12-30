<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
header('Content-Type: application/json');

if (!isset($_SESSION['u_user']) || $_SESSION['u_type'] !== 'a') {
    die(json_encode(["exists" => false, "error" => "Unauthorized"]));
}

include '../connection/StartConnect.php';

$u_user = isset($_POST['u_user']) ? $_POST['u_user'] : '';

if (!empty($u_user)) {
    $sql = "SELECT COUNT(*) as count FROM user WHERE u_user = ?";
    $result = dbQueryPrepared($sql, [$u_user]);
    $row = dbFetchArray($result);

    if ($row['count'] > 0) {
        echo json_encode(["exists" => true]);
    } else {
        echo json_encode(["exists" => false]);
    }
} else {
    echo json_encode(["exists" => false]);
}
?>