<?php
session_start();


include "header.php";
include("../code/show_user.php");

//$_SESSION["u_user"];

if ($u_num > 0) { ?>
  <div class="card">
    <div class="card-header bg-secondary text-white">
      <i class="fas fa-user-tie"></i> ข้อมูลผู้บริหาร
      <button class="btn btn-primary btn-sm float-right" onclick="load_insert()" data-toggle="modal"
        data-target="#modalInsert">
        <i class="fas fa-plus"></i> เพิ่มผู้บริหาร
      </button>
    </div>
    <div class="card-body">
      <?php
      include "../code/head_add.php";
      include "../code/del_head.php";
      ?>
    </div>
    <div class="card-footer text-muted">
      Footer
    </div>
  </div>
<?php } else {
  echo "error";
} ?>
<!-- แสดงรายละเอียด -->
<div class="modal fade" id="modDetail">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header bg-primary">
        <span class="modal-title text-white"><i class="fas fa-info"></i> รายละเอียด</span>
        <button type="button" class="close" data-dismiss="modal">×</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div id="divDataview"></div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<!-- หน้าต่างแก้ไขข้อมูล -->
<div class="modal fade" id="modEdit">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <span class="modal-title"><i class="fas fa-edit"></i> แก้ไขข้อมูล</span>
        <button type="button" class="close" data-dismiss="modal">×</button>
      </div>
      <div class="modal-body">
        <div id="divEdit"></div>
      </div>
      <div class="modal-footer bg-warning">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- หน้าต่างเพิ่มข้อมูล -->
<div class="modal fade" id="modalInsert">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <span class="modal-title text-white"><i class="fas fa-plus"></i> เพิ่มผู้บริหาร</span>
        <button type="button" class="close" data-dismiss="modal">×</button>
      </div>
      <div class="modal-body">
        <div id="divInsert"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<?php include "footer.php"; ?>

<!-- head-edit -->
<?php
// Handle Edit Executive
if (isset($_POST["btnEdit"])) {
  $g_id = $_POST['g_id'];
  $g_impo = $_POST['g_impo'];
  $g_head_th = $_POST['g_head_th'];
  $g_position = $_POST['g_position'];
  $g_add = $_POST['g_add'];
  $g_phone = $_POST['g_phone'];
  $g_hotline = $_POST['g_hotline'];
  $g_fax = $_POST['g_fax'];
  $g_mobile = $_POST['g_mobile'];
  $g_email = $_POST['g_email'];
  $g_web = $_POST['g_web'];
  $g_update = date('Y-m-d');
  $g_upbyuser = $_SESSION['u_id'];

  $uploadOk = 1;
  $target_dir = "../image/pic_head/";
  $newname = "";

  if (isset($_FILES['g_pic']) && $_FILES['g_pic']['error'] == 0) {
    $filename = basename($_FILES['g_pic']["name"]);
    $imageFileType = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

    if ($_FILES["g_pic"]["size"] >= 600000) {
      $uploadOk = 0;
      echo "<script>Swal.fire('ภาพมีขนาดใหญ่เกินไป!', 'ไฟล์ภาพต้องมีขนาดไม่เกิน 500 KB เท่านั้น!', 'warning');</script>";
    }

    if ($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png" && $imageFileType != "gif") {
      $uploadOk = 0;
      echo "<script>Swal.fire('ผิดพลาด!', 'อนุญาตเฉพาะไฟล์นามสกุล jpg, jpeg, png หรือ gif เท่านั้น!', 'error');</script>";
    }

    if ($uploadOk == 1) {
      $date = date("Ymd");
      $numran = rand(10000, 99999);
      $newname = $date . $numran . "." . $imageFileType;
      $path_copy = $target_dir . $newname;
      move_uploaded_file($_FILES['g_pic']["tmp_name"], $path_copy);

      $sqlUpdate = "UPDATE govern SET g_impo = ?, g_head_th = ?, g_position = ?, g_add = ?, g_phone = ?, g_hotline = ?, g_fax = ?, g_mobile = ?, g_email = ?, g_web = ?, g_pic = ?, g_update = ?, g_upbyuser = ? WHERE g_id = ?";
      $result = dbQueryPrepared($sqlUpdate, [$g_impo, $g_head_th, $g_position, $g_add, $g_phone, $g_hotline, $g_fax, $g_mobile, $g_email, $g_web, $newname, $g_update, $g_upbyuser, $g_id]);
    }
  } else {
    $sqlUpdate = "UPDATE govern SET g_impo = ?, g_head_th = ?, g_position = ?, g_add = ?, g_phone = ?, g_hotline = ?, g_fax = ?, g_mobile = ?, g_email = ?, g_web = ?, g_update = ?, g_upbyuser = ? WHERE g_id = ?";
    $result = dbQueryPrepared($sqlUpdate, [$g_impo, $g_head_th, $g_position, $g_add, $g_phone, $g_hotline, $g_fax, $g_mobile, $g_email, $g_web, $g_update, $g_upbyuser, $g_id]);
  }

  if ($uploadOk == 1) {
    if ($result) {
      echo "<script>
              Swal.fire('สำเร็จ!', 'แก้ไขข้อมูลแล้ว!', 'success').then(() => {
                window.location = 'head_add.php';
              });
            </script>";
    } else {
      echo "<script>Swal.fire('ผิดพลาด!', 'มีบางอย่างผิดพลาด ปฏิบัติการไม่สำเร็จ!', 'error');</script>";
    }
  }
}

// Handle Add Executive
if (isset($_POST['btnSave'])) {
  $g_dep = $_POST['g_dep'];
  $g_impo = $_POST['g_impo'];
  $g_head_th = $_POST['g_head_th'];
  $g_position = $_POST['g_position'];
  $g_add = $_POST['g_add'];
  $g_phone = $_POST['g_phone'];
  $g_hotline = $_POST['g_hotline'];
  $g_fax = $_POST['g_fax'];
  $g_mobile = $_POST['g_mobile'];
  $g_email = $_POST['g_email'];
  $g_web = $_POST['g_web'];
  $g_update = date("Y-m-d");
  $g_upbyuser = $_SESSION['u_id'];

  $uploadOk = 1;
  $target_dir = "../image/pic_head/";
  $newname = "";

  if (isset($_FILES['g_pic']) && $_FILES['g_pic']['error'] == 0) {
    $filename = basename($_FILES['g_pic']["name"]);
    $imageFileType = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

    if ($_FILES["g_pic"]["size"] >= 600000) {
      $uploadOk = 0;
      echo "<script>Swal.fire('ภาพมีขนาดใหญ่เกินไป!', 'ไฟล์ภาพต้องมีขนาดไม่เกิน 500 KB เท่านั้น!', 'warning');</script>";
    }

    if ($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png" && $imageFileType != "gif") {
      $uploadOk = 0;
      echo "<script>Swal.fire('ผิดพลาด!', 'อนุญาตเฉพาะไฟล์นามสกุล jpg, jpeg, png หรือ gif เท่านั้น!', 'error');</script>";
    }

    if ($uploadOk == 1) {
      $date = date("Ymd");
      $numran = rand(10000, 99999);
      $newname = $date . $numran . "." . $imageFileType;
      $path_copy = $target_dir . $newname;
      move_uploaded_file($_FILES['g_pic']["tmp_name"], $path_copy);
    }
  }

  if ($uploadOk == 1) {
    $sqlInsert = "INSERT INTO govern (g_dep, g_impo, g_head_th, g_position, g_add, g_phone, g_hotline, g_fax, g_mobile, g_email, g_web, g_pic, g_update, g_upbyuser) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $result = dbQueryPrepared($sqlInsert, [$g_dep, $g_impo, $g_head_th, $g_position, $g_add, $g_phone, $g_hotline, $g_fax, $g_mobile, $g_email, $g_web, $newname, $g_update, $g_upbyuser]);
    if ($result) {
      echo "<script>
              Swal.fire('สำเร็จ!', 'เพิ่มข้อมูลผู้บริหารเรียบร้อยแล้ว!', 'success').then(() => {
                window.location = 'head_add.php';
              });
            </script>";
    } else {
      echo "<script>Swal.fire('ผิดพลาด!', 'มีบางอย่างผิดพลาด ปฏิบัติการไม่สำเร็จ!', 'error');</script>";
    }
  }
}
?>


<script>
  function load_data(g_id) {
    var sdata = {
      g_id: g_id,
    };
    $('#divDataview').load('../member/detail_data.php', sdata);
  }


  function load_edit(g_id) {
    var sdata = {
      g_id: g_id,
    };
    $('#divEdit').load('show_head_edit.php', sdata);
  }

  function load_insert() {
    $('#divInsert').load('show_head_insert.php');
  }


  function autoTab(obj) {
    var pattern = new String("___-______"); // กำหนดรูปแบบในนี้
    var pattern_ex = new String("-"); // กำหนดสัญลักษณ์หรือเครื่องหมายที่ใช้แบ่งในนี้
    var returnText = new String("");
    var obj_l = obj.value.length;
    var obj_l2 = obj_l - 1;
    for (i = 0; i < pattern.length; i++) {
      if (obj_l2 == i && pattern.charAt(i + 1) == pattern_ex) {
        returnText += obj.value + pattern_ex;
        obj.value = returnText;
      }
    }
    if (obj_l >= pattern.length) {
      obj.value = obj.value.substr(0, pattern.length);
    }
  }

  function autoTabMobile(obj) {
    var pattern = new String("___-_______"); // กำหนดรูปแบบในนี้
    var pattern_ex = new String("-"); // กำหนดสัญลักษณ์หรือเครื่องหมายที่ใช้แบ่งในนี้
    var returnText = new String("");
    var obj_l = obj.value.length;
    var obj_l2 = obj_l - 1;
    for (i = 0; i < pattern.length; i++) {
      if (obj_l2 == i && pattern.charAt(i + 1) == pattern_ex) {
        returnText += obj.value + pattern_ex;
        obj.value = returnText;
      }
    }
    if (obj_l >= pattern.length) {
      obj.value = obj.value.substr(0, pattern.length);
    }
  }


</script>