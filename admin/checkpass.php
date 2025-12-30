<?php
session_start();
header('Content-Type: application/json');

if (!isset($_SESSION['u_user'])) {
    die(json_encode(["success" => 0, "error" => "Unauthorized"]));
}

include '../connection/StartConnect.php';

$u_user = $_SESSION['u_user'];
$test = $_POST['oldPassword'];

// Fetch hashed password from DB
$sql = "SELECT u_pass FROM user WHERE u_user = ?";
$result = dbQueryPrepared($sql, [$u_user]);
$u_row = dbFetchArray($result);

$msg = 0;
if ($u_row) {
    if (password_verify($test, $u_row['u_pass']) || $test === $u_row['u_pass']) {
        $msg = 1;
    }
}

echo json_encode(["success" => $msg]);
?>