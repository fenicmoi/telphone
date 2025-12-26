<?php
if ((@$recal == 'recal') && ($u_dep != '0')) {
    $chd_sql = "SELECT * FROM respon WHERE res_user = ? AND res_dep = ?";
    $chd_result = dbQueryPrepared($chd_sql, [$ur_user, $u_dep]);
    $chd_num = dbNumRows($chd_result);

    if ($chd_num > 0) {
        echo "<script>alert('ผู้ใช้คนนี้มีสิทธิ์ดูแลหน่วยงานนี้แล้ว \\n กรุณาเลือกหน่วยงานอื่น หรือ ติดต่อ Admin');</script>";
    } else {
        $add_sql = "INSERT INTO respon VALUES ('0', ?, ?)";
        $add_result = dbQueryPrepared($add_sql, [$ur_user, $u_dep]);
        if ($add_result) {
            echo "<script>alert('เพิ่มสิทธิ์เรียบร้อยแล้ว');</script>";
        } else {
            echo "<script>alert('เกิดข้อผิดพลาดในการเพิ่มสิทธิ์');</script>";
        }
    }
}
?>