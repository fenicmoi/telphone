<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['u_user']) || $_SESSION['u_type'] !== 'a') {
    exit('Unauthorized');
}

$ac = isset($_GET['ac']) ? $_GET['ac'] : '';
$dep_id = isset($_GET['dep_id']) ? intval($_GET['dep_id']) : 0;

if ($ac == 'del' && $dep_id > 0) {
    $dg_sql = "SELECT g_id, g_pic FROM govern WHERE g_dep = ?";
    $dg_result = dbQueryPrepared($dg_sql, [$dep_id]);

    while ($dg_row = dbFetchArray($dg_result)) {
        $dg_id = $dg_row["g_id"];
        $dg_pic = $dg_row["g_pic"];

        if ($dg_pic != null) {
            $dn = $dg_id . '.gif';
            if (file_exists("../image/pic_head/$dn")) {
                unlink("../image/pic_head/$dn");
            }
        }
    }

    $Ddel_sql = "DELETE FROM depart WHERE dep_id = ?";
    dbQueryPrepared($Ddel_sql, [$dep_id]);

    $Rdel_sql = "DELETE FROM respon WHERE res_dep = ?";
    dbQueryPrepared($Rdel_sql, [$dep_id]);

    $Gdel_sql = "DELETE FROM govern WHERE g_dep = ?";
    dbQueryPrepared($Gdel_sql, [$dep_id]);
}