<?
  $atday=((date('Y+'))+543).'-'.date('m').'-'.date('j');   // วันที่ปัจจุบัน

if ($recal=='recal')
{
			//  กรณีภาพได้มาตรฐาน
			if ((($_FILES["file"]["type"] == "image/gif")  || ($_FILES["file"]["type"] == "image/pjpeg")) && ($_FILES["file"]["size"] < 102400)) 
			{
				if ($g_pic!=NULL)       //  ถ้าไฟล์เดิม มี ก็ลบ ซะก่อน
				{
						$n=$g_id.'.gif';
						unlink("../image/pic_head/$n"); 
				}

				if (file_exists("../image/pic_head/$g_id.gif"))    // ไฟล์ซ้ำหรือไม่
				{ 
						$a=1;					//echo $_FILES["file"]["name"] . " already exists. "; 
				} 
				else 
				{ 
						move_uploaded_file($_FILES["file"]["tmp_name"],"../image/pic_head/$g_id.gif" ); 
				} 
			//  edit Data
				$upg_sql="UPDATE govern SET  g_impo='$impo'  ,  g_head_th='$name'  ,  g_position='$position' , g_add='$add' , g_phone='$phone' , g_hotline='$hotline' , g_fax='$fax' , g_mobile='$mobile' , g_email='$email' , g_web='$web' , g_map='$map' , g_pic='$g_id.gif' ,g_update='$atday' ,g_upbyuser='$u_id' WHERE g_id='$g_id' ";
				$upg_result=mysql_query($upg_sql);
							?><script language="javascript">
							alert(" แก้ไขข้อมูล เรียบร้อยแล้ว"); 
							</script> <?  
			}

			else if ($file==NULL)    //  กรณี  ไม่แก้ไขภาพ
			{
			//  edit Data
					$upg_sql="UPDATE govern SET  g_impo='$impo'  ,  g_head_th='$name'  ,  g_position='$position' , g_add='$add' , g_phone='$phone' , g_hotline='$hotline' , g_fax='$fax' , g_mobile='$mobile' , g_email='$email' , g_web='$web' , g_map='$map' ,g_update='$atday' ,g_upbyuser='$u_id'  WHERE g_id='$g_id' ";
					$upg_result=mysql_query($upg_sql);
							?><script language="javascript">
							alert(" แก้ไขข้อมูล เรียบร้อยแล้ว"); 
							</script> <?
			}

			else
			{
			//  edit Data
					$upg_sql="UPDATE govern SET  g_impo='$impo'  ,  g_head_th='$name'  ,  g_position='$position' , g_add='$add' , g_phone='$phone' , g_hotline='$hotline' , g_fax='$fax' , g_mobile='$mobile' , g_email='$email' , g_web='$web' , g_map='$map'   ,g_update='$atday' ,g_upbyuser='$u_id' WHERE g_id='$g_id' ";
					$upg_result=mysql_query($upg_sql);

					?><script language="javascript">
					alert(" \"แก้ไขข้อมูล เรียบร้อยแล้ว\"  แต่ไม่สามารถแก้ไขภาพผู้บริหารได้  เนื่องจาก ภาพที่เลือก ไม่อยู่ภายใต้ข้อกำหนด"); 
					</script> <?
			}
}


//  เรียกดูข้อมูล
	$g_sql="SELECT * FROM govern WHERE  g_id='$g_id' ";
	$g_result=mysql_query($g_sql);
	$g_num=mysql_num_rows($g_result);
		if ($g_num>0)
			{
					while($g_row=mysql_fetch_array($g_result))
					{
							$g_dep=$g_row["g_dep"];
							$g_impo=$g_row["g_impo"];
							$g_position=$g_row["g_position"];
							$g_head_th=$g_row["g_head_th"];
							$g_add=$g_row["g_add"];
							$g_phone=$g_row["g_phone"];
							$g_hotline=$g_row["g_hotline"];
							$g_fax=$g_row["g_fax"];
							$g_mobile=$g_row["g_mobile"];
							$g_email=$g_row["g_email"];
							$g_web=$g_row["g_web"];
							$g_map=$g_row["g_map"];
							$g_pic=$g_row["g_pic"];

									$d_sql="SELECT * FROM depart WHERE  dep_id='$g_dep' ";
									$d_row=mysql_fetch_array(mysql_query($d_sql));
												$d_name=$d_row["dep_name"];
												$d_minis=$d_row["dep_minis"];

									$s_sql="SELECT * FROM ministry WHERE  m_id='$d_minis' ";
									$s_row=mysql_fetch_array(mysql_query($s_sql));
												$s_name=$s_row["m_name"];
					}
			}
?>