
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<!-- bootstrap select -->
<link rel="stylesheet" href="css/bootstrap-select.css">	
<script src="js/bootstrap-select.js"></script>
<script type="text/javascript">
    $('.selectpicker').selectpicker({
      });
</script>
<?php
include "../connection/StartConnect.php";
session_start(); 

$u_user = $_SESSION['u_user'];
$u_id = $_SESSION['u_id'];

$g_id = $_POST['g_id'];
$sql = "SELECT * FROM govern WHERE g_id = $g_id";
$result = dbQuery($sql);
$row = dbFetchAssoc($result);
?>
<form   method="POST" action="head_add.php" enctype="multipart/form-data">
    <table class="table table-strap">
      <tr>
        <td colspan="4">
            <center><img class="rounded" hight="150px" width="125px" src="../image/pic_head/<?php echo $row['g_pic'];?>"></center>
            <br>
            <center><input type="file" class="form-control col-sm-6" id="g_pic" name="g_pic"></center>
        </td>
      </tr>
      <tr>
        <td><i class="fas fa-sort-numeric-up"></i> <label>ลำดับข้อมูล</label></td>
        <td colspan="3"><input type="number" name="g_impo" id="g_impo" class="form-control col-sm-4" value="<?php echo $row['g_impo'];?>"></td>
      </tr>
      <tr>
        <td><i class="fas fa-star"></i> ตำแหน่ง</td>
        <td colspan="3"> <input type="text" name="g_position" id="g_position" class="form-control" value="<?php echo $row['g_position'];?>"></td>
      </tr>
      <tr>
        <td>ชื่อ-สกุล</td>
        <td colspan="3"><input type="text" name="g_head_th" id="g_head_th" class="form-control" value="<?php echo $row['g_head_th'];?>"></td>
      </tr>
      <tr>
        <td><i class="fas fa-tty"></i> โทรศัพท์</td>
        <td><input type="text" name="g_phone" id="g_phone" class="form-control" value="<?php echo $row['g_phone'];?>"></td>
        <td><i class="fas fa-fax"></i> โทรสาร</td>
        <td><input type="text" name="g_fax" id="g_fax" class="form-control" value="<?php echo $row['g_fax'];?>"></td>
      </tr>
      <tr>
        <td><i class="fas fa-mobile-alt"></i> มือถือ</td>
        <td><input type="text" name="g_mobile" id="g_mobile" class="form-control" value="<?php echo $row['g_mobile'];?>"></td>
        <td><i class="fas fa-satellite-dish"></i> สายด่วน</td>
        <td><input type="text" name="g_hotline" id="g_hotline" class="form-control" value="<?php echo $row['g_hotline'];?>"></td>
      </tr>
      <tr>
        <td><i class="fas fa-envelope"></i> E-mail </td>
        <td><input type="text" name="g_email" id="g_email" class="form-control" value="<?php echo $row['g_email'];?>"></td>
      </tr>
      <tr>
        <td><i class="fas fa-globe"></i> website</td>
        <td colspan="3"><input type="text" name="g_web" id="g_web" class="form-control" value="<?php echo $row['g_web'];?>"></td>
      </tr>
      <tr>
        <td><i class="fas fa-at"></i> ที่อยู่</td>
        <td colspan="3"><input type="text" name="g_add" id="g_add" class="form-control" value="<?php echo $row['g_add'];?>"></td>
      </tr>
    </table>

    <br>
    <center>
    <button type="submit" class="btn btn-primary btn-md" name="btnEdit" id="btnEdit"><i class="fas fa-check"></i> ตกลง</button>
    <input type="hidden" id="g_id" name="g_id" value="<?php print $row['g_id'];?>">
    </center>
</form>

