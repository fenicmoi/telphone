<?php
#### จัดการสังกัด ####
session_start();
$u_user = $_SESSION["u_user"];

include "header.php";
//include ("../connection/StartConnect.php");	
?>
<br>
<div class="card">
  <div class="card-header  bg-info">
    เพิ่มตั้นสังกัด
  </div>
  <div class="card-body">
    <form action="minis_add.php" method="post" name="form1" target="_parent">
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text">ชื่อต้นสังกัด</span>
        </div>
        <input name="m_name" type="text" id="m_name" class="form-control col-10" required>
        &nbsp;
        <div class="input-group-prepend">
          <span class="input-group-text">ลำดับที่</span>
        </div>
        <input name="m_impo" type="text" id="m_impo" class="form-control col-2" required>
      </div>
      <center>
        <input type="submit" name="btnInsert" id="btnInsert" value="ตกลง" class="btn btn-primary  btn-sm">
        <input name="Submit2" type="reset" value="ยกเลิก" class="btn btn-secondary btn-sm">
      </center>
      <input name="recal" type="hidden" id="recal" value="recal">
    </form>
  </div> <!-- card -body -->
</div> <!-- card -->


<!-- The Modal Edit -->
<div class="modal" id="modalEdit">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header bg-warning">
        <h4 class="modal-title">แก้ไขต้นสังกัด</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div id="divDataview"></div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<!-- end model edit -->
<?php

include("../code/show_user.php");
if ($u_num > 0) {
  //include ("../code/ad_minis_add.php");	
} else {
  echo "<SCRIPT language=JAVASCRIPT>window.location.replace('../index.php')</SCRIPT>	";
}

include("../code/del_minis.php");
include("../code/show_minis.php");

#### เพิ่มสังกัด ####

if (isset($_POST['btnInsert'])) {
  @$m_name = $_POST['m_name'];
  @$m_impo = $_POST['m_impo'];

  $sql = "SELECT * FROM ministry WHERE m_name = ?";
  $result = dbQueryPrepared($sql, [$m_name]);
  $num = dbNumRows($result);
  if ($num > 0) {
    echo "<script>
              swal({
                    title: 'ชื่อสังกัดซ้ำ!',
                    text: 'ระบบมีชื่อนี้อยู่แล้ว!',
                    icon: 'error',
                    button: 'ตกลง!',
              });
             </script>";
    exit();
  } else {
    $sql = "INSERT INTO ministry(m_impo, m_name) VALUES (?, ?)";
    $result = dbQueryPrepared($sql, [$m_impo, $m_name]);
    if ($result) {
      echo "<script>swal('เรียบร้อย!','บันทึกการเปลี่ยนแปลงแล้ว','success');</script>";
    } else {
      echo "<script>swal('ไม่สำเร็จ!','มีบางอย่างผิดพลาด','error');</script>";
    }
  } //check num
}
?>
<?php
#### แก้ไขสังกัด ####
if (isset($_POST['btnEdit'])) {
  $m_id = $_POST['m_id'];
  $m_name = $_POST['m_name'];
  $m_impo = $_POST['m_impo'];

  $sql = "UPDATE ministry SET m_impo = ?, m_name = ? WHERE m_id = ?";
  $result = dbQueryPrepared($sql, [$m_impo, $m_name, $m_id]);
  if ($result) {
    echo "<script>swal('เรียบร้อย!','บันทึกการเปลี่ยนแปลงแล้ว','success');</script>";
  } else {
    echo "<script>swal('ไม่สำเร็จ!','มีบางอย่างผิดพลาด','error');</script>";
  }
}
?>

<?php    ####### ลบต้นสังกัด ######
if (isset($_GET['m_id'])) {
  $m_id = $_GET['m_id'];
  $sql = "DELETE FROM ministry WHERE m_id = ?";
  $result = dbQueryPrepared($sql, [$m_id]);
  if ($result) {
    echo "<script>swal('เรียบร้อย!','บันทึกการเปลี่ยนแปลงแล้ว','success');</script>";
  } else {
    echo "<script>swal('ไม่สำเร็จ!','มีบางอย่างผิดพลาด','error');</script>";
  }
}
?>

<?php include "footer.php" ?>

<!--  javascript -->
<script>
  $(document).ready(function () {
    $('#show_minis').DataTable();
  });


  function load_edit(m_id) {
    var sdata = {
      m_id: m_id,
    };
    $('#divDataview').load('show_minis_edit.php', sdata);
  }
</script>