<?php
      
      session_start(); 
      include './header.php';
			//$_SESSION["u_user"];
?>

<body>
<div class="row h-100">
  <div class="col-md-6">
    <div class="card">
       <div class="card-header text-white bg-secondary">เพิ่มสิทธิ์</div>
       <div class="card-body">
        <?php 
            include ("../code/show_user.php");
            if($u_num>0){
              include '../code/add_relation.php';?>
              <form action="user_relation.php" method="post" name="form1">

                <div class="form-group">
                  <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">ส่วนราชการ</span>
                      </div>
                      <!-- <select class="form-control" name="u_dep"> -->
                      <select class=" selectpicker form-control" data-live-search="true" title="โปรดระบุ" name="u_dep" id="u_dep">
                        <?php include '../code/list_minis_dep.php';?>
                      </select>
                  </div>
                </div>

                <div class="form-group">
                  <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">admin หน่วนงาน</span>
                      </div>
                      <!-- <select class="form-control" name="u_name"> -->
                      <select class=" selectpicker form-control" data-live-search="true" title="โปรดระบุ" name="u_name" id="u_name">
                         <?php include ("../code/list_user.php");?>
                      </select>
                  </div>
                </div>
                <br><br>
                <center>
                <input type="submit" name="Submit" class="btn btn-primary" value="ตกลง">
                <input name="Submit2" type="reset" class="btn btn-danger" value="ยกเลิก">
                <input name="recal" type="hidden" id="recal2" value="recal">
                </center>
              </form>
        <?php      
            } //u_num
        ?>
       </div> <!-- card body -->
    </div>  <!-- card-->
  </div>  <!-- col -->

  <div class="col-md-6">
      <div class="card">
          <div class="card-header text-white bg-secondary">เพิ่มล่าสุด</div>
          <div class="card-body">
            <?php
            //  include ("../code/del_relation.php");	
              include ("../code/rela_show_last.php");	 
            ?>
          </div> <!-- card body -->
      </div>
  </div> <!-- col2 -->
</div>		<!-- row -->

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header text-white bg-secondary">ข้อมูลการกำหนดสิทธิ์
                <div class="float-right">
                    <form method="get" class="form-inline">
                        <label class="mr-2">เรียงตาม:</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ser" id="ser_u" value="u" <?php if (!isset($_GET['ser']) || $_GET['ser'] == 'u') echo 'checked'; ?>>
                            <label class="form-check-label" for="ser_u">User</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ser" id="ser_d" value="d" <?php if (isset($_GET['ser']) && $_GET['ser'] == 'd') echo 'checked'; ?>>
                            <label class="form-check-label" for="ser_d">หน่วยงาน</label>
                        </div>
                        <button type="submit" class="btn btn-light btn-sm ml-2">ตกลง</button>
                    </form>
                </div>
            </div>
            <div class="card-body">
                <?php 
                   	if (@$hide04=='recal'){
							  	    	$ser=$ser;
                        if($ser=='d') {	$ser_name='หน่วยงาน';		
                        }else{	
                          $ser_name='UserName';		$ser=='u';
                        }
				            }else{
                        $u_type='u';
                        $ser_name='UserName';
				            }
                ?>
                <?include ("../code/show_relation.php");	?>
            </div>  <!-- card-body -->
        </div>
    </div> <!-- col -->
</div> <!-- row -->

</body>
<!-- InstanceEnd -->
</html>

<?php
//update  การกำหนดสิทธิ์
if(isset($_GET['delItem'])){
    $res_id = $_GET['delItem'];
    $sql="DELETE   FROM respon WHERE res_id=$res_id";

    echo "<script>console.log(".$sql.");</script>";

    $result = dbQuery($sql);
   if($result){
		echo "<script>
					Swal.fire(
							'Good job!',
							'อัพเดทข้อมูลแล้ว!',
							'success'
          )
					window.location.replace('../admin/user_relation.php');
			  </script>";
	}else{
			echo "<script>
					Swal.fire(
							'Not work!',
							'มีบางอย่างผิดพลาด!',
							'error'
							)
					window.location.replace('../admin/user_relation.php');
			  </script>";
	}
}

//update การผูกสิทธิ์

if(isset($_POST['recal'])){
  $res_dep = $_POST['u_dep'];
  $res_user = $_POST['u_name'];
  $sql = "INSERT INTO respon (res_user, res_dep) VALUE ('$res_user', '$res_dep')";

  print $sql;
  
  $result = dbQuery($sql);

  if($result){
		echo "<script>
					Swal.fire(
							'Good job!',
							'ผูกสิทธิ์การใช้งานเรียบร้อยแล้ว!',
							'success'
          )
					window.location.replace('../admin/user_relation.php');
			  </script>";
	}else{
			echo "<script>
					Swal.fire(
							'Not work!',
							'มีบางอย่างผิดพลาด!',
							'error'
							)
				//	window.location.replace('../admin/user_relation.php');
			  </script>";
	}
}


?>



