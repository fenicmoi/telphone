<?php
session_start(); 


include "header.php";
include ("../code/show_user.php");	

//$_SESSION["u_user"];

if ($u_num>0){?>
    <div class="card">
        <div class="card-header bg-secondary text-white">
        <i class="fas fa-user-tie"></i> ข้อมูลผู้บริหาร
        <a href="" class="btn btn-primary"><i class="fas fa-plus"></i> เพิ่มผู้บริหาร ยังใช้ไม่ได้นะ</a>
        </div>
        <div class="card-body">
           <?php include "../code/head_add.php";?>
        </div>
        <div class="card-footer text-muted">
            Footer
        </div>
    </div>
<?php }else{ 
    echo "error";
}?>
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

 <?php include "footer.php";?>

<!-- head-edit -->
<?php
  if(isset($_POST["btnEdit"])){
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

    if($g_pic["name"] != null){   //ตรวจสอบว่ามีการส่งไฟล์ภาพมาด้วยหรือไม่
        $target_dir = "../image/pic_head/";
        $filename = basename($g_pic["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($filename,PATHINFO_EXTENSION));  //ตัดเอาเฉพาะนามสกุล
   

     
          if ($_FILES["g_pic"]["size"] >= 600000) {
                $uploadOk = 0;
                echo "<script>
                      swal({
                                title: 'ภาพมีขนาดใหญ่เกินไป!',
                                text: 'ไฟล์ภาพต้องมีขนาดไม่เกิน 500 KB เท่านั้น!',
                                icon: 'warning',
                                button: 'ตกลง!',
                              }).then(function(){
                                  window.location = 'show_data.php';
                              });
                    </script>";
          }
            
        
        if($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png" && $imageFileType != "gif"){
            $uploadOk = 0;
            echo "<script>
                    swal({
                              title: 'ผิดพลาด!',
                              text: 'อนุญาตเฉพาะไฟล์นามสกุล jpg,jpeg,png หรือ gif เท่านั้น!',
                              icon: 'error',
                              button: 'ตกลง!',
                            }).then(function(){
                                window.location = 'show_data.php';
                            });
                  </script>";
        } //file tpe

        if($uploadOk == 1){
        
          $date = date("Ymd");
          $numran = rand ( 10000 , 99999 );
          $newname = $date.$numran.".".$imageFileType;
          $path_copy=$target_dir.$newname;
          move_uploaded_file($g_pic["tmp_name"], $path_copy);
          

           $sqlUpdate = "UPDATE govern SET 
                              g_impo = '$g_impo',
                              g_head_th = '$g_head_th',
                              g_position = '$g_position',
                              g_add = '$g_add',
                              g_phone = '$g_phone',
                              g_hotline = '$g_hotline',
                              g_fax = '$g_fax',
                              g_mobile = '$g_mobile',
                              g_email = '$g_email',
                              g_web = '$g_web',
                              g_pic = '$newname',
                              g_update = '$g_update',
                              g_upbyuser = '$u_id'
                        WHERE g_id = $g_id ";
                        
        } // check uploadOk 

    }else{  //ถ้าไม่มีการส่งไฟล์ภาพมา
         $sqlUpdate = "UPDATE govern SET 
                              g_impo = '$g_impo',
                              g_head_th = '$g_head_th',
                              g_position = '$g_position',
                              g_add = '$g_add',
                              g_phone = '$g_phone',
                              g_hotline = '$g_hotline',
                              g_fax = '$g_fax',
                              g_mobile = '$g_mobile',
                              g_email = '$g_email',
                              g_web = '$g_web',
                              g_update = '$g_update',
                              g_upbyuser = '$u_id'
                        WHERE g_id = $g_id ";
    }
    $result = dbQuery($sqlUpdate);

      if($result){
                echo "<script>
                        swal({
                                title: 'สำเร็จ!',
                                text: 'แก้ไขข้อมูลแล้ว!',
                                icon: 'success',
                                button: 'ตกลง'
                            }).then(function() {
                                window.location = 'head_add.php';
                            });
                      </script>";
      }else{
                echo "<script>
                swal({
                          title: 'ผิดพลาด!',
                          text: 'มีบางอย่างผิดพลาด ปฏิบัติการไม่สำเร็จ!',
                          icon: 'error',
                          button: 'ตกลง!',
                        }).then(function(){
                            window.location = 'head_add.php';
                        });
                        </script>";
      }

  }
?>


<script>
function load_data(g_id){
	var sdata = {
		g_id : g_id,
	};
	$('#divDataview').load('../member/detail_data.php',sdata);
}


function load_edit(g_id){
  var sdata = {
      g_id : g_id,
  };
  $('#divEdit').load('show_head_edit.php',sdata);   
}


function autoTab(obj){
        var pattern=new String("___-______"); // กำหนดรูปแบบในนี้
        var pattern_ex=new String("-"); // กำหนดสัญลักษณ์หรือเครื่องหมายที่ใช้แบ่งในนี้
        var returnText=new String("");
        var obj_l=obj.value.length;
        var obj_l2=obj_l-1;
        for(i=0;i<pattern.length;i++){           
            if(obj_l2==i && pattern.charAt(i+1)==pattern_ex){
                returnText+=obj.value+pattern_ex;
                obj.value=returnText;
            }
        }
        if(obj_l>=pattern.length){
            obj.value=obj.value.substr(0,pattern.length);           
        }
}

function autoTabMobile(obj){
        var pattern=new String("___-_______"); // กำหนดรูปแบบในนี้
        var pattern_ex=new String("-"); // กำหนดสัญลักษณ์หรือเครื่องหมายที่ใช้แบ่งในนี้
        var returnText=new String("");
        var obj_l=obj.value.length;
        var obj_l2=obj_l-1;
        for(i=0;i<pattern.length;i++){           
            if(obj_l2==i && pattern.charAt(i+1)==pattern_ex){
                returnText+=obj.value+pattern_ex;
                obj.value=returnText;
            }
        }
        if(obj_l>=pattern.length){
            obj.value=obj.value.substr(0,pattern.length);           
        }
}


</script>
