<?php
if((@$recal=='recal') && ($u_dep!='0'))
{

		$chd_sql="SELECT * FROM respon  WHERE  res_user='$ur_user'  AND  res_dep='$u_dep'  ";
		$chd_num=dbNumRows(dbQuery($chd_sql));

			if ($chd_num>0)
			{
			
					?><script language="javascript">
					alert("�������ö���� �Է��� �� \n ���ͧ�ҡ ��� �Ѻ�����ŷ�����������"); 
					</script> <?
			}

			else
			{
					$add_sql="INSERT INTO respon  VALUES ('0','$ur_user','$u_dep')";
					$add_result1=dbQuery($add_sql);

					?><script language="javascript">
					alert("�١�Է��� ���º��������"); 
					</script> <?
			}
}
?>