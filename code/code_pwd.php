<?
if (($new==NULL) || ($renew==NULL) || ($old==NULL) )
{
		echo  "<font color='#FF0000'>"." * ��سҡ�͡���������ú��ǹ * "."</font>";
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
												echo"* ����¹���ʼ�ҹ ���º�������� *";


											
											}    //  close if
							
							 else
								{ 
									echo "<font color='#FF0000'>"." * �к��������ö �ӡ������¹���ʼ�ҹ��  ���ͧ�ҡ ��͡���ʼ�ҹ��� ���١��ͧ *" ."</font>";
								 }
			}

			else
			{
					echo  "<font color='#FF0000'>"." * �к��������ö �ӡ������¹���ʼ�ҹ��  ���ͧ�ҡ ����׹�ѹ���ʼ�ҹ���� ���١��ͧ * "."</font>";
			}
}

?>