<?php
$usee_sql = "SELECT * FROM user WHERE u_type = 'u' ORDER BY u_user";
$usee_result = dbQuery($usee_sql);
$usee_num = dbNumRows($usee_result);

if ($usee_num > 0) {
	while ($usee_row = dbFetchArray($usee_result)) {
		$ur_user = $usee_row["u_user"];
		$u_prefix = $usee_row["u_prefix"];
		$u_name = $usee_row["u_name"];
		$u_last = $usee_row["u_last"];
		$u_dep_id = $usee_row["u_dep_id"];

		$pre_name = "-";
		$presee_sql = "SELECT pre_name FROM prefix WHERE pre_id = ?";
		$presee_result = dbQueryPrepared($presee_sql, [$u_prefix]);
		$presee_row = dbFetchArray($presee_result);
		if ($presee_row) {
			$pre_name = $presee_row["pre_name"];
		}

		$dep_name = "ไม่พบหน่วยงาน";
		$depsee_sql = "SELECT dep_name FROM depart WHERE dep_id = ?";
		$depsee_result = dbQueryPrepared($depsee_sql, [$u_dep_id]);
		$depsee_row = dbFetchArray($depsee_result);
		if ($depsee_row) {
			$dep_name = $depsee_row["dep_name"];
		}
		?>
		<option value="<?php echo htmlspecialchars($ur_user); ?>">
			<?php echo htmlspecialchars($ur_user . " ---- " . $pre_name . $u_name . " " . $u_last . " ----- " . $dep_name); ?>
		</option>
		<?php
	}
} else {
	?>
	<option value="0">NoData</option>
	<?php
}
?>