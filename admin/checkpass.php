<?php

header('Content-Type: application/json');  // ใช้ในกรณีต้องการรับค่าเป็น json
include '../connection/StartConnect.php';

//$result = array("success" => $_POST["oldPassword"],);
$test = $_POST['oldPassword'];

$sql = "SELECT * FROM user WHERE u_pass = '$test'";
$numrow = dbNumRows(dbQuery($sql));
if($numrow<>0){
    $msg = 1 ;
}else{
    $msg = 0;
}




$result = array("success" => $msg,);

echo json_encode($result);

?>