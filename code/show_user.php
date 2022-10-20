<?php 
	//session_start();
	$u_user = 	$_SESSION['u_user'];


		$u_sql = "SELECT u.*,p.pre_name,d.dep_name FROM user  as u
	              INNER JOIN prefix as p ON p.pre_id = u.u_prefix 
			      INNER JOIN depart as d ON d.dep_id = u.u_dep_id
			      WHERE  u.u_user='$u_user' ";
	//print $u_sql;

	$result = dbQuery($u_sql);
	$u_num = dbNumRows($result);
	if($u_num<>0){
		$u_row = dbFetchArray($result);
		$u_id = $u_row['u_id'];
		$u_pre_name=$u_row["pre_name"];
		$u_user=$u_row["u_user"];
		$u_name=$u_row["u_name"];
		$u_last=$u_row["u_last"];
		$u_dep_name=$u_row["dep_name"];
	}
?>