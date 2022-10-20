
<table id="tbAll" class="table table-bordered">
    <thead>
<?php
$d_sql = 'SELECT * FROM depart  ORDER BY dep_impo ASC LIMIT 1';
$d_result = dbQuery($d_sql);
$d_num = dbNumRows($d_result);

if ($d_num > 0) {
    while ($d_row = dbFetchArray($d_result)) {
        $d_name = $d_row['dep_name'];
        $dep_id = $d_row['dep_id']; ?>
            <tr height="25" bgcolor="#33CCCC" >
                    <th>
                        <strong><div align=left><?php echo $d_name; ?></strong></div>
                    </th>
                    <th><B><i class='fa fa-globe'></i> ที่ตั้งหน่วยงาน</B></th>
                    <th><B><i class='fa fa-phone'></i> เบอร์โทรศัพท์</B></th>
                    <th><B><i class='fa fa-envelope'></i> website / e-mail</B></th>
            </tr>
        </thead>
        <tbody>
        <?php 
        $g_sql = "SELECT * FROM govern WHERE  g_dep='$dep_id'  ORDER BY g_impo ASC";
        $g_result = dbQuery($g_sql);
        $g_num = dbNumRows($g_result);
        if ($g_num > 0) {
            while ($g_row = dbFetchArray($g_result)) {
                $g_id = $g_row['g_id'];
                $g_position = $g_row['g_position'];
                $g_head_th = $g_row['g_head_th'];
                $g_add = $g_row['g_add'];
                $g_phone = $g_row['g_phone'];
                $g_email = $g_row['g_email'];
                $g_web = $g_row['g_web']; ?>
                    <tr valign=top bgcolor=#FFFFFF>
                            <td>
                                <div align="left"><?php echo $g_position; ?>
                                    <a href="javascript:popup('member/detail_data.php?g_id=<?php echo $g_id; ?>','',950,500)" >
                                    <?php echo $g_head_th; ?></a><BR><BR>
                                </div>
                            </td>
                            <td><div align="left"><?php echo $g_add; ?> </div></td>";
                            <td><div align="left"><?php echo $g_phone; ?></div></td>";
                            <td><div align="left"><?php echo $g_web; ?> <BR><?php echo $g_email; ?></div>
                            </td>
                        </tr>
                <?php
            }
        }
    }
} else {
    ?>
            <tr><td><strong>Telphone</td></tr>
<?php
} ?>
    </tbody>
</table>
