<?php
include './connection/StartConnect.php';

header('Content-Type: application/force-download');
header('Content-disposition: attachment; filename=ptl-phone.xls');
// Fix for crappy IE bug in download.
header("Pragma: ");
header("Cache-Control: ");
date_default_timezone_set('Asia/Bangkok');

@readfile($filename); 


?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>

<table border=1>
<tr>รายนามผู้บริหารจังหวัดพัทลุง</tr>
<tr>
    <td>ชื่อ-สกุล/ตำแหน่ง</td>
    <td>โทรศัพท์</td>
    <td>มือถือ</td></td>
    <td>อีเมลล์</td>
    <td>update</td>
</tr>
<?php
$s_sql = 'SELECT * FROM ministry ORDER BY m_impo ';   //ดึงกระทรวง
$s_result = dbQuery($s_sql);
$s_num = dbNumRows($s_result);
if ($s_num > 0) {
    while ($s_row = dbFetchArray($s_result)) {  
        $s_id = $s_row['m_id'];
        $s_impo = $s_row['m_impo'];
        $s_name = $s_row['m_name'];

        echo "<tr><td colspan='6'><center><b><h3>$s_name</h3></b></center></td></tr>
        ";

        $d_sql = "SELECT * FROM depart WHERE dep_minis='$s_id'  ORDER BY dep_impo ASC";
        $d_result = dbQuery($d_sql);

        while ($row_dep = dbFetchArray($d_result)) {
            $dep_id = $row_dep['dep_id'];
            $dep_name = $row_dep['dep_name'];
            echo "<tr>
                    <td colspan='6'><h4>$dep_name</h4></td>
                  </tr>
                 ";
                  

            $g_sql = "SELECT * FROM govern WHERE g_dep = $dep_id   ORDER BY g_impo";
            $g_result = dbQuery($g_sql);

            while ($g_row = dbFetchArray($g_result)) {
                echo "
                    <tr><td colspan='6'>".$g_row['g_position']."</td></tr>
                    <tr>
                        <td>".$g_row['g_head_th']."</td>
                        <td>".$g_row['g_phone']."</td>
                        <td>".$g_row['g_fax']."</td>
                        <td>".$g_row['g_mobile']."</td>
                        <td>".$g_row['g_hotline']."</td>
                        <td>".$g_row['g_update']."</td>
                    </tr>
                ";
            }
        } //while

    } // while ministray
} //if first

?>
</table>
</body>
</html>