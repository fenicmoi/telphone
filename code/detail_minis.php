<?
		if(($recal=='recal') && ($edit_dep_fi!=NULL))    
		{       
		
					$dn_sql="SELECT * FROM ministry WHERE  m_name='$edit_dep_fi' AND m_impo='$edit_dep_im'";
					$dn_num=mysql_num_rows(mysql_query($dn_sql));
					if ($dn_num<1)
					{
							//  �ӡ�� update ����˹��§ҹ
							$updep_sql="UPDATE ministry SET  m_name='$edit_dep_fi'  , m_impo='$edit_dep_im'  WHERE m_id='$m_id'";
							$updep_result=mysql_query($updep_sql);

							?><script language="javascript">
							alert("��� ������  ���º��������"); 
							</script> <?
					
					}
		}
					
									//  ���¡�٢�����
									$d_sql="SELECT * FROM ministry WHERE  m_id='$m_id' ";
									$d_row=mysql_fetch_array(mysql_query($d_sql));
												$m_name=$d_row["m_name"];
												$m_impo=$d_row["m_impo"];

?>