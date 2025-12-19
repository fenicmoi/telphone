<?php    ### ส่วนเพิ่มกระทรวง
$recal= isset($_GET['recal']) ? $_GET['recal'] : '';		//แก้ไขปัญหา Notis

if(($recal=='recal') && ($a_dep!=NULL)){
		$chd_sql="SELECT * FROM ministry  WHERE  m_name='$a_dep'  ";
		$chd_num=dbNumRows(mysql_query($chd_sql));
			if ($chd_num>0){?>
				<script language="javascript">
					alert("�������ö���� �ѧ�Ѵ�ͧ˹��§ҹ �� \n ���ͧ�ҡ ��� �Ѻ�����ŷ�����������"); 
				</script> <?
			}else{
					$add_sql="INSERT INTO ministry  VALUES ('0' , '$a_impo' , '$a_dep')";
					$add_result1=dbQuery($add_sql);
					?>
				<script language="javascript">
					alert("เพิ่มเติมข้อมูลแล้ว"); 
				</script> <?
			}
}
?>