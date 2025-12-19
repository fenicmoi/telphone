<?php
session_start();
header('Content-Type: application/json');

if (!isset($_SESSION['u_user'])) {
    die(json_encode(["success" => 0, "error" => "Unauthorized"]));
}

include '../connection/StartConnect.php';

$u_user = $_SESSION['u_user'];
$test = $_POST['oldPassword'];

$sql = "SELECT * FROM user WHERE u_user = ? AND u_pass = ?";
$result = dbQueryPrepared($sql, [$u_user, $test]);
$numrow = dbNumRows($result);

if ($numrow <> 0) {
    $msg = 1;
} else {
    $msg = 0;
}

echo json_encode(["success" => $msg]);
?>