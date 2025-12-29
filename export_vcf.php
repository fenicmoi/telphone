<?php
include './connection/StartConnect.php';

header('Content-Type: text/vcard; charset=utf-8');
header('Content-Disposition: attachment; filename=contacts.vcf');

// Fetch all ministries
$s_sql = 'SELECT * FROM ministry ORDER BY m_impo';
$s_result = dbQuery($s_sql);
$s_num = dbNumRows($s_result);

if ($s_num > 0) {
    while ($s_row = dbFetchArray($s_result)) {
        $s_id = $s_row['m_id'];
        $m_name = $s_row['m_name']; // Ministry Name

        // Fetch departments for this ministry
        $d_sql = "SELECT * FROM depart WHERE dep_minis='$s_id' ORDER BY dep_impo ASC";
        $d_result = dbQuery($d_sql);

        while ($row_dep = dbFetchArray($d_result)) {
            $dep_id = $row_dep['dep_id'];
            $dep_name = $row_dep['dep_name']; // Department Name

            // Fetch government officials (contacts) for this department
            $g_sql = "SELECT * FROM govern WHERE g_dep = $dep_id ORDER BY g_impo";
            $g_result = dbQuery($g_sql);

            while ($g_row = dbFetchArray($g_result)) {
                $fullname = $g_row['g_head_th'];
                $position = $g_row['g_position'];
                $phone = $g_row['g_phone'];
                $mobile = $g_row['g_mobile'];
                $fax = $g_row['g_fax'];
                $email = $g_row['g_email'];
                $web = $g_row['g_web'];

                echo "BEGIN:VCARD\r\n";
                echo "VERSION:3.0\r\n";
                echo "FN:" . $fullname . "\r\n";
                echo "N:;" . $fullname . ";;;\r\n"; // Simple N field
                echo "TITLE:" . $position . "\r\n";
                echo "ORG:" . $m_name . ";" . $dep_name . "\r\n";

                if (!empty($phone)) {
                    // Clean phone number if needed, but keeping simplistic for now
                    echo "TEL;TYPE=WORK,VOICE:" . $phone . "\r\n";
                }

                if (!empty($mobile)) {
                    echo "TEL;TYPE=CELL,VOICE:" . $mobile . "\r\n";
                }

                if (!empty($fax)) {
                    echo "TEL;TYPE=WORK,FAX:" . $fax . "\r\n";
                }

                if (!empty($email)) {
                    echo "EMAIL;TYPE=PREF,INTERNET:" . $email . "\r\n";
                }

                if (!empty($web)) {
                    echo "URL:" . $web . "\r\n";
                }

                echo "END:VCARD\r\n";
            }
        }
    }
}
?>