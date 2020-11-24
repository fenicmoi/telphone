<?php 		//ส่วนการลบกระทรวง/ต้นสังกัด
			$ac= isset($_GET['del']) ? $_GET['del'] : '';		//แก้ไขปัญหา Notis
		  	if ($ac=='del'){
				$Mdel_sql="DELETE FROM ministry WHERE m_id=$m_id";
				$Mdel_result=dbQuery($Mdel_sql);
				$sql="SELECT * FROM depart  WHERE  dep_minis='$m_id'  ";
				$result=dbQuery($sql);
				$num=dbNumRows($result);
					if ($num>0)						{
							while($row=dbFetchArray($result)){
									$dep_id=$row["dep_id"];
									$dg_sql="SELECT * FROM govern WHERE  g_dep=$dep_id ";
									$dg_result=dbQuery($dg_sql);
									$dg_num=dbNumRows($dg_result);
										if ($dg_num>0){
												while($dg_row=dbFetchArray($dg_result)){
														$dg_id=$dg_row["g_id"];
														$dg_pic=$dg_row["g_pic"];
														if ($dg_pic!=NULL){
															$dn=$dg_id.'.gif';
															unlink("../image/pic_head/$dn"); 
														}//if
												}//while
										}//if
									$Gdel_sql="DELETE FROM govern WHERE g_dep=$dep_id";
									$Gdel_result=dbQuery($Gdel_sql);
									$Rdel_sql="DELETE FROM respon WHERE res_dep=$dep_id";
									$Rdel_result=dbQuery($Rdel_sql);
						} //check $num
				} //check num>0
				$Ddel_sql="DELETE FROM depart WHERE dep_minis=$m_id";
				$Ddel_result=dbQuery($Ddel_sql);
			}  //check button del
?>