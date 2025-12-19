<?
                $atday=((date('Y+'))+543).'-'.date('m').'-'.date('j');   // วันที่ปัจจุบัน

	$d_sql="SELECT * FROM depart WHERE  dep_id='$dep_id'  ";
	$d_result=mysql_query($d_sql);
	$d_num=mysql_num_rows(mysql_query($d_sql));
	if ($d_num>0)
		{
				$d_row=mysql_fetch_array(mysql_query($d_sql));
				$dep_name=$d_row["dep_name"];			//  สำหรับแสดง ชื่อหน่วยงาน ที่หัวตาราง
		}	
			
			
			if ($recal=='recal')
			{
					$g_sql="SELECT * FROM govern WHERE  g_dep='$dep_id'  AND g_position='$position'  AND g_head_th='$name' ";
					$g_result=mysql_query($g_sql);
					$g_num=mysql_num_rows($g_result);
					if ($g_num>0)
					{
							?><script language="javascript">
							alert("ไม่สามารถ เพิ่ม ข้อมูล ได้ \n  เนื่องจาก ข้อมูลซ้ำ"); 
							</script> <?
					}

					else
					{
// เพิ่มข้อมูล
							$add_sql="INSERT INTO govern  VALUES ('0','$dep_id','$impo','$name','$position','$add','$phone','$hotline' , '$fax' , '$mobile' ,'$email' ,'$web' ,'$map' ,'','$atday','$u_id')";
							$add_result1=mysql_query($add_sql);

							?><script language="javascript">
							alert(" เพิ่ม ข้อมูล เรียบร้อยแล้ว"); 
							</script> <?

//  เรียก Id สำหรับ เพิ่มภาพ
							$ch_sql="SELECT * FROM govern WHERE  g_dep='$dep_id'  AND g_position='$position'  AND g_head_th='$name' ";
							$ch_result=mysql_query($ch_sql);
							$ch_row=mysql_fetch_array($ch_result);
							$g_id=$ch_row["g_id"];  


//  upload ภาพ
						if ((($_FILES["file"]["type"] == "image/gif")  || ($_FILES["file"]["type"] == "image/pjpeg")) && ($_FILES["file"]["size"] < 102400)) 
						{
								if (file_exists("../image/pic_head/$g_id.gif")) 
								{ 
									echo $_FILES["file"]["name"] . " already exists. "; 
								} 
								else
								{ 
									move_uploaded_file($_FILES["file"]["tmp_name"],"../image/pic_head/$g_id.gif" ); 
									
									//  update  DB ฟิว ภาพ
									$new_name=$g_id.'.gif';
									$uppic_sql="UPDATE govern SET g_pic='$new_name'  WHERE g_id='$g_id' ";
									$uppic_result=mysql_query($uppic_sql);

								} 
						}
						else
						{
							?><script language="javascript">
							alert(" แต่ ไม่มี ภาพผู้บริหาร "); 
							</script> <?
						
						}

					}

			}

?>