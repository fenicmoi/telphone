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
<tr bgcolor="yellow"><center><b><font color="blue"><h3>รายนามผู้บริหารจังหวัดพัทลุง</h3></font></b></center></tr>
<tr>
    <td><center><b><h5>ชื่อ-สกุล/ตำแหน่ง</h5></b></center></td>
    <td><center><b><h5>โทรศัพท์(074)</h5></b></center></td>
    <td><center><b><h5>มือถือ</h5></b></center></td></td>
    <td><center><b><h5>วันที่ปรับปรุงในระบบ</h5></b></center></td>
    <td><center><b><h5>วันที่ยืนยัน</h5></b></center></td>
    <td><center><b><h5>เจ้าหน้าที่ผู้ยืนยัน</h5></b></center></td>

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

        echo "<tr bgcolor='yellow'><td colspan='6'><center><b><h3>$s_name</h3></b></center></td></tr>
        ";

        $d_sql = "SELECT * FROM depart WHERE dep_minis='$s_id'  ORDER BY dep_impo ASC";
        $d_result = dbQuery($d_sql);

        while ($row_dep = dbFetchArray($d_result)) {
            $dep_id = $row_dep['dep_id'];
            $dep_name = $row_dep['dep_name'];
            echo "<tr bgcolor='cyan'>
                    <td colspan='6'><h4>$dep_name</h4></td>
                  </tr>
                 ";
                  

            $g_sql = "SELECT * FROM govern WHERE g_dep = $dep_id   ORDER BY g_impo";
            $g_result = dbQuery($g_sql);

            while ($g_row = dbFetchArray($g_result)) {
               
                echo "
                    <tr><td colspan='6'><b>".$g_row['g_position']."</b></td></tr>
                    <tr>
                        <td>".$g_row['g_head_th']."</td>
                        <td> &nbsp; ".substr($g_row['g_phone'],3)."</td>
                        <td> &nbsp; ".$g_row['g_mobile']."</td>
                        <td>".$g_row['g_update']."</td>
                        <td></td>
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