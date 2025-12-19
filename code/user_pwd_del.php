<?
		  	if (@$ac=='reset')
			{
							$uppwd_sql="UPDATE user SET  u_pass='$ua_user'    WHERE u_user='$ua_user'";
							$uppwd_result=mysql_query($uppwd_sql);

							?><script language="javascript">
							alert("Reset  PassWord  ���º��������"); 
							</script> <?
			}
		  	else if (@$ac=='del')
			{
						$Udel_sql="DELETE FROM user WHERE u_user='$ua_user'";
						$Udel_result=mysql_query($Udel_sql);

			}

?>