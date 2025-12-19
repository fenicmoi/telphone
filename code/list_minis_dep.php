<?php
	$msee_sql="SELECT * FROM ministry  ORDER BY m_impo ";
	$msee_result=dbQuery($msee_sql);
	$msee_num=dbNumRows($msee_result);
	if ($msee_num>0){
		while($msee_row=dbFetchArray($msee_result)){
			$m_id=$msee_row["m_id"];
			$m_name=$msee_row["m_name"];?>
			<option value="0"><? echo"+++++ $m_name +++++"?></option><?
			$depsee_sql="SELECT * FROM depart  WHERE  dep_minis='$m_id' ORDER BY dep_impo ASC ";
			$depsee_result=dbQuery($depsee_sql);
			$depsee_num=dbNumRows($depsee_result);
			if ($depsee_num>0){
				while($depsee_row=dbFetchArray($depsee_result)){
					$dep_id=$depsee_row["dep_id"];
					$dep_name=$depsee_row["dep_name"];
				?>                
				<option value="<? echo"$dep_id";?>"><? echo"$dep_name";?></option> <?
				}
			}
		}
	}else{?>                  
		<option value="0">NoData</option>
	<? } ?>