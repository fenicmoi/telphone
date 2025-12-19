<table class="table table-bordered">
	<thead>
		<th>ลำดับที่</th>
		<th>User ที่ผูกสิทธิ์ล่าสุด</th>
		<th>ข้อมูลที่รับผิดชอบ</th>
	</thead>
	<tbody>
<?php

	$relast_sql="SELECT * FROM respon  ORDER BY res_id  DESC  limit 0,3 ";		
	$i=1;
	$relast_result=dbQuery($relast_sql);
	$relast_num=dbNumRows($relast_result);
		if ($relast_num>0){
				while($relast_row=dbFetchArray($relast_result)){
						$resl_id=$relast_row["res_id"];
						$resl_user=$relast_row["res_user"];
						$resl_dep=$relast_row["res_dep"];

									//  ������ User
										$url_sql="SELECT * FROM user WHERE  u_user='$resl_user' ";
										$url_num=dbNumRows(dbQuery($url_sql));

									if ($url_num>0){
										$url_row=dbFetchArray(dbQuery($url_sql));
											$url_prefix=$url_row["u_prefix"];
											$url_name=$url_row["u_name"];
											$url_last=$url_row["u_last"];
											$url_dep_id=$url_row["u_dep_id"];

														$prerl_sql="SELECT * FROM prefix WHERE pre_id='$url_prefix' ";
														$prerl_row=dbFetchArray(dbQuery($prerl_sql));
														$prerl_name=$prerl_row["pre_name"];  

														$deprl_sql="SELECT * FROM depart WHERE dep_id='$url_dep_id' ";
														$deprl_row=dbFetchArray(dbQuery($deprl_sql));
														$deprl_name=$deprl_row["dep_name"];  
									}

								// ������  ˹��§ҹ
										$depdl_sql="SELECT * FROM depart WHERE  dep_id='$resl_dep' ";
										$depdl_num=dbNumRows(dbQuery($depdl_sql));
									if ($depdl_num>0){
										$depdl_row=dbFetchArray(dbQuery($depdl_sql));
											$depdl_name=$depdl_row["dep_name"];
									}
									echo"<tr height=25  >";
									echo"<td><div align=center>$i</div></td>";
									echo"<td><div align=left><FONT COLOR=0000FF SIZE=3><strong>$resl_user</strong></FONT>&nbsp;&nbsp;&nbsp;<FONT COLOR=336600> :   $prerl_name$url_name $url_last</FONT><BR>	</FONT></div></td>";
									echo"<td><div align=left><FONT  SIZE=2>$depdl_name</FONT></div></td></tr>";
				                    
									
									$i=$i+1;
					}
			}		
?>
</tbody>
</table>