<?
		if(($recal=='recal') && ($u_prefix!=NULL) && ($u_name!=NULL) && ($u_last!=NULL) && ($u_dep!=NULL) && ($u_dep!='0'))    
		{       
					$dn_sql="SELECT * FROM user  WHERE  u_user='$ua_user'  AND u_type='$u_type' AND u_prefix='$u_prefix' AND u_name='$u_name' AND u_last='$u_last' AND u_dep_id='$u_dep'";
					$dn_num=mysql_num_rows(mysql_query($dn_sql));
					if ($dn_num<1)
					{
							//  ทำการ update User
							$updep_sql="UPDATE user SET  u_type='$u_type'  ,  u_prefix='$u_prefix'  ,  u_name='$u_name' , u_last='$u_last'  , u_dep_id='$u_dep' WHERE u_user='$ua_user'";
							$updep_result=mysql_query($updep_sql);

							?><script language="javascript">
							alert("แก้ไข ข้อมูล  เรียบร้อยแล้ว"); 
							</script> <?
					
					}
		}
					
									//  เรียกดูข้อมูล
$u_sql="SELECT * FROM user WHERE  u_user='$ua_user' ";
$u_row=mysql_fetch_array(mysql_query($u_sql));
		$u_type=$u_row["u_type"];
		$u_prefix=$u_row["u_prefix"];
		$u_name=$u_row["u_name"];
		$u_last=$u_row["u_last"];
		$u_dep_id=$u_row["u_dep_id"];

					$prea_sql="SELECT * FROM prefix WHERE pre_id='$u_prefix' ";
					$prea_row=mysql_fetch_array(mysql_query($prea_sql));
					$prea_name=$prea_row["pre_name"];  

					$depa_sql="SELECT * FROM depart WHERE dep_id='$u_dep_id' ";
					$depa_row=mysql_fetch_array(mysql_query($depa_sql));
					$depa_name=$depa_row["dep_name"];  

?>