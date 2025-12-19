<?
if (($new==NULL) || ($renew==NULL) || ($old==NULL) )
{
		echo  "<font color='#FF0000'>"." * กรุณากรอกข้อมูลให้ครบถ้วน * "."</font>";
}

else
{
			if ($new==$renew)
			{
						$show_sql="SELECT * FROM user WHERE u_user='$u_user' AND u_pass='$old' ";
						$show_result=mysql_query($show_sql);
						$show_num=mysql_num_rows($show_result);
							if ($show_num>0)
											{
													// code Update at This

												$update_sql="UPDATE user SET u_pass='$new' WHERE u_user='$u_user' ";
												$update_result=mysql_query($update_sql);
												echo"* เปลี่ยนรหัสผ่าน เรียบร้อยแล้ว *";


											
											}    //  close if
							
							 else
								{ 
									echo "<font color='#FF0000'>"." * ระบบไม่สามารถ ทำการเปลี่ยนรหัสผ่านได้  เนื่องจาก กรอกรหัสผ่านเดิม ไม่ถูกต้อง *" ."</font>";
								 }
			}

			else
			{
					echo  "<font color='#FF0000'>"." * ระบบไม่สามารถ ทำการเปลี่ยนรหัสผ่านได้  เนื่องจาก การยืนยันรหัสผ่านใหม่ ไม่ถูกต้อง * "."</font>";
			}
}

?>