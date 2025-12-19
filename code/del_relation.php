<?php
	//header('Content-Type: application/json');

	@$res_id=$_GET['res_id'];
	$sql=" DELETE FROM respon WHERE res_id=$res_id";

	if($res_id<>''){
		echo "<script>console.log('$res_id');</script>";
	}else{
		echo "<script>console.log('no data');</script>";
	}


	
	$query = dbQuery($sql);
	if($query) {
		echo json_encode(array('status' => '1','message'=> 'บันทึกข้อมูลแล้ว'));
		echo "<script>console.log('yes');</script>";
	}else{
		echo json_encode(array('status' => '0','message'=> 'มีบางอย่างผิดพลาด!'));
		echo "<script>console.log('error');</script>";
	}
	

?>

