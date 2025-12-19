<?php
session_start();
include "header.php";
?>

<div class="card">
  <div class="card-header text-white bg-secondary">
    ข้อมูลผู้ใช้งาน
    <button class="btn btn-light btn-sm float-right " data-toggle="modal" data-target="#modalInsert"><i
        class="fas fa-plus"></i> เพิ่มผู้ใช้</button>
    <button class="btn btn-light btn-sm float-right" data-toggle="modal" data-target="#modalReport"><i
        class="fas fa-print"></i> รายงาน </button>

  </div>
  <div class="card-body">
    <?php include("../code/show_user.php"); ?>
    <?php
    if ($u_num > 0) {
      include("../code/user_pwd_del.php");
      include("../code/show_user_all.php");
    } else {
      echo "nodata";
    } ?>
  </div>
</div>

<!-- The Modal Edit -->
<div class="modal" id="modalInsert">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header bg-warning">
        <h4 class="modal-title"><i class="fas fa-user"></i> เพิ่ม User</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form method="POST">
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">หน่วยงาน</span>
                <select name="dep_add" id="dep_add" class="selectpicker" data-live-search="true" title="โปรดระบุ">
                  <?php
                  $sql_dep = "SELECT * FROM depart  ORDER BY dep_impo";
                  $result_dep = dbQuery($sql_dep);
                  while ($row_dep = dbFetchArray($result_dep)) { ?>
                    <option value="<?php echo $row_dep['dep_id']; ?>">
                      <?php echo $row_dep['dep_name']; ?>
                    </option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <br>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">ประเภทผู้ใช้งาน</span>
              </div>
              <select class="form-control col-2" name="u_type" id="u_type">
                <option value="u" selected>User</option>
                <option value="a">Admin</option>
              </select>

              <div class="input-group-prepend">
                <span class="input-group-text">Username</span>
              </div>
              <input type="text" name="u_user" id="u_user" class="form-control">

              <div class="input-group-prepend">
                <span class="input-group-text">Password</span>
              </div>
              <input type="text" name="u_pass" id="u_pass" class="form-control">
            </div>
            <br>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">คำนำหน้า</span>
              </div>
              <select class=" selectpicker form-control col-2" data-live-search="true" title="โปรดระบุ" name="prefix"
                id="prefix">
                <?php
                $sql = "SELECT * FROM prefix ORDER BY pre_id";
                $result = dbQuery($sql);
                while ($row_prefix = dbFetchArray($result)) { ?>
                  <option value="<?php echo $row_prefix['pre_id']; ?>">
                    <?php echo $row_prefix['pre_name']; ?>
                  </option>
                <?php } ?>
              </select>

              <div class="input-group-prepend">
                <span class="input-group-text">ชื่อ</span>
                <input type="text" id="u_name" name="u_name" class="form-control">
              </div>


              <div class="input-group-prepend">
                <span class="input-group-text">นามสกุล</span>
                <input type="text" id="u_last" name="u_last" class="form-control">
              </div>
            </div>
          </div> <!-- form-group -->
          <br>
          <center>
            <button type="submit" class="btn btn-primary btn-md" name="btnInsert" id="btnInsert"><i
                class="fas fa-check"></i> ตกลง</button>
          </center>
        </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<!-- end model INSERT -->




<!-- The Modal Edit -->
<div class="modal" id="modalEdit">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header bg-warning">
        <h4 class="modal-title"><i class="fas fa-user"></i> แก้ไข User</h4>
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


<?php include "footer.php"; ?>

<?php  ############ RESET ##############
if (isset($_GET['reset_id'])) {
  $reset_id = $_GET['reset_id'];
  $sql = "UPDATE user SET u_pass = 'logon' WHERE u_id = ?";
  $result = dbQueryPrepared($sql, [$reset_id]);
  if ($result) {
    echo "<script>
      swal('เรียบร้อย!', 'รีเซทรหัสผ่านเป็น logon แล้ว', 'success')
      .then(() => {
        window.location.href='user_add.php';
      });
    </script>";
  } else {
    echo "<script>swal('ไม่สำเร็จ!', 'มีบางอย่างผิดพลาด', 'error');</script>";
  }
}
?>

<?php  ############ DELEATE ##############
if (isset($_GET['del_id'])) {
  $del_id = $_GET['del_id'];
  $sql = "DELETE FROM user WHERE u_id = ?";
  $result = dbQueryPrepared($sql, [$del_id]);
  if ($result) {
    echo "<script>
    swal({
      title: 'กำลังจะลบข้อมูล?',
      text: 'คุณแน่ใจนะ!',
      icon: 'warning',
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        swal('OK! เรียบร้อยแล้ว', {
          icon: 'success',
        });
        window.location.href='user_add.php';
      } else {
        swal('OK!');
      }

    });
    </script>";
  } else {
    echo "<script>
swal({
      title: 'ไม่สำเร็จ!',
      text: 'มีบางอย่างผิดพลาด ปฏิบัติการไม่สำเร็จ!',
      icon: 'error',
      button: 'ตกลง!',
    });
    </script>";
  }
}
?>

<?php  ############ INSERT ##############
if (isset($_POST['btnInsert'])) {
  $u_dep_id = $_POST['dep_add'];
  $u_type = $_POST['u_type'];
  $u_user = $_POST['u_user'];
  $u_pass = $_POST['u_pass'];
  $u_prefix = $_POST['prefix'];
  $u_name = $_POST['u_name'];
  $u_last = $_POST['u_last'];

  $sqlInsert = "INSERT INTO user(u_type, u_user, u_pass, u_prefix, u_name, u_last, u_dep_id)
                       VALUES (?, ?, ?, ?, ?, ?, ?)";
  $result = dbQueryPrepared($sqlInsert, [$u_type, $u_user, $u_pass, $u_prefix, $u_name, $u_last, $u_dep_id]);
  if ($result) {
    echo "<script>
            swal({
              title: 'ระบบกำลังจะบันทึกข้อมูล?',
              text: 'คุณแน่ใจนะ!',
              icon: 'warning',
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                swal('OK! เรียบร้อยแล้ว', {
                  icon: 'success',
                });
                window.location.href='user_add.php';
              } else {
                swal('OK!');
              }

            });
            </script>";
  } else {
    echo "<script>
    swal({
              title: 'ผิดพลาด!',
              text: 'มีบางอย่างผิดพลาด ปฏิบัติการไม่สำเร็จ!',
              icon: 'error',
              button: 'ตกลง!',
            });
            </script>";
  }
}
?>


<?php  ############ EDIT ##############
if (isset($_POST['btnEdit'])) {
  $u_id = $_POST['u_id'];
  $u_dep_id = $_POST['depart'];
  $u_type = $_POST['u_type'];
  $u_user = $_POST['u_user'];
  $u_pass = $_POST['u_pass'];
  $u_prefix = $_POST['prefix'];
  $u_name = $_POST['u_name'];
  $u_last = $_POST['u_last'];

  if (!empty($u_pass)) {
    $sql = "UPDATE user SET u_type=?, u_user=?, u_pass=?, u_prefix=?, u_name=?, u_last=?, u_dep_id=? WHERE u_id=?";
    $result = dbQueryPrepared($sql, [$u_type, $u_user, $u_pass, $u_prefix, $u_name, $u_last, $u_dep_id, $u_id]);
  } else {
    $sql = "UPDATE user SET u_type=?, u_user=?, u_prefix=?, u_name=?, u_last=?, u_dep_id=? WHERE u_id=?";
    $result = dbQueryPrepared($sql, [$u_type, $u_user, $u_prefix, $u_name, $u_last, $u_dep_id, $u_id]);
  }
  if ($result) {
    echo "<script>
            swal({
              title: 'คุณแน่ใจนะ?',
              text: 'ระบบกำลังจะทำการแก้ไขรายการ!',
              icon: 'warning',
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                swal('OK! ระบบแก้ไขเรียบร้อยแล้ว', {
                  icon: 'success',
                });
                window.location.href='user_add.php';
              } else {
                swal('คุณไม่แน่ใจอะไรรึ!');
              }

            });
            </script>";
  } else {
    echo "<script>
    swal({
              title: 'ผิดพลาด!',
              text: 'มีบางอย่างผิดพลาด ปฏิบัติการไม่สำเร็จ!',
              icon: 'error',
              button: 'ตกลง!',
            });
            </script>";
  }
}
?>



<!-- Modal รายงาน user -->
<div class="modal fade" id="modelReport1" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h5 class="modal-title">รายงานข้อมูลผู้ใช้</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">

        </div>
        <form action="/action_page.php">
          <select class=" selectpicker form-control" data-live-search="true" title="โปรดระบุ" name="u_dep" id="u_dep">
            <?php include '../code/list_minis_dep.php'; ?>
          </select>

          <div class="form-group form-check">
            <label class="form-check-label">
              <input class="form-check-input" type="checkbox" name="remember"> Remember me
            </label>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>





      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<script>
  function load_edit(u_id) {
    var sdata = {
      u_id: u_id,
    };
    $('#divDataview').load('show_user_edit.php', sdata);
  }

</script>