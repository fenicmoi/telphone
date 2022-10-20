<?php
	$dt_sql="SELECT * FROM depart Order By dep_id DESC limit 0,3";
	$dt_result=dbQuery($dt_sql);
	$dt_num=dbNumRows($dt_result);
	if ($dt_num>0){?>
		<br>
		<div class="card">
			<div class="card-header text-white bg-secondary">
				หน่วยงานเพิ่มใหม่ 3 อันดับ
			</div>
			<div class="card-body">
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>ชื่อหน่วยงาน</th>
							<th>สังกัด</th>
						</tr>
					</thead>
					<tbody> <?php
						while($dt_row=dbFetchArray($dt_result)){
							echo "<tr>";
							$dt_name=$dt_row["dep_name"];
							$dt_minis=$dt_row["dep_minis"];
							$st_sql="SELECT * FROM ministry WHERE  m_id='$dt_minis' ";
							$st_row=dbFetchArray($st_result=dbQuery($st_sql));
							$st_name=$st_row["m_name"];
							echo "<td>".$dt_name."</td><td>".$st_name."</td>";
							echo "</tr>";
						}
					?></tbody>
				</table>
			</div>
		</div><?php
	}
?>