<?php
$d_sql="SELECT * FROM depart WHERE  dep_minis='$minis2'  ORDER BY dep_impo ASC";
$d_result=dbQuery($d_sql);
$d_num=dbNumRows($d_result); ?>
<table class="table table-bordered">
	<thead>
		<tr>
		<th>ลำดับที่</th>
		<th>หน่วยงาน</th>
		<th>แก้ไข</th>
		<th>ลบ</th>
				</tr>
	</thead>
	<tbody>
<?php 
if ($d_num>0){

	while($d_row=dbFetchArray($d_result)){
		$dep_id=$d_row["dep_id"];?>
		<tr>
			<td><?php echo $d_row["dep_impo"];?></td>
			<td><?php echo $d_row["dep_name"];?></td>
			<td>
				<a class="btn btn-warning btn-sm" 
					href="#" 
					onclick="load_edit('<?php print $dep_id;?>');" 
					data-toggle="modal" 
					data-target="#modalEdit">
					<i class="fas fa-pencil-alt"></i> 
				</a> 
			</td>
			<td><a class="btn btn-danger btn-sm" href="?dep_id=<?php echo $dep_id;?>"><i class="fas fa-trash-alt"></i></a></td>
		</tr>
<?php 
	}
}	
?>
		<tr><td colspan="4">* การลบ "หน่วยงาน" จะทำให้ ข้อมูล "ผู้บริหาร" ของหน่วยงานนั้น และ "การผูกสิทธิ์" ถูกลบไปด้วย</td></tr>
	</tbody>
</table>
