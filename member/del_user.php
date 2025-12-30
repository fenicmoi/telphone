<?php

header('Content-Type: application/json');  // ใช้ในกรณีต้องการรับค่าเป็น json
include '../connection/StartConnect.php';

session_start();
if (!isset($_SESSION['u_user'])) {
    die(json_encode(["success" => 0, "error" => "Unauthorized"]));
}

$g_id = $_POST['g_id'];

$sql = "DELETE FROM govern WHERE g_id = ?";
$result = dbQueryPrepared($sql, [$g_id]);

if ($result) {
    $success = 1;
} else {
    $success = 0;
}

$result = array("success" => $success, "sql" => $sql);

echo json_encode($result);

?>