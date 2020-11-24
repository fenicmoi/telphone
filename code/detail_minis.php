<?
		if(($recal=='recal') && ($edit_dep_fi!=NULL))    
		{       
		
					$dn_sql="SELECT * FROM ministry WHERE  m_name='$edit_dep_fi' AND m_impo='$edit_dep_im'";
					$dn_num=mysql_num_rows(mysql_query($dn_sql));
					if ($dn_num<1)
					{
							//  ทำการ update ชื่อหน่วยงาน
							$updep_sql="UPDATE ministry SET  m_name='$edit_dep_fi'  , m_impo='$edit_dep_im'  WHERE m_id='$m_id'";
							$updep_result=mysql_query($updep_sql);

							?><script language="javascript">
							alert("แก้ไข ข้อมูล  เรียบร้อยแล้ว"); 
							</script> <?
					
					}
		}
					
									//  เรียกดูข้อมูล
									$d_sql="SELECT * FROM ministry WHERE  m_id='$m_id' ";
									$d_row=mysql_fetch_array(mysql_query($d_sql));
												$m_name=$d_row["m_name"];
												$m_impo=$d_row["m_impo"];

?>