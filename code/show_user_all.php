
<table class="table table-striped" id="showAll">
	<thead>
		<tr>
			<th>ลำดับ</th>
			<th>username</th>
			<th>ชื่อ-สกุล</th>
			<th>หน่วยงาน</th>
			<th>password</th>
			<th>แก้ไข</th>
			<th>ลบ</th>
		</tr>
	</thead>
	<tbody>
<?php
	$ua_sql ="SELECT u.*,p.pre_name,d.dep_name FROM user as u
			  INNER JOIN prefix as p ON p.pre_id = u.u_prefix
			  INNER JOIN depart as d ON d.dep_id = u.u_dep_id
			  ORDER BY u_user";
	$ua_result=dbQuery($ua_sql);
	$ua_num=dbNumRows(dbQuery($ua_sql));

if ($ua_num>0){
	$i=1;
	while($ua_row=dbFetchArray($ua_result)){?>
		<tr>
			<td><?=$i;?></td>
			<td><?php echo $ua_row["u_user"];?></td>
			<td><?php echo $ua_row["pre_name"]; echo $ua_row["u_name"];?>&nbsp;&nbsp;<?php echo $ua_row["u_last"];?></td>
			<td><?php echo $ua_row["dep_name"];?></td>
			<td><a href="?u_id=<?php echo $ua_row['u_id'];?>" class="btn btn-info btn-sm"><i class="fas fa-cog"></i> reset</a></td>
			<td>
				<a class="btn btn-warning btn-sm" 
						href="#" 
						onclick="load_edit('<?php echo $ua_row['u_id'];?>');" 
						data-toggle="modal" 
						data-target="#modalEdit">
					<i class="fas fa-pencil-alt"></i>  แก้ไข
				</a> 
			</td>
			<td><a href="?del_id=<?php echo $ua_row['u_id'];?>" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> ลบ</a></td>
		</tr>
    <?php 
		$i=$i+1;
	}
}else{
	echo "nodata";	
}	
?>
	</tbody>
</table>

<script>
$(document).ready(function() {
    $('#showAll').DataTable();
} );
</script>