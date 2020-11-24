
<?php
      include './header.php';
			session_start(); 
      $_SESSION["u_user"];

?>
<script>
  //SCRIP ตรวจสอบรหัสผ่านเดิม
  $(document).ready(function () {
    $("#divCheckOldPassword").hide();    //ซ่อนส่วนแสดงข้อความ
    $("#divpassOK").hide();          //ซ่อนส่วนแสดงข้อความ
    $("#divCheckPasswordMatch").hide();
 
 
   
    $("#oldPassword").focusout(checkPass);   //ตรวจสอบรหัสผ่านเก่า
    $("#confirmPassword").keyup(checkPasswordMatch);   //ตรวจสอบรหัสผ่านใหม่

    $("#btnUpdate").click(function(){  

      var u_user = $("#u_user").val();
      var u_pass = $("#newPassword").val();
      var newData = {"u_user" : u_user,"u_pass" : u_pass}

      $.ajax({
					   type: "POST",
					   url: "../admin/updatepass.php",
					   data: newData,
					   success: function(result) {
                            if(result.success == 1){
                                alert('เปลี่ยนรหัสผ่านเรียบร้อยแล้ว')
                            }else{
                                alert('มีบางอย่างผิดพลาด')
                            }
					   }
					 });
    });
  });

</script>
<br/><br/>
            <div class="row">
                <div class="col-sm-6 offset-sm-3 text-center">
                  <div class="card">
                    <div class="card-header bg-secondary text-white">
                       <h4>เปลี่ยนรหัสผ่าน</h4>
                    </div>
                    <div class="card-body">
                      <form action="" id ="frmMain" class="form-inlin justify-content-center">
                            <div class="form-group">
                                <label class="sr-only">รหัสผ่านเดิม</label>
                                <input type="text" id="oldPassword" class="form-control"  placeholder="โปรดป้อนรหัสผ่านเดิม" required>
                                <div class="alert alert-danger"  id="divCheckOldPassword"></div>
                                <div class="alert alert-success"  id="divpassOK"></div>
                            </div>
                            <div class="form-group">
                                <label class="sr-only">รหัสผ่านใหม่</label>
                                <input type="text" id="newPassword" class="form-control" placeholder="รหัสผ่านใหม่" required>
                            </div>
                            <div class="form-group">
                                <label class="sr-only">รหัสผ่านใหม่อีกครั้ง</label>
                                <input type="text" id="confirmPassword" class="form-control" placeholder="รหัสผ่านใหม่อีกครั้ง" required  onChange="checkPasswordMatch();"/>
                            </div>
                             <div class="alert alert-success"  id="divCheckPasswordMatch"></div>

                            <button type="submit" class="btn btn-success " id="btnUpdate">ตกลง!</button>
                            <input type="hidden" id="u_user" value="<?=$_SESSION['u_user'];?>">
                        </form>
                    </div>
                  </div>
                </div>
            </div>
    
</body>
</html>


<script>
function checkPasswordMatch() {
    var password = $("#newPassword").val();
    var confirmPassword = $("#confirmPassword").val();

    if (password != confirmPassword)
        $("#divCheckPasswordMatch").html("ไม่ตรงกัน!");
    else
        $("#divCheckPasswordMatch").html("ตรงกัน.");
}


function checkPass(){    //ตรวจสอบรหัสผ่านเดิม
       var oldPassword = $("#oldPassword").val();
       var oldPassword = { "oldPassword":oldPassword };


					  $.ajax({
					   type: "POST",
					   url: "../admin/checkpass.php",
					   data: oldPassword,
					   success: 
                        function(result) {
                            if(result.success == 0){
                                $("#divCheckOldPassword").show();
                                
                                $("#divCheckOldPassword").html('รหัสผ่านเดิมไม่ถูกต้องครับ');
                                $("#divCheckOldPassword").fadeOut(3000);
                                
                                // $("#newPassword").attr("disabled",true);
                                // $("#confirmPassword").attr("disabled",true);
                            }else if(result.success == 1){
                                $("#divpassOK").show();
                                $("#divpassOK").html('ถูกต้อง');
                            }
                            }  
				    });
}


</script>

