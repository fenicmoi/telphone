<?php
include "./header.php";
if (!isset($_SESSION['u_user'])) {
  echo "<script> window.location.href = '../index.php'; </script>";
  exit();
}

$u_user = $_SESSION['u_user'];
$u_id = $_SESSION['u_id'];
$dep_id = $_SESSION['dep_id'];

$sqlDep = "SELECT * FROM depart as d 
           INNER JOIN respon as r ON r.res_dep = d.dep_id 
           WHERE r.res_user = ?
           ORDER BY d.dep_impo ";
$resultDep = dbQueryPrepared($sqlDep, [$u_user]);
?>
<script src='../js/function.js'></script>
<script src='../js/jquery.validate.js'></script>
<br />
<table class="table table-bordered">
  <?php
  while ($rowDep = dbFetchArray($resultDep)) {
    $depart = $rowDep['dep_id']; ?>
    <tr class='bg-secondary text-white'>
      <td colspan='10'>
        <h6><?php echo $rowDep['dep_name']; ?></h6>
      </td>
    </tr>
    <tr>
      <td>ที่</td>
      <td>รูป</td>
      <td>ชื่อ/ตำแหน่ง</td>
      <td>มือถือ</td>
      <td>โทรศัพท์</td>
      <td>แฟกซ์</td>
      <td>Hotline</td>
      <td>อีเมลล์</td>
      <td>Update</td>
      <td><a href='#' class='btn btn-primary' data-toggle='modal' data-target='#modalInsert'
          onclick='load_Insert(<?php echo $depart; ?>)'><i class='fas fa-plus'>เพิ่มข้อมูล</i></a></td>
    </tr>
    <?php
    $sql = "SELECT * FROM govern as g 
                      INNER JOIN respon as r ON g.g_dep = r.res_dep
                      WHERE r.res_dep = ? AND r.res_user = ?
                      ORDER BY g.g_impo ";

    $result = dbQueryPrepared($sql, [$depart, $u_user]);
    $count = 1;
    while ($row = dbFetchArray($result)) { ?>
      <tr>
        <td><?php echo $count; ?></td>
        <td>
          <?php
          $g_pic = $row['g_pic'];
          if ($g_pic == '') {
            $g_pic = 'avatar.png';
          }
          ?>
          <img class="rounded" width="80" height="100" src="../image/pic_head/<?= $g_pic ?>">
        </td>
        <td>
          <dl>
            <dt><?= $row['g_head_th'] ?></dt>
            <dd>- <?= $row['g_position'] ?></dd>
          </dl>
          <a href="#" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#modalInfo"
            onclick="load_data('<?php echo $row['g_id']; ?>');">
            <i class="fas fa-info"></i> ข้อมูลอื่นๆ
          </a>
        </td>
        <td><?php echo setformat($row['g_mobile']); ?></td>
        <td><?php echo setformat($row['g_phone']); ?></td>
        <td><?php echo setformat($row['g_fax']); ?></td>
        <td><?php echo $row['g_hotline']; ?></td>
        <td><?= $row['g_email'] ?></td>
        <td><?= $row['g_update'] ?></td>
        <td>
          <a href="javascript:void(0);" class="btn btn-warning btn-sm"
            onclick="confirmEdit(() => { load_edit('<?php echo $row['g_id']; ?>'); $('#modalEdit').modal('show'); });">
            <i class="fas fa-edit"></i>
          </a>
          <a href="javascript:void(0);" class="btn btn-danger btn-sm" onclick="load_remove('<?php echo $row['g_id']; ?>');">
            <i class="fas fa-trash-alt"></i>
          </a>
        </td>
      </tr>
      <?php $count++;
    } //loop 2
  } //loop 1
  ?>
</table>

<!-- แสดงรายละเอียด -->
<div class="modal fade" id="modalInfo">
  <div class="modal-dialog modal-lg">
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








  <!-- หน้าต่างแก้ไขข้อมูล -->
  <div class="modal fade" id="modalEdit">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header bg-warning">
          <span class="modal-title"><i class="fas fa-edit"></i> แก้ไขข้อมูล</span>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <div id="divEdit"></div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer bg-warning">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>

  <!-- Modal เพิ่มข้อมูล -->
  <div class="modal fade" id="modalInsert" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header bg-warning">
          <h5 class="modal-title"><i class="fas fa-plus"></i> เพิ่มข้อมูล</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div id="divInsert"></div>
        </div> <!-- modail body -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>

        </div>
        </form>

      </div>
    </div>
  </div>


  <?php
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
    $g_update = date("Y-m-d");
    $g_upbyuser = $_POST['u_id'];

    //ส่วนการจัดการรูปภาพ
    $uploadOk = 1;    //กำหนดสถานะในการจัดการรูป
    $target_dir = "../image/pic_head/";      //path
    $filename = basename($_FILES['g_pic']["name"]);    //filename
    $imageFileType = strtolower(pathinfo($filename, PATHINFO_EXTENSION));  //ตัดเอาเฉพาะนามสกุล
  
    if ($_FILES["g_pic"]["size"] >= 600000) {
      $uploadOk = 0;
      echo "<script>
      Swal.fire({
        title: 'ภาพมีขนาดใหญ่เกินไป!',
        text: 'ไฟล์ภาพต้องมีขนาดไม่เกิน 500 KB เท่านั้น!',
        icon: 'warning',
        confirmButtonText: 'ตกลง',
      }).then(function() {
        window.location = 'show_data.php';
      });
      </script>";
    }

    if ($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png" && $imageFileType != "gif") {
      $uploadOk = 0;
      echo "<script>
      Swal.fire({
        title: 'ผิดพลาด!',
        text: 'อนุญาตเฉพาะไฟล์นามสกุล jpg,jpeg,png หรือ gif เท่านั้น!',
        icon: 'error',
        confirmButtonText: 'ตกลง',
      }).then(function() {
        window.location = 'show_data.php';
      });
      </script>";
    } //file type
  
    if ($uploadOk == 1) {

      $date = date("Ymd");
      $numran = rand(10000, 99999);
      $newname = $date . $numran . "." . $imageFileType;
      $path_copy = $target_dir . $newname;
      move_uploaded_file($_FILES['g_pic']["tmp_name"], $path_copy);

    } // check uploadOk 
  
    $sqlInsert = "INSERT INTO govern(g_dep, g_impo, g_head_th, g_position, g_add, g_phone, g_hotline, g_fax, g_mobile, g_email, g_pic, g_update, g_upbyuser) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $result = dbQueryPrepared($sqlInsert, [$g_dep, $g_impo, $g_head_th, $g_position, $g_add, $g_phone, $g_hotline, $g_fax, $g_mobile, $g_email, $newname, $g_update, $u_id]);
    if ($result) {
      echo "<script>
      Swal.fire({
        title: 'สำเร็จ!',
        text: 'บันทึกข้อมูลแล้ว!',
        icon: 'success',
        confirmButtonText: 'ตกลง'
      }).then(function() {
        window.location = 'show_data.php';
      });
      </script>";
    } else {
      echo "<script>
      Swal.fire({
        title: 'ผิดพลาด!',
        text: 'มีบางอย่างผิดพลาด!',
        icon: 'error',
        confirmButtonText: 'ตกลง',
      }).then(function() {
        window.location = 'show_data.php';
      });
      </script>";
    } //check result
  
  }  //check btn save
  
  ?>

  <!-- head-edit -->
  <?php
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
    $g_upbyuser = $u_id;
    $g_pic = $_FILES['g_pic'];


    if ($g_pic["name"] != null) {   //ตรวจสอบว่ามีการส่งไฟล์ภาพมาด้วยหรือไม่
      $target_dir = "../image/pic_head/";
      $filename = basename($g_pic["name"]);
      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($filename, PATHINFO_EXTENSION));  //ตัดเอาเฉพาะนามสกุล
  


      if ($_FILES["g_pic"]["size"] >= 6000000) {
        $uploadOk = 0;
        echo "<script>
        Swal.fire({
          title: 'ภาพมีขนาดใหญ่เกินไป!',
          text: 'ไฟล์ภาพต้องมีขนาดไม่เกิน 500 KB เท่านั้น!',
          icon: 'warning',
          confirmButtonText: 'ตกลง',
        }).then(function() {
          window.location = 'show_data.php';
        });
        </script>";
      }


      if ($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png" && $imageFileType != "gif") {
        $uploadOk = 0;
        echo "<script>
        Swal.fire({
          title: 'ผิดพลาด!',
          text: 'อนุญาตเฉพาะไฟล์นามสกุล jpg,jpeg,png หรือ gif เท่านั้น!',
          icon: 'error',
          confirmButtonText: 'ตกลง',
        }).then(function() {
          window.location = 'show_data.php';
        });
        </script>";
      } //file tpe
  
      if ($uploadOk == 1) {

        $date = date("Ymd");
        $numran = rand(10000, 99999);
        $newname = $date . $numran . "." . $imageFileType;
        $path_copy = $target_dir . $newname;
        move_uploaded_file($g_pic["tmp_name"], $path_copy);


        $sqlUpdate = "UPDATE govern SET 
                              g_impo = ?,
                              g_head_th = ?,
                              g_position = ?,
                              g_add = ?,
                              g_phone = ?,
                              g_hotline = ?,
                              g_fax = ?,
                              g_mobile = ?,
                              g_email = ?,
                              g_web = ?,
                              g_pic = ?,
                              g_update = ?,
                              g_upbyuser = ?
                        WHERE g_id = ?";
        $result = dbQueryPrepared($sqlUpdate, [$g_impo, $g_head_th, $g_position, $g_add, $g_phone, $g_hotline, $g_fax, $g_mobile, $g_email, $g_web, $newname, $g_update, $u_id, $g_id]);
      } // check uploadOk 
  
    } else {  //ถ้าไม่มีการส่งไฟล์ภาพมา
      $sqlUpdate = "UPDATE govern SET 
                              g_impo = ?,
                              g_head_th = ?,
                              g_position = ?,
                              g_add = ?,
                              g_phone = ?,
                              g_hotline = ?,
                              g_fax = ?,
                              g_mobile = ?,
                              g_email = ?,
                              g_web = ?,
                              g_update = ?,
                              g_upbyuser = ?
                        WHERE g_id = ?";
      $result = dbQueryPrepared($sqlUpdate, [$g_impo, $g_head_th, $g_position, $g_add, $g_phone, $g_hotline, $g_fax, $g_mobile, $g_email, $g_web, $g_update, $u_id, $g_id]);
    }

    if ($result) {
      echo "<script>
      Swal.fire({
        title: 'สำเร็จ!',
        text: 'แก้ไขข้อมูลแล้ว!',
        icon: 'success',
        confirmButtonText: 'ตกลง'
      }).then(function() {
        window.location.href = 'show_data.php';
      });
      </script>";
    } else {
      echo "<script>
      Swal.fire({
        title: 'ผิดพลาด!',
        text: 'มีบางอย่างผิดพลาด!',
        icon: 'error',
        confirmButtonText: 'ตกลง',
      }).then(function() {
        window.location.href = 'show_data.php';
      });
      </script>";
    }

  }
  ?>


  <?php include './footer.php'; ?>

  <script type="text/javascript">
    $(document).ready(function () {
      $("#signupForm").validate({
        rules: {
          g_impo: "required",
          g_position: "required",
          g_head_th: "required",
          g_pic: "required",
          g_add: "required",
          g_phone: "required",
          g_mobile: "required",
          g_fax: "required",

          email: {
            required: true,
            email: true
          },
        },
        messages: {
          g_impo: "กรุณาระบุลำดับข้อมูล",
          g_position: "กรุณาระบุตำแหน่งหน้าที่",
          g_head_th: "กรุณาระบุชื่อ-สกุล",
          g_pic: "กรุณาเลือกภาพ",
          g_add: "กรุณาระบุที่อยู่",
          g_phone: "กรุณาระบุเบอร์โทรสำนักงาน",
          g_mobile: "กรุณาระบุเบอร์โทรศัพท์มือถือ",
          email: "กรุณาใส่รูปแบบ E-mail ให้ถูกต้อง",
        },
        errorElement: "em",
        errorPlacement: function (error, element) {
          // Add the `invalid-feedback` class to the error element
          error.addClass("invalid-feedback");

          if (element.prop("type") === "checkbox") {
            error.insertAfter(element.next("label"));
          } else {
            error.insertAfter(element);
          }
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass("is-invalid").removeClass("is-valid");
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).addClass("is-valid").removeClass("is-invalid");
        }
      });

    });


    function load_Insert(depart) {
      var sdata = {
        depart: depart,
      };
      $('#divInsert').load('insertBoss.php', sdata);
    }

    function load_data(g_id) {   /* ส่งค่าแสดงรายละเอียด  */
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


    function load_remove(g_id) {
      var sdata = {
        g_id: g_id
      };

      Swal.fire({
        title: 'กำลังจะลบข้อมูล?',
        text: 'คุณแน่ใจนะ!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'ตกลง',
        cancelButtonText: 'ยกเลิก'
      }).then((result) => {
        if (result.value) { // ถ้ากดปุ่ม ok  
          $.ajax({
            type: "POST",
            url: "del_user.php",
            data: sdata,
            success: function (result) {
              if (result.success == 1) {
                Swal.fire("สำเร็จ!", "ลบข้อมูลเรียบร้อยแล้ว!", "success").then(() => {
                  location.href = 'show_data.php';
                });
              } else {
                Swal.fire("Error!", "มีบางอย่างผิดปกติ!", "error").then(() => {
                  location.href = 'show_data.php';
                });
              }
            }
          });
        }
      }); //swal
    }

  </script>