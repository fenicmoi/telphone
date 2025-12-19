<?
echo"<table  x:str  border=1  cellpadding=0 cellspacing=0 bordercolor=#8B7B8C >";
echo"<tr height=50><td bgcolor=#99FFFF colspan=5><div align=center><strong><FONT COLOR=000000 SIZE=4 >รายนามหัวหน้าส่วนราชการ รัฐวิสาหกิจ องค์กรปกครองส่วนท้องถิ่น องค์กรเอกชน จังหวัดตรัง </FONT></strong></div></td></tr>";



 //  สังกัด
$m_sql="SELECT * FROM ministry ORDER BY m_impo";
$m_result=mysql_query($m_sql);
$m_num=mysql_num_rows($m_result);
	if ($m_num>0)
	{
		while($m_row=mysql_fetch_array($m_result))
		{
			$m_id=$m_row["m_id"];
			$m_name=$m_row["m_name"];
			echo"<tr  height=30 ><td bgcolor=#CC66FF colspan=5><div align=center><strong><FONT COLOR=000000 SIZE=2 >$m_name </FONT></strong></div></td></tr>";

			
//  หน่วยงาน
			$d_sql="SELECT * FROM depart WHERE  dep_minis='$m_id' ORDER BY dep_impo ASC";
			$d_result=mysql_query($d_sql);
			$d_num=mysql_num_rows($d_result);
			if ($d_num>0)
			{
				while($d_row=mysql_fetch_array($d_result))
				{
					$dep_id=$d_row["dep_id"];
					$dep_name=$d_row["dep_name"];
					echo"<tr >";
					echo"<td bgcolor=#FFFFCC><strong><div align=left><FONT COLOR=000000 SIZE=2 >$dep_name </FONT></div></strong></td>";
					echo"<td bgcolor=#FFFFCC><strong><div align=center><FONT COLOR=000000 SIZE=2 >ที่ตั้งหน่วยงาน</FONT></div></strong></td>";
					echo"<td bgcolor=#FFFFCC><strong><div align=center><FONT COLOR=000000 SIZE=2 >หมายเลขโทรศัพท์</FONT></div></strong></td>";
					echo"<td bgcolor=#FFFFCC><strong><div align=center><FONT COLOR=000000 SIZE=2 >Website / e-mail</FONT></div></strong></td>";					
					echo"<td bgcolor=#FFFFCC><strong><div align=center><FONT COLOR=000000 SIZE=2 >ปรับปรุงล่าสุด</FONT></div></strong></td>";
					echo"</tr>";


//  หัวหน้าส่วน
					$g_sql="SELECT * FROM govern WHERE  g_dep='$dep_id'  ORDER BY g_impo ASC";
					$g_result=mysql_query($g_sql);
					$g_num=mysql_num_rows($g_result);
					if ($g_num>0)
					{
						while($g_row=mysql_fetch_array($g_result))
						{
							$g_id=$g_row["g_id"];
							$g_position=$g_row["g_position"];
							$g_head_th=$g_row["g_head_th"];
							$g_add=$g_row["g_add"];
							$g_phone=$g_row["g_phone"];
							$g_hotline=$g_row["g_hotline"];
							$g_fax=$g_row["g_fax"];
							$g_mobile=$g_row["g_mobile"];
							$g_email=$g_row["g_email"];
							$g_web=$g_row["g_web"];
							$g_update=$g_row["g_update"];
							$g_upbyuser=$g_row["g_upbyuser"];

							echo"<tr valign=top >";
							echo"<td ><div align=left> &nbsp;&nbsp;<B><FONT  COLOR=006600>$g_position</FONT></B> <BR>  &nbsp;&nbsp; $g_head_th<BR><BR></div></td>";
							echo"<td ><div align=left>$g_add </div></td>";
							echo"<td ><div align=left>$g_phone"; 
							if ($g_hotline!=NULL)
							{
								echo"<BR>มท. $g_hotline";
							}

							echo"<BR>แฟกซ์ $g_fax<BR>มือถือ $g_mobile<BR><BR></div></td>";
							echo"<td ><div align=left>$g_web <BR>$g_email</div></td>";

			
			//  ผู้กรอกข้อมูล
								$g_sql2="SELECT * FROM user WHERE  u_id='$g_upbyuser'  ";
								$g_result2=mysql_query($g_sql2);
								$g_num2=mysql_num_rows($g_result2);
								if ($g_num2>0)
								{
									while($g_row2=mysql_fetch_array($g_result2))
									{
										$u_pre=$g_row2["u_prefix"];
										$u_name=$g_row2["u_name"];
										$u_last=$g_row2["u_last"];
										$u_dept=$g_row2["u_dep_id"];
													// หาคำนำหน้าชื่อ
													$g_sql3="SELECT * FROM prefix WHERE  pre_id='$u_pre'  ";
													$g_result3=mysql_query($g_sql3);
													$g_num3=mysql_num_rows($g_result3);
													if ($g_num3>0)
													{
														while($g_row3=mysql_fetch_array($g_result3))
														{						$pre_name=$g_row3["pre_name"];							}
													}

													// หาสังกัดของ user
													$g_sql4="SELECT * FROM depart WHERE  dep_id='$u_dept'  ";
													$g_result4=mysql_query($g_sql4);
													$g_num4=mysql_num_rows($g_result4);
													if ($g_num4>0)
													{
														while($g_row4=mysql_fetch_array($g_result4))
														{						$dep_name2=$g_row4["dep_name"];							}
													}
									}
										echo"<td ><div align=left>วันที่ $g_update <BR>โดย $pre_name $u_name $u_last <BR> $dep_name2</div></td></tr>";
								}

								else
								{
										echo"<td ><div align=left>วันที่ $g_update </div></td></tr>";
								}





						}   //  close  while(show  head)
					}		//  close  if ($g_num>0)


				}		 //    close  while(show  department)
			}		//     close  if ($d_num>0)


		}  //     close  while(show mimistry)
	}  //  close  if ($m_num>0)
												
echo"</table>";
?>