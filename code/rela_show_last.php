<table class="table table-bordered">
	<thead>
		<th>ลำดับที่</th>
		<th>User ที่ผูกสิทธิ์ล่าสุด</th>
		<th>ข้อมูลที่รับผิดชอบ</th>
	</thead>
	<tbody>
		<?php

		$relast_sql = "SELECT * FROM respon ORDER BY res_id DESC LIMIT 3";
		$i = 1;
		$relast_result = dbQuery($relast_sql);
		$relast_num = dbNumRows($relast_result);
		if ($relast_num > 0) {
			while ($relast_row = dbFetchArray($relast_result)) {
				$resl_id = $relast_row["res_id"];
				$resl_user = $relast_row["res_user"];
				$resl_dep = $relast_row["res_dep"];

				$prerl_name = '';
				$url_name = '';
				$url_last = '';
				$deprl_name = '';
				$depdl_name = '';

				// User details
				$url_sql = "SELECT * FROM user WHERE u_user = ?";
				$url_result = dbQueryPrepared($url_sql, [$resl_user]);
				$url_row = dbFetchArray($url_result);

				if ($url_row) {
					$url_prefix = $url_row["u_prefix"];
					$url_name = $url_row["u_name"];
					$url_last = $url_row["u_last"];
					$url_dep_id = $url_row["u_dep_id"];

					$prerl_sql = "SELECT * FROM prefix WHERE pre_id = ?";
					$prerl_result = dbQueryPrepared($prerl_sql, [$url_prefix]);
					$prerl_row = dbFetchArray($prerl_result);
					if ($prerl_row) {
						$prerl_name = $prerl_row["pre_name"];
					}

					$deprl_sql = "SELECT * FROM depart WHERE dep_id = ?";
					$deprl_result = dbQueryPrepared($deprl_sql, [$url_dep_id]);
					$deprl_row = dbFetchArray($deprl_result);
					if ($deprl_row) {
						$deprl_name = $deprl_row["dep_name"];
					}
				}

				// Responsibility department
				$depdl_sql = "SELECT * FROM depart WHERE dep_id = ?";
				$depdl_result = dbQueryPrepared($depdl_sql, [$resl_dep]);
				$depdl_row = dbFetchArray($depdl_result);
				if ($depdl_row) {
					$depdl_name = $depdl_row["dep_name"];
				}

				echo "<tr>";
				echo "<td align='center'>$i</td>";
				echo "<td><strong style='color: blue;'>$resl_user</strong> <span style='color: green;'>: $prerl_name$url_name $url_last</span></td>";
				echo "<td>$depdl_name</td>";
				echo "</tr>";

				$i = $i + 1;
			}
		}
		?>
	</tbody>
</table>