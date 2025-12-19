<?php
		  	if (@$ac=='del')
			{

									$dg_sql="SELECT * FROM govern WHERE  g_dep=$dep_id ";
									$dg_result=dbQuery($dg_sql);
									$dg_num=dbNumRows($dg_result);
										if ($dg_num>0)
											{
												while($dg_row=dbFetchArray($dg_result))
												{
														$dg_id=$dg_row["g_id"];
														$dg_pic=$dg_row["g_pic"];

														if ($dg_pic!=NULL)
														{
															$dn=$dg_id.'.gif';
															unlink("../image/pic_head/$dn"); 
														}
												}
											}

				$Ddel_sql="DELETE FROM depart WHERE dep_id=$dep_id";
				$Ddel_result=dbQuery($Ddel_sql);

				$Rdel_sql="DELETE FROM respon WHERE res_dep=$dep_id";
				$Rdel_result=dbQuery($Rdel_sql);

				$Gdel_sql="DELETE FROM govern WHERE g_dep=$dep_id";
				$Gdel_result=dbQuery($Gdel_sql);
			}
?>