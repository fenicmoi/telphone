<?php
session_start();
$_SESSION["u_user"];

include "header.php";
include("../code/show_user.php");
if ($u_num > 0) {
  include("../code/ad_dep_add.php"); ?>
  <div class="card">
    <div class="card-header text-white bg-secondary">
      เพิ่มหน่วยงาน
    </div>
    <div class="card-body">

      <form action="dep_add.php" method="post">
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-building"></i></span>
          </div>
          <!-- <select class="form-control col-6" name="selMinis" id="selMinis" required> -->
          <select class=" selectpicker form-control col-2" data-live-search="true" title="โปรดระบุ" name="selMinis"
            id="selMinis">
            <option value="12" selected>เลือกกระทรวง</option>
            <?php include("../code/list_minis.php"); ?>
          </select>
        </div>

        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-school"></i></span>
          </div>
          <input type="text" name="d_name" id="d_name" class="form-control col-10" placeholder="ระบุชื่อหน่วยงาน"
            required>

          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-sort-numeric-up"></i></span>
          </div>
          <input type="text" name="d_impo" id="d_impo" class="form-control col-2" placeholder="ระบุลำดับที่" required>
        </div>
        <center>
          <button type="submit" name="btnInsert" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> ok</button>
          <button type="reset" name="reset" class="btn btn-warning btn-sm"><i class="fas fa-undo"></i> reset</button>
          <input name="recal" type="hidden" id="recal" value="recal">
        </center>
      </form>
    </div>
  </div>
  <?php
  include("../code/del_dep.php");
  include("../code/dep_show_last.php");
  ?>
  <div class="card">
    <div class="card-header text-white bg-secondary">
      ข้อมูลหน่วยงานทั้งหมด
    </div>
    <div class="card-body">
      <form action="dep_add.php" method="post" name="form2" target="_parent">
        <?php
        if (isset($_POST["btnSearch"])) {
          $minis2 = $_POST["minis2"];
          $m2_sql = "SELECT * FROM ministry WHERE  m_id='$minis2' ";
          $msee2_row = dbFetchArray(dbQuery($m2_sql));
          $m_name2 = $msee2_row["m_name"];
        } else {
          $minis2 = "12";
          $m_name2 = "กระทรวงมหาดไทย";
        } ?>
        <div class="input-group">
          <!-- <select class="form-control col-6" name="minis2" id="minis2"> -->
          <select class=" selectpicker form-control col-2" data-live-search="true" title="โปรดระบุ" name="minis2"
            id="minis2">
            <option value="<?php echo "$minis2"; ?>" selected><?php echo "$m_name2"; ?></option>
            <?php
            $presee_sql = "SELECT * FROM ministry  ORDER BY m_impo";
            $presee_result = dbQuery($presee_sql);
            $presee_num = dbNumRows($presee_result);
            if ($presee_num > 0) {
              while ($presee_row = dbFetchArray($presee_result)) {
                $m_id2 = $presee_row["m_id"];
                $m_name2 = $presee_row["m_name"];
                ?>
                <option value="<?php echo "$m_id2" ?>"><?php echo "$m_name2" ?></option>
              <?php } //end while
            } else { ?>
              <option value="0">NoData</option>
            <?php } ?>
          </select>
          <button type="submit" class="btn btn-primary" name="btnSearch"><i class="fas  fa-search"></i> ค้นหา</button>
          <input name="hide02" type="hidden" id="hide02" value="recal">
        </div>
        <br>
        <?php include("../code/show_dep.php"); ?>
      </form>
    </div>
  </div> <!-- card -->

  <?php
} else {
  ?>
  <!-- <SCRIPT language=JAVASCRIPT>window.location.replace('../index.php')</SCRIPT>	 -->
  <?php
}
?>
<!-- The Modal Edit -->
<div class="modal" id="modalEdit">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header bg-warning">
        <h4 class="modal-title">แก้ไขหน่วยงาน</h4>
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
#### แก้ไขสังกัด ####
if (isset($_POST['btnEdit'])) {
  $dep_minis = $_POST['minis2'];
  $dep_name = $_POST['dep_name'];
  $dep_impo = $_POST['dep_impo'];
  $dep_id = $_POST['dep_id'];

  $sql = "UPDATE depart SET  dep_impo = '$dep_impo', dep_name = '$dep_name' WHERE dep_id = $dep_id";
  echo $sql;

  $result = dbQuery($sql);
  if ($result) {
    echo "<script>swal('เรียบร้อย!','บันทึกการเปลี่ยนแปลงแล้ว','success');</script>";
    echo "<script>window.location.href = 'dep_add.php'</script>";

  } else {
    echo "<script>swal('ไม่สำเร็จ!','มีบางอย่างผิดพลาด','error');</script>";
  }

}
?>

<?php    ####### ลบหน่วยงาน ######
if (isset($_GET['dep_id'])) {
  $dep_id = $_GET['dep_id'];
  $sql = "DELETE FROM depart WHERE dep_id = $dep_id";
  $result = dbQuery($sql);
  if ($result) {
    echo "<script>swal('เรียบร้อย!','บันทึกการเปลี่ยนแปลงแล้ว','success');</script>";
  } else {
    echo "<script>swal('ไม่สำเร็จ!','มีบางอย่างผิดพลาด','error');</script>";
  }
}
?>

<?php include "footer.php"; ?>

<script>
  function load_edit(dep_id) {
    var sdata = {
      dep_id: dep_id,
    };
    $('#divDataview').load('show_depart_edit.php', sdata);
  }
</script>