
<script>
function load_data(res_id){
	var res_id = res_id;
	$('#divDataview').load('./edit_relation.php?res_id='+res_id)
}


$(document).ready(function() {
    $('#user').DataTable();
} );

</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<table class="table table-bordered table-hover" id="user">
	<thead>
		<th>ลำดับ</th>
		<th>User</th>
		<th>ข้อมูลที่รับผิดชอบ</th>
		<th>แก้ไข</th>
		<th>ลบ</th>
	</thead>
	<tbody>
<?php

$ser = isset($_GET['ser']) ? $_GET['ser'] : 'u';
$order_by = ($ser == 'd') ? 'res_dep' : 'res_user';
	
$re_sql="SELECT * FROM respon  ORDER BY $order_by ";			

$i=1;
	$re_result=dbQuery($re_sql);
	$re_num=dbNumRows($re_result);
		if ($re_num>0){
				while($re_row=dbFetchArray($re_result)){
						$res_id=$re_row["res_id"];
						$res_user=$re_row["res_user"];
						$res_dep=$re_row["res_dep"];

									//  User
										$ur_sql="SELECT * FROM user WHERE  u_user='$res_user' ";
										$ur_num=dbNumRows(dbQuery($ur_sql));

									if ($ur_num>0){
										$ur_row=dbFetchArray(dbQuery($ur_sql));
											$ur_prefix=$ur_row["u_prefix"];
											$ur_name=$ur_row["u_name"];
											$ur_last=$ur_row["u_last"];
											$ur_dep_id=$ur_row["u_dep_id"];

														$prer_sql="SELECT * FROM prefix WHERE pre_id='$ur_prefix' ";
														$prer_row=dbFetchArray(dbQuery($prer_sql));
														$prer_name=$prer_row["pre_name"];  

														$depr_sql="SELECT * FROM depart WHERE dep_id='$ur_dep_id' ";
														$depr_row=dbFetchArray(dbQuery($depr_sql));
														$depr_name=$depr_row["dep_name"];  
									}

								// ������  ˹��§ҹ
										$depd_sql="SELECT * FROM depart WHERE  dep_id='$res_dep' ";
										$depd_num=dbNumRows(dbQuery($depd_sql));
									if ($depd_num>0){
										$depd_row=dbFetchArray(dbQuery($depd_sql));
											$depd_name=$depd_row["dep_name"];
									}?>
									<tr>
										<td><?=$i?></td>
										<td><font color="blue"><?=$res_user?></font>:<?=$prer_name?><?=$ur_name?>&nbsp&nbsp<?=$ur_last?>&nbsp&nbsp&nbspสังกัด:<?=$depr_name?></td>
										<td><?=$depd_name?></td>
										<td>
										<?php // echo "thisis"+ $res_id;?>
											<a
												href="#" 
												class="btn btn-warning btn-sm"
												onclick="load_data('<?=$res_id;?>')"
												data-toggle="modal" 
												data-target="#editRelation">
												แก้ไข 
											</a>
										</td>
										<td>
											<a href="?delItem=<?=$res_id;?>" class="btn btn-outline-primary btn-sm" id="delItem" name="delItem">ลบ</a>

											
											<!-- <button 
													type="button" 
													class="btn btn-outline-primary btn-sm " 
													id="deleteItem"
													name="deleteItem"
													>ลบ
											</button> -->
										</td>
									</tr>

									<?php

									$i=$i+1;
				} //while
		} else {
			echo '<tr><td colspan="5" class="text-center">ไม่มีข้อมูลสิทธิ์การกำหนด</td></tr>';
		} //if
?>
</tbody>
</table>


<!-- แสดงรายละเอียด -->
  <div class="modal fade" id="editRelation">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header bg-warning">
          <span class="modal-title"><i class="fas fa-edit"></i> แก้ไข</span>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <div id="divDataview">
			<!-- ส่วนแสดงผล Model -->
		  </div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>





<?php


if(isset($_POST['btnUpdate'])){
	$u_dep=$_POST['u_dep'];
	$ur_user=$_POST['ur_user'];
	$res_id=$_POST['res_id'];

	$sql = "UPDATE respon SET res_user = '$ur_user',res_dep = '$u_dep' WHERE res_id = $res_id ";
	$result = dbQuery($sql);
	if($result){
		echo "<script>
					Swal.fire(
							'Good job!',
							'อัพเดทข้อมูลแล้ว!',
							'success'
					)
					window.location.replace('../admin/user_relation.php');
			  </script>";
	}else{
			echo "<script>
					Swal.fire(
							'Not work!',
							'มีบางอย่างผิดพลาด!',
							'error'
							)
					window.location.replace('../admin/user_relation.php');
			  </script>";
	}


	
   
}
?>			