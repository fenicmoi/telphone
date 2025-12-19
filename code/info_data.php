<style>
.card-img-top {
width: 100%;
height: 40vh;
object-fit: cover;
}
</style>
<?php
session_start(); 
include ("../connection/StartConnect.php");	
include "../connection/function.php";
$g_id = intval($_POST['g_id']);

$sql = "SELECT g.*,d.dep_name,m.m_name FROM govern as g   
        INNER JOIN depart as d ON dep_id = g.g_dep
        INNER JOIN ministry as m ON m.m_id = d.dep_minis
        WHERE g.g_id = $g_id ";

$result = dbQuery($sql);
$row = dbFetchArray($result);
$num_row = dbNumRows($result);

if($num_row>0){?>

<center>
   <table class="table table-bordered table-hover">
      <tr>
          <td colspan=2>
            <?php   
                $g_pic = $row['g_pic'];
                if ($g_pic == ''){
                    $g_pic = '../image/pic_head/avatar.png';
                }
            ?>
            <center><img class="rounded" width="200" height="250"  src="image/pic_head/<?=$g_pic?>" ></center>
        </td>
      </tr>
      <tr>
          <td width="35%">ชื่อ-สกุล</td>
          <td><?php echo $row["g_head_th"];?></td>
      </tr>
      <tr>
          <td>ตำแหน่ง</td>
          <td><?php echo $row["g_position"];?></td>
      </tr>
      <tr>
          <td>ต้นสังกัด</td>
          <td><?php echo $row["dep_name"];?></td>
      </tr>
      <tr>
          <td>โทรศัพท์/โทรสาร</td>
          <td>
                <?php echo setformat($row["g_phone"]);?>/ <?php echo setformat($row["g_fax"]);?>
         </td>
      </tr>
      <tr>
          <td><i class="fa fa-mobile"></i>มือถือ</td>
          <td><?php echo setformat($row["g_mobile"]);?></td>
      </tr>
      <tr>
          <td><i class="fa fa-mobile"></i>HOT LINE</td>
          <td><?php echo $row["g_hotline"];?></td>
      </tr>
      <tr>
          <td><i class="fa fa-mobile"></i>ที่อยู่</td>
          <td><?php echo $row["g_add"];?></td>
      </tr>
      <tr>
          <td><i class="fa fa-mobile"></i>วันที่ Update</td>
          <td><?php echo $row["g_update"];?></td>
      </tr>


   </table>
</center>
   
<?}else{
  ##code
}
?>