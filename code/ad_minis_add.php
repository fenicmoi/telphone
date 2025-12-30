<?php    ### ส่วนเพิ่มกระทรวง
session_start();
if (!isset($_SESSION['u_user']) || $_SESSION['u_type'] !== 'a') {
	exit('Unauthorized');
}

$recal = isset($_GET['recal']) ? $_GET['recal'] : '';
$a_dep = isset($_POST['a_dep']) ? $_POST['a_dep'] : null;
$a_impo = isset($_POST['a_impo']) ? $_POST['a_impo'] : 0;

if (($recal == 'recal') && ($a_dep != null)) {
	$chd_sql = "SELECT * FROM ministry WHERE m_name = ?";
	$chd_result = dbQueryPrepared($chd_sql, [$a_dep]);
	$chd_num = dbNumRows($chd_result);
	if ($chd_num > 0) { ?>
		<script language="javascript">
			alert("ไม่สามารถเพิ่มได้ เนื่องจากมีชื่อนี้อยู่ในระบบแล้ว");
		</script>
	<?php } else {
		$add_sql = "INSERT INTO ministry (m_impo, m_name) VALUES (?, ?)";
		$add_result1 = dbQueryPrepared($add_sql, [$a_impo, $a_dep]);
		?>
		<script language="javascript">
			alert("เพิ่มเติมข้อมูลแล้ว");
		</script>
	<?php }
}
?>