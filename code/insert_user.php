<?
		  	if ($recal=='recal')
			{
					$u_sql="SELECT * FROM user WHERE  u_user='$u_user'  ";
					$u_result=mysql_query($u_sql);
					$u_num=mysql_num_rows(mysql_query($u_sql));
					if ($u_num>0)
					{
							?><script language="javascript">
							alert("ไม่สามารถ เพิ่ม User ได้ \n  เนื่องจาก UserName ซ้ำ"); 
							</script> <?
					}

					else
					{
							$add_sql="INSERT INTO user  VALUES ('0','$u_type','$u_user','$u_user','$u_prefix','$u_name','$u_last','$u_dep')";
							$add_result1=mysql_query($add_sql);

					
					}

			}

?>



