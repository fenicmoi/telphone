<?php
if (isset($_POST["btnInsert"])) {
	$dep_minis = $_POST["selMinis"];
	$dep_name = $_POST["d_name"];
	$dep_impo = $_POST["d_impo"];

	$chd_sql = "SELECT * FROM depart WHERE dep_name = ?";
	$chd_res = dbQueryPrepared($chd_sql, [$dep_name]);
	$chd_num = dbNumRows($chd_res);
	if ($chd_num > 0) {
		echo "<script>
						Swal.fire({
							title: 'ข้อมูลซ้ำ!',
							text: 'ระบบมีชื่อหน่วยงานนี้แล้ว!',
							icon: 'error',
							confirmButtonText: 'ok',
						});
					</script>";
	} else {
		$add_sql = "INSERT INTO depart(dep_minis,dep_impo,dep_name) VALUES (?, ?, ?)";
		$add_result1 = dbQueryPrepared($add_sql, [$dep_minis, $dep_impo, $dep_name]);
		if ($add_result1) {
			echo "<script>
						Swal.fire({
							title: 'สำเร็จ!',
							text: 'บันทึกข้อมูลเรียบร้อยแล้ว',
							icon: 'success',
							confirmButtonText: 'ok',
						}).then(() => { window.location.href='dep_add.php'; });
					</script>";
		} else {
			echo "<script>
							Swal.fire({
								title: 'ผิดพลาด!',
								text: 'บันทึกข้อมูลไม่สำเร็จ!',
								icon: 'error',
								confirmButtonText: 'ok!',
							});
						</script>";
		}//check fquery
	}//check data
}//btnSearch

?>