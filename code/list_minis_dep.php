<?php
$msee_sql = "SELECT * FROM ministry ORDER BY m_impo";
$msee_result = dbQuery($msee_sql);
$msee_num = dbNumRows($msee_result);
if ($msee_num > 0) {
    while ($msee_row = dbFetchArray($msee_result)) {
        $m_id = $msee_row["m_id"];
        $m_name = $msee_row["m_name"];
        echo '<option value="0">+++++ ' . htmlspecialchars($m_name) . ' +++++</option>';
        $depsee_sql = "SELECT * FROM depart WHERE dep_minis = ? ORDER BY dep_impo ASC";
        $depsee_result = dbQueryPrepared($depsee_sql, [$m_id]);
        $depsee_num = dbNumRows($depsee_result);
        if ($depsee_num > 0) {
            while ($depsee_row = dbFetchArray($depsee_result)) {
                $dep_id = $depsee_row["dep_id"];
                $dep_name = $depsee_row["dep_name"];
                echo '<option value="' . htmlspecialchars($dep_id) . '">' . htmlspecialchars($dep_name) . '</option>';
            }
        }
    }
} else {
    echo '<option value="0">NoData</option>';
}
?>