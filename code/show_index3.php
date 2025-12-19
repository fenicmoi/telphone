<table class="table table-bordered">
<?php
$i = 0;
$key_w = $_POST['key_w'];
$s_sql = 'SELECT * FROM ministry ORDER BY m_impo ';
$s_result = dbQuery($s_sql);
$s_num = dbNumRows($s_result);
if ($s_num > 0) {
    while ($s_row = dbFetchArray($s_result)) {
        $s_id = $s_row['m_id'];
        $s_impo = $s_row['m_impo'];
        $s_name = $s_row['m_name'];
        $ch_table = 'a';     // ��˹���ҡ�����ҧ��ǵ��ҧ (�ѧ�Ѵ)

        //���� ˹��§ҹ
        $d_sql = "SELECT * FROM depart WHERE  dep_minis='$s_id' ORDER BY dep_impo ASC ";
        $d_result = dbQuery($d_sql);
        $d_num = dbNumRows($d_result);
        if ($d_num > 0) {
            while ($d_row = dbFetchArray($d_result)) {
                $d_name = $d_row['dep_name'];
                $dep_id = $d_row['dep_id'];

                // ���������˹����ǹ
                if ($type_s == 3) {
                    $g_sql = "SELECT * FROM govern WHERE  g_dep='$dep_id'  AND g_position LIKE '%$key_w%' ORDER BY g_impo ASC";
                } elseif ($type_s == 4) {
                    $g_sql = "SELECT * FROM govern WHERE  g_dep='$dep_id'  AND g_head_th LIKE '%$key_w%' ORDER BY g_impo ASC";
                } elseif ($type_s == 5) {
                    $g_sql = "SELECT * FROM govern WHERE  g_dep='$dep_id'  AND g_add LIKE '%$key_w%' ORDER BY g_impo ASC";
                } elseif ($type_s == 6) {
                    $g_sql = "SELECT * FROM govern WHERE  g_dep='$dep_id'  AND g_web LIKE '%$key_w%' ORDER BY g_impo ASC";
                } elseif ($type_s == 7) {
                    $g_sql = "SELECT * FROM govern WHERE  g_dep='$dep_id'  AND g_email LIKE '%$key_w%' ORDER BY g_impo ASC";
                } else {
                    $g_sql = "SELECT * FROM govern WHERE  g_dep='$dep_id'  AND g_position='no_data'  ORDER BY g_impo ASC";
                }

                $g_result = dbQuery($g_sql);
                $g_num = dbNumRows($g_result);
                if ($g_num > 0) {
                    $i = 1;
                    if ($ch_table == 'a') {   //  ��Ǩ�ͺ����ա�����ҧ��ǵ��ҧ (�ѧ�Ѵ) ��§ 1���� ��� 1 �ѧ�Ѵ
                        echo'<tr height=30 bgcolor=#0000FF>';
                        echo"<td colspan=990><div align=center><strong><FONT COLOR=FFFFFF SIZE=5 >$s_name</FONT></strong></div></td></tr>";
                        $ch_table = 'b';
                    }

                    echo"<tr height=25 bgcolor=#9966FF >
                            <td colspan=190><strong><div align=left><FONT COLOR=FFFFFF  SIZE=3>$d_name</FONT></strong></div></td>
                            <td colspan=300><B><FONT  COLOR=FFFFFF>ที่ตั้งหน่วยงาน</FONT></B></td>
                            <td colspan=200><B><FONT COLOR=FFFFFF>เบอร์โทรศัพท์</FONT></B></td>
                            <td colspan=300><B><FONT  COLOR=FFFFFF>website / e-mail</FONT></B></td>
                        </tr>";
                    while ($g_row = dbFetchArray($g_result)) {
                        $g_id = $g_row['g_id'];
                        $g_position = $g_row['g_position'];
                        $g_head_th = $g_row['g_head_th'];
                        $g_add = $g_row['g_add'];
                        $g_phone = $g_row['g_phone'];
                        $g_fax = $g_row['g_fax'];
                        $g_mobile = $g_row['g_mobile'];
                        $g_email = $g_row['g_email'];
                        $g_web = $g_row['g_web'];

                        echo"<tr valign=top bgcolor=#FFFFFF>
                                <td colspan=190><div align=left> &nbsp;&nbsp;<B><FONT  COLOR=006600>$g_position</FONT></B> <BR>  &nbsp;&nbsp; "; ?><a href="javascript:popup('member/detail_data.php?g_id=<?php echo "$g_id"; ?>','',950,500)" >
                        <?php
                        echo"$g_head_th"; ?></a><?php
                        echo'<BR><BR></div></td>';
                        echo"<td colspan=300><div align=left>$g_add </div></td>";
                        echo"<td colspan=200><div align=left>$g_phone </div></td>";
                        echo"<td colspan=300><div align=left>$g_web <BR>$g_email</div></td></tr>";
                    }  //  close  while(show  head)
                }   //  close  if ($g_num>0)
            }  //  close  while(show  department)
        }   //    close  if ($d_num>0)
    }  //  close  while(show  ministry)
}   //    close  if ($s_num>0)

if ($i == 0) {
    echo'<tr height=25 bgcolor=#FFFFCC><td colspan=990><div align=center><strong><FONT COLOR=red>��辺������</FONT></strong></div></td></tr>';
}
?>
</table>