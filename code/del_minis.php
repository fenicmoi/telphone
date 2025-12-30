<?php
session_start();
if (!isset($_SESSION['u_user']) || $_SESSION['u_type'] !== 'a') {
    exit('Unauthorized');
}

$ac = isset($_GET['del']) ? $_GET['del'] : '';
$m_id = isset($_GET['m_id']) ? intval($_GET['m_id']) : 0;

if ($ac == 'del' && $m_id > 0) {
    // Delete ministry
    $Mdel_sql = "DELETE FROM ministry WHERE m_id = ?";
    dbQueryPrepared($Mdel_sql, [$m_id]);

    // Find all departments under this ministry
    $sql = "SELECT dep_id FROM depart WHERE dep_minis = ?";
    $result = dbQueryPrepared($sql, [$m_id]);

    while ($row = dbFetchArray($result)) {
        $dep_id = $row["dep_id"];

        // Find all governors/heads under this department to delete their pictures
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

        // Delete governors/heads and responsibilities
        $Gdel_sql = "DELETE FROM govern WHERE g_dep = ?";
        dbQueryPrepared($Gdel_sql, [$dep_id]);

        $Rdel_sql = "DELETE FROM respon WHERE res_dep = ?";
        dbQueryPrepared($Rdel_sql, [$dep_id]);
    }

    // Delete all departments under this ministry
    $Ddel_sql = "DELETE FROM depart WHERE dep_minis = ?";
    dbQueryPrepared($Ddel_sql, [$m_id]);
}