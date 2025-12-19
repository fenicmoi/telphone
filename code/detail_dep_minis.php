<?
		if(($recal=='recal') && ($edit_dep_fi!=NULL))    
		{       
		
					$dn_sql="SELECT * FROM depart WHERE  dep_name='$edit_dep_fi' AND dep_minis='$minis' AND dep_impo='$a_d_impo' ";
					$dn_num=mysql_num_rows(mysql_query($dn_sql));
					if ($dn_num<1)
					{
							//  ทำการ update ชื่อหน่วยงาน
							$updep_sql="UPDATE depart SET dep_minis='$minis' ,dep_impo='$a_d_impo'  ,dep_name='$edit_dep_fi'    WHERE dep_id='$g_dep'";
							$updep_result=mysql_query($updep_sql);

							?><script language="javascript">
							alert("แก้ไข ข้อมูลหน่วยงาน  เรียบร้อยแล้ว"); 
							</script> <?
					
					}
		}
					
									//  เรียกดูข้อมูล
									$d_sql="SELECT * FROM depart WHERE  dep_id='$g_dep' ";
									$d_row=mysql_fetch_array(mysql_query($d_sql));
												$d_impo=$d_row["dep_impo"];
												$d_name=$d_row["dep_name"];
												$d_minis=$d_row["dep_minis"];

									$s_sql="SELECT * FROM ministry WHERE  m_id='$d_minis' ";
									$s_row=mysql_fetch_array(mysql_query($s_sql));
												$s_name=$s_row["m_name"];

?>