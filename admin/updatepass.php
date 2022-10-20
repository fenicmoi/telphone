<?php

header('Content-Type: application/json');  // ใช้ในกรณีต้องการรับค่าเป็น json
include '../connection/StartConnect.php';

$u_user = $_POST['u_user'];
$u_pass = $_POST['u_pass'];

$sql = "UPDATE user SET u_pass = '$u_pass' WHERE u_user = '$u_user'";

$result = dbQuery($sql);
if($result){
    $success= 1; // update สำเร็จ
}else{
    $success = 0; // update ไม่สำเร็จ
}

$result = array("success" => $success,);

echo json_encode($result);



?>