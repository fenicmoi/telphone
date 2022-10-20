<?php
		
					
	include '../connection/StartConnect.php';
	$re_sql="SELECT * FROM respon  WHERE res_id='$res_id' ";		
	$re_result=dbQuery($re_sql);
	$re_num=dbNumRows($re_result);
		if ($re_num>0)
			{
				$re_row=dbFetchArray($re_result);
						$res_user=$re_row["res_user"];
						$res_dep=$re_row["res_dep"];


									//  ������ User
										$ur_sql="SELECT * FROM user WHERE  u_user='$res_user' ";
										$ur_num=dbNumRows(dbQuery($ur_sql));

									if ($ur_num>0)
									{
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
									if ($depd_num>0)
									{
										$depd_row=dbFetchArray(dbQuery($depd_sql));
											$depd_name=$depd_row["dep_name"];
									}
			}
?>