<?
	$dt_sql="SELECT * FROM user Order By u_id DESC limit 0,3";
	$dt_result=mysql_query($dt_sql);
	$dt_num=mysql_num_rows($dt_result);
	if ($dt_num>0)
		{
			echo"<table width=800 border=1  cellpadding=0 cellspacing=0 bordercolor=#8B7B8C >";
			echo"<tr height=25 bgcolor=#9966FF ><td colspan=800><strong><div align=center><FONT COLOR=FFFFFF  SIZE=3>User ใหม่ ล่าสุด 3 อันดับ</FONT></strong></div></td></tr>";
			echo"<tr height=25 bgcolor=#FFFFCC ><td colspan=200><strong><div align=left><FONT   SIZE=3>User Name</FONT></strong></div></td><td colspan=300><B><FONT  SIZE=3>ชื่อ - สกุล</FONT></B></td><td colspan=300><B><FONT   SIZE=3>หน่วยงาน</FONT></B></td></tr>";
					while($dt_row=mysql_fetch_array($dt_result))
						{
								$u_type=$dt_row["u_type"];
								$u_user=$dt_row["u_user"];
								$u_prefix=$dt_row["u_prefix"];
								$u_name=$dt_row["u_name"];
								$u_last=$dt_row["u_last"];
								$u_dep_id=$dt_row["u_dep_id"];

									$prea_sql="SELECT * FROM prefix WHERE pre_id='$u_prefix' ";
									$prea_row=mysql_fetch_array(mysql_query($prea_sql));
											$prea_name=$prea_row["pre_name"];  

									$depa_sql="SELECT * FROM depart WHERE dep_id='$u_dep_id' ";
									$depa_row=mysql_fetch_array(mysql_query($depa_sql));
											$depa_name=$depa_row["dep_name"];  
													
													echo"<tr height=25  ><td colspan=200><div align=left>( $u_type )&nbsp;&nbsp; $u_user</div></td>";
													echo"<td colspan=300><div align=left>$prea_name$u_name $u_last</div></td>";
													echo"<td colspan=300><div align=left>$depa_name</div></td></tr>";
						}
					echo"</table>";
			}
?>