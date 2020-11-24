<?
// หา ID ของ user
									$user_sql="SELECT * FROM user WHERE  u_user='$u_user'  ";
									$user_result=mysql_query($user_sql);
									$user_num=mysql_num_rows($user_result);
									if ($user_num>0)
									{
											while($user_row=mysql_fetch_array($user_result))
											{			$u_id=$user_row["u_id"];		}
									}

	echo"<table width=950 border=1  cellpadding=0 cellspacing=0 bordercolor=#8B7B8C >";
	
	$res_sql="SELECT * FROM respon  WHERE  res_user='$u_user'  ORDER BY  res_dep ";
	$res_result=mysql_query($res_sql);
	$res_num=mysql_num_rows($res_result);
	if ($res_num>0)
	{
					while($res_row=mysql_fetch_array($res_result))
					{
									$res_dep=$res_row["res_dep"];

									//ชื่อ หน่วยงาน
										$d_sql="SELECT * FROM depart  WHERE  dep_id='$res_dep' ";
										$d_result=mysql_query($d_sql);
										$d_num=mysql_num_rows($d_result);
										if ($d_num>0)
										{
											$d_row=mysql_fetch_array($d_result);
														$d_name=$d_row["dep_name"];

														echo"<tr height=25 bgcolor=#9966FF ><td colspan=10><B><FONT  COLOR=FFFFFF>ลำดับ</FONT></B></td>";
														echo"<td colspan=190><strong><div align=left><FONT COLOR=FFFFFF  SIZE=3>$d_name </FONT></strong></div></td>";
														echo"<td colspan=240><B><FONT  COLOR=FFFFFF>ที่ตั้งหน่วยงาน</FONT></B></td>";
														echo"<td colspan=160><B><FONT COLOR=FFFFFF>หมายเลขโทรศัพท์</FONT></B></td>";
														echo"<td colspan=250><B><FONT  COLOR=FFFFFF>website / e-mail</FONT></B></td>";
														echo"<td colspan=100><B><FONT  COLOR=FFFFFF>";
													?> <a href="javascript:popup('../admin/insert_head.php?dep_id=<? echo "$res_dep";?>&u_id=<? echo "$u_id";?>','',850,750)" >เพิ่มผู้บริหาร หน่วยงาน</a> <?
														echo"</FONT></B></td></tr>";
	
														// ข้อมูลหัวหน้าส่วน
																$g_sql="SELECT * FROM govern WHERE  g_dep='$res_dep' ORDER BY g_impo ASC";
																$g_result=mysql_query($g_sql);
																$g_num=mysql_num_rows($g_result);
																	if ($g_num>0)
																	{
																		while($g_row=mysql_fetch_array($g_result))
																		{
																			$g_id=$g_row["g_id"];
																			$g_impo=$g_row["g_impo"];
																			$g_position=$g_row["g_position"];
																			$g_head_th=$g_row["g_head_th"];
																			$g_add=$g_row["g_add"];
																			$g_phone=$g_row["g_phone"];
																			$g_email=$g_row["g_email"];
																			$g_web=$g_row["g_web"];
																				echo"<tr valign=top bgcolor=#FFFFFF><td colspan=10><div align=center>$g_impo </div></td><td colspan=190><div align=left> &nbsp;&nbsp;<B><FONT  COLOR=006600>$g_position</FONT></B> <BR>  &nbsp;&nbsp; $g_head_th<BR><BR></div></td>";

																				echo"<td colspan=240><div align=left>$g_add </div></td>";
																				echo"<td colspan=160><div align=left>$g_phone </div></td>";
																				echo"<td colspan=250><div align=left>$g_web <BR>$g_email</div></td>";
																				echo"<td colspan=100><div align=center>";
											?><A HREF="edit_form.php?g_id=<? echo "$g_id";?>" target="_parent"><FONT SIZE="2" COLOR="red">แก้ไข</FONT>	</A><?
																				echo" | ";


																				
											?>  <a href=# onclick="if (confirm('คุณต้องการ  ลบ  ข้อมูลผู้บริหารหน่วยงาน ที่เลือก ?')) location.href='show_data.php?g_id=<? echo "$g_id";?>&ac=<? echo "del";?>';"><FONT SIZE="2" COLOR="red">ลบ</FONT></a><?														
																				echo"</div></td></tr>";

																		}
																	}
														// สิ้นสุด การแสดง ข้อมูลหัวหน้าส่วน


										}
					}
	}

	else     //กรณีไม่มี ข้อมูลที่ต้องรับผิดชอบ
	{
				echo"<tr height=25 bgcolor=#FFFFCC><td colspan=950><div align=center><strong><FONT COLOR=red>ไม่พบข้อมูล  ที่อยู่ในความรับผิดชอบ</FONT></strong></div></td></tr>";
	}

echo"</table>";

?>