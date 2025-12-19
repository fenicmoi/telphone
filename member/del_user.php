<?php

header('Content-Type: application/json');  // ใช้ในกรณีต้องการรับค่าเป็น json
include '../connection/StartConnect.php';

$g_id = $_POST['g_id'];

$sql = "DELETE FROM  govern  WHERE  g_id  = '$g_id'";

$result = dbQuery($sql);
if($result){
    $success= 1; // update สำเร็จ
}else{
    $success = 0; // update ไม่สำเร็จ
    $sql = $sql;
}

$result = array("success" => $success,"sql" => $sql);

echo json_encode($result);

?>