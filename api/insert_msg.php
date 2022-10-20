<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control_Allow-Methods: *");
header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
header("Access-Control-Allow-Headers: Origin,Content-Type,X-Auth-Token,Authorizeation");

include './connection/StartConnect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $content = file_get_contents('php://input');
    $user = json_decode($content, true);

     $title = $user['title'];
     $detail = $user['detail'];
     $msg_date = date("Y-m-d");
     $status = 0;

    $sql="INSERT INTO massage (title, detail, msg_date, status) 
          VALUES  ('$title','$detail','$msg_date', $status)";

    $result = dbQuery($sql);

    if($result){
         $success = array('status'=>'ok', 'message' => 'เราได้รับข้อความแล้ว');
         echo json_encode( $success );

    }else{
        // echo json_encode( ['status' => 'error','message' => 'เกิดข้อผิดพลาดในการบันทึกข้อมูล'] );
         $error = array('status' => 'error', 'message' => 'มีบางอย่างผิดพลาด');
         echo json_encode($error);
    }


}else{

    $title= "hello";
    $detail="detail";
     $msg_date = date("Y-m-d");
     $status = 0;

     $sql="INSERT INTO massage (title, detail, msg_date, status) 
          VALUES  ('$title','$detail','$msg_date', $status)";

    $result = dbQuery($sql);
   
}
?>