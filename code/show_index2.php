
<table class="table table-bordered">
<?php
$key_w = $_POST['key_w'];
$i = 0;

$s_sql = 'SELECT * FROM ministry ORDER BY m_impo ';
$s_result = dbQuery($s_sql);
$s_num = dbNumRows($s_result);
if ($s_num > 0) {
    while ($s_row = dbFetchArray($s_result)) {
        $s_id = $s_row['m_id'];
        $s_impo = $s_row['m_impo'];
        $s_name = $s_row['m_name'];

        $d_sql = "SELECT * FROM depart WHERE  dep_minis='$s_id' AND dep_name LIKE '%$key_w%' ORDER BY dep_impo ASC";
        $d_result = dbQuery($d_sql);
        $d_num = dbNumRows($d_result);
        if ($d_num > 0) {
            $i = 1; ?>
			<tr height="50" class="bg-secondary text-white";>
				<td colspan="7" ><center><h3><?php echo $s_name; ?></h3></center></td>
			</tr>
			<?php
            while ($d_row = dbFetchArray($d_result)) {
                $d_name = $d_row['dep_name'];
                $dep_id = $d_row['dep_id']; ?>
                <tr height=25 class='bg-info'>
					<td colspan="2"  width="30%"><strong><div align=left><?php echo $d_name; ?></strong></div></td>
					<td class="text-white"><B>โทรศัพท์</B></td>
                    <td class="text-white"><B>แฟกซ์</B></td>
                    <td class="text-white"><B>มือถือ</B></td>
					<td class="text-white"><B>ช่องทางอิเล็กทรอนิกส์สำหรับประชาชน</B></td>
                    <td class="text-white"><b>Update</b></td>
				</tr>			<?php
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
                        $g_email = $g_row['g_email'];
                        $g_pic = $g_row['g_pic'];
                        $g_web = $g_row['g_web']; 
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
                                            <td><div align=left>
                                <?php
                                     echo setformat($g_phone);
                                ?> 
                                </div>
                            </td>
                            <td><div align=left><?php echo setformat($g_fax); ?> </div></td>
                            <td><div align=left><?php echo setformat($g_mobile); ?> </div></td>
							<td>
								<div align=left><?php echo $g_web; ?><br>
								<?php echo $g_email; ?>
								</div>
							</td>
                            <td><div align=left><?php echo $g_update?></div></td>
						</tr>
					<?php
                    }  //  close  while(show  head)
                }   //  close  if ($g_num>0)
            }  //  close  while(show  department)
        }   //    close  if ($d_num>0)
    }  //  close  while(show  ministry)
}   //    close  if ($s_num>0)

if ($i == 0) {
    echo'<tr height=25 bgcolor=#FFFFCC><td colspan=990><div align=center><strong><FONT COLOR=red>No data</FONT></strong></div></td></tr>';
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

