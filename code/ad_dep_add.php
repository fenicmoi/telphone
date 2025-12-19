<?php
if(isset($_POST["btnInsert"])){
		$dep_minis = $_POST["selMinis"];
		$dep_name = $_POST["d_name"];
		$dep_impo = $_POST["d_impo"];

		$chd_sql="SELECT * FROM depart  WHERE  dep_name='$dep_name'  ";
		echo "<script>console.log('$chd_sql');</script>";
		$chd_num=dbNumRows(dbQuery($chd_sql));
			if ($chd_num>0){
				echo "<script>
						swal({
							title: 'ข้อมูลซ้ำ!',
							text: 'ระบบมีชื่อหน่วยงานนี้แล้ว!',
							icon: 'error',
							button: 'ok',
						});
					</script>";
			}else{
					$add_sql="INSERT INTO depart(dep_minis,dep_impo,dep_name) 
							  VALUES ('$dep_minis','$dep_impo','$dep_name')";
					$add_result1=dbQuery($add_sql);
					if($add_result1){
						echo "<script>
						swal({
							title: 'สำเร็จ!',
							text: 'บันทึกข้อมูลเรียบร้อยแล้ว',
							icon: 'success',
							button: 'ok',
						});
					</script>";
					}else{
						echo "<script>
							swal({
								title: 'ผิดพลาด!',
								text: 'บันทึกข้อมูลไม่สำเร็๗!',
								icon: 'error',
								button: 'ok!',
							});
						</script>";
					}//check fquery
			}//check data
}//btnSearch

?>