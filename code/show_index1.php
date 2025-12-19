<?php
//echo 'show1';
$minis = $_POST['minis'];
if ($minis == '') {
    $minis = 12;
}

$s_sql = "SELECT * FROM ministry WHERE  m_id='$minis' ";
$s_row = dbFetchArray($s_result = dbQuery($s_sql));
$s_name = $s_row['m_name'];
?>
<table class="table table-bordered">
	<tr height="30" class="bg-secondary">
		<td colspan="8">
			<div class="text-white" align="center">
				<h3><?php echo $s_name; ?></h3>
			</div>
		</td>
	</tr>
<?php
$d_sql = "SELECT * FROM depart WHERE  dep_minis='$minis' ORDER BY dep_impo ASC";
$d_result = dbQuery($d_sql);
$d_num = dbNumRows($d_result);
if ($d_num > 0) {
    while ($d_row = dbFetchArray($d_result)) {
        $d_name = $d_row['dep_name'];
        $dep_id = $d_row['dep_id'];?>

        <tr height=25 bgcolor=#33CCCC >
            <td width=20% colspan=2><div  align=left><?=$d_name?></strong></div></td>
            <td><B> โทรศัพท์</B></td>
            <td><B> โทรสาร</B></td>
            <td><B> มือถือ</B></td>
            <td><b> Hotline</b></td>
            <td><B> ช่องทางอิเล็กทรอนิกส์สำหรับประชาชน</B></td>
            <td><b>Update</b></td>
        </tr>
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
                $g_fax = $g_row['g_fax'];
                $g_mobile = $g_row['g_mobile'];
                $g_hotline = $g_row['g_hotline'];
                $g_email = $g_row['g_email'];
                $g_web = $g_row['g_web']; 
                $g_pic = $g_row['g_pic'];
                $g_update = $g_row['g_update'];
                ?>

        <tr valign=top bgcolor=#FFFFFF>
            <td> <img class="rounded" width="80" height="100"  src="image/pic_head/<?php echo $g_pic?>" ></td>
            <td>
                <div align=left> &nbsp;&nbsp;<B><FONT  COLOR=006600><?=$g_position?></FONT></B> <BR>  
                    &nbsp;&nbsp; <a href="" data-toggle="modal" data-target="#modelDetail"  onclick="load_data('<?php echo $g_id;?>');"><?=$g_head_th;?> </a>
                    <BR><BR>
                </div>
            </td>
            <td><div align=left><?php echo setformat($g_phone)?> </div></td>
            <td><div align=left><?php echo setformat($g_fax)?> </div></td>
            <td><div align=left><?php echo setformat($g_mobile)?> </div></td>
            <td><div align=left><?php echo $g_hotline?></div></td>
            <td><div align=left><?php echo $g_web ?><BR><?php echo $g_email?></div></td>
            <td><div align=left><?php echo $g_update?></div></td>
        </tr>
          
                <?php 
            }
        }
    }
} else {
    echo'<tr height=25 bgcolor=#FFFFCC><td colspan=4<div align=center><strong><FONT COLOR=red>Telphone</FONT></strong></div></td></tr>';
}
?>		
</table>		



<!-- Modal -->
<div class="modal fade" id="modelDetail" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h5 class="modal-title"><i class="fa fa-info"></i> รายละเอียด</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
         <div id="divDataview"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>

