
<br/><br/>
<?
	echo"<table class='table table-bordered'>";
	
	$res_sql="SELECT * FROM respon  WHERE  res_user='$u_id'  ORDER BY  res_dep ";
	$res_result=dbQuery($res_sql);
	$res_num=dbNumRows($res_result);
	if ($res_num>0)
	{
			echo"<tr height=25 bgcolor=#9966FF ><td colspan=20><strong><div align=center><FONT COLOR=FFFFFF  SIZE=3>ที่</FONT></strong></div></td><td colspan=700><strong><div align=center><FONT COLOR=FFFFFF  SIZE=3>ชื่อหน่วยงาน</FONT></strong></div></td><td colspan=180><strong><div align=center><FONT COLOR=FFFFFF  SIZE=3>กระทรวง</FONT></strong></div></td><td colspan=50><strong><div align=center><FONT COLOR=FFFFFF  SIZE=3>แก้ไข</FONT></strong></div></td></tr>";
				$i=1;
					while($res_row=dbFetchArray($res_result))
					{
									$res_dep=$res_row["res_dep"];

									//���� ˹��§ҹ
										$d_sql="SELECT * FROM depart  WHERE  dep_id='$res_dep' ";
										$d_result=dbQuery($d_sql);
										$d_num=dbNumRows($d_result);
										if ($d_num>0)
										{
											$d_row=dbFetchArray($d_result);
														$d_name=$d_row["dep_name"];
														$m_id=$d_row["dep_minis"];

										$m_sql="SELECT * FROM ministry  WHERE  m_id='$m_id' ";
										$m_result=dbQuery($m_sql);
										$m_num=dbNumRows($m_result);
										if ($m_num>0)
										{
											$m_row=dbFetchArray($m_result);
														$m_name=$m_row["m_name"];
										}
										else
										{
														$m_name="����к�";
										}

									echo"<tr height=25  ><td colspan=20><strong><div align=center><FONT  SIZE=3>$i</FONT></strong></div></td>";
									echo"<td colspan=700><strong><div align=left><FONT  SIZE=3>$d_name</FONT></strong></div></td>";
									echo"<td colspan=180><strong><div align=left><FONT  SIZE=3>$m_name</FONT></strong></div></td>";
									echo"<td colspan=50><strong><div align=center>";
?> <a class="btn btn-warning btn-sm" disabled href="javascript:popup('edit_dep_minis.php?g_dep=<? echo "$res_dep";?>','',850,250)" ><i class="fa fa-edit"></i> แก้ไข</a> <?
									echo"</strong></div></td></tr>";
									
									$i=$i+1;

									}
					}
	}

	else     //�ó������ �����ŷ���ͧ�Ѻ�Դ�ͺ
	{
				echo"<tr height=25 bgcolor=#FFFFCC><td colspan=950><div align=center><strong><FONT COLOR=red>ไม่มีข้อมูล</FONT></strong></div></td></tr>";
	}

echo"</table>";

?>