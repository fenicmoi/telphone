<?php
   // include '../connection/StartConnect.php';
    $u_sql = "SELECT * FROM user WHERE  u_user='$u_user' AND u_pass='$u_pass'  ";

    print $u_sql;
    $u_num = dbNumRows(dbQuery($u_sql));

if ($u_num > 0) {
    $u_row = dbFetchArray(dbQuery($u_sql));
    $u_type = $u_row['u_type'];
    $u_prefix = $u_row['u_prefix'];
    $u_name = $u_row['u_name'];
    $u_last = $u_row['u_last'];
    $u_dep_id = $u_row['u_dep_id'];

    $pre_sql = "SELECT * FROM prefix WHERE pre_id='$u_prefix' ";
    $pre_row = dbFetchArray(dbQuery($pre_sql));
    $pre_name = $pre_row['pre_name'];

    $dep_sql = "SELECT * FROM depart WHERE dep_id='$u_dep_id' ";
    $dep_row = dbFetchArray(dbQuery($dep_sql));
    $dep_name = $dep_row['dep_name'];

    if ($u_type == 'a') {
        ?>
					<SCRIPT language=JAVASCRIPT>window.location.replace('../admin/ch_admin.php')</SCRIPT>	
					<?php
    }
}
?>