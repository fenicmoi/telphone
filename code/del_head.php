<?
		  	if ($ac=='del')
			{
				$dg_sql="SELECT * FROM govern WHERE  g_id='$g_id' ";
				$dg_result=mysql_query($dg_sql);
				$dg_row=mysql_fetch_array($dg_result);
							$dg_pic=$dg_row["g_pic"];
				if ($dg_pic!=NULL)
				{
					$dn=$g_id.'.gif';
					unlink("../image/pic_head/$dn"); 
				}
				
				$Ddel_sql="DELETE FROM govern WHERE g_id=$g_id";
				$Ddel_result=mysql_query($Ddel_sql);
			}
?>