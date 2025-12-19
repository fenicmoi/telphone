<?php
session_start();
header('Content-Type: application/json');

if (!isset($_SESSION['u_user'])) {
    die(json_encode(["success" => 0, "error" => "Unauthorized"]));
}

include '../connection/StartConnect.php';

$u_user = $_SESSION['u_user'];
$u_pass = $_POST['u_pass'];

$sql = "UPDATE user SET u_pass = ? WHERE u_user = ?";
$result = dbQueryPrepared($sql, [$u_pass, $u_user]);

if ($result) {
    $success = 1;
} else {
    $success = 0;
}

echo json_encode(["success" => $success]);
?>