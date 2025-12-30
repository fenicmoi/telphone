<?php
if (isset($_GET['g_id']) && isset($_GET['ac']) && $_GET['ac'] == 'del') {
	$g_id = intval($_GET['g_id']);

	// Fetch picture path before deleting
	$dg_sql = "SELECT g_pic FROM govern WHERE g_id = ?";
	$dg_result = dbQueryPrepared($dg_sql, [$g_id]);
	$dg_row = dbFetchArray($dg_result);

	if ($dg_row && !empty($dg_row["g_pic"])) {
		$dg_pic = $dg_row["g_pic"];
		$file_path = "../image/pic_head/" . $dg_pic;
		if (file_exists($file_path)) {
			unlink($file_path);
		}
	}

	$Ddel_sql = "DELETE FROM govern WHERE g_id = ?";
	$result = dbQueryPrepared($Ddel_sql, [$g_id]);
	if ($result) {
		echo "<script>
            Swal.fire('เรียบร้อย!', 'ลบข้อมูลผู้บริหารเรียบร้อยแล้ว!', 'success').then(() => {
                window.location.replace('head_add.php');
            });
        </script>";
	}
}
?>