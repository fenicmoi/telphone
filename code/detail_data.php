<?php
error_reporting (E_ALL ^ E_NOTICE);
if($recal=='recal') {
?><script language="javascript">
	alert("err"); 
</script> <?
}
    $g_id=$_GET['g_id'];
	$g_sql="SELECT * FROM govern WHERE  g_id='$g_id' ";
	$g_result=dbQuery($g_sql);
	$g_num=dbNumRows($g_result);
		if ($g_num>0){
			while($g_row=dbFetchArray($g_result)){
				$g_id=$g_row["g_id"];
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
				$d_row=dbFetchArray(dbQuery($d_sql));
				$d_name=$d_row["dep_name"];
				$d_minis=$d_row["dep_minis"];

				$s_sql="SELECT * FROM ministry WHERE  m_id='$d_minis' ";
				$s_row=dbFetchArray(dbQuery($s_sql));
				$s_name=$s_row["m_name"];
			}
		}
?>