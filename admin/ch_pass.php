
<?php
      session_start(); 
      include './header.php';
			
     // $_SESSION["u_user"];

?>
<script>

  $(document).ready(function () {
    $("#divCheckOldPassword").hide();    //กรณีรหัสผ่านผิด
    $("#divpassOK").hide();          //กรณีรหัสผ่านเดิมถูก

    $("#confirmPassword").keyup(checkPasswordMatch);   //ตรวจสอบรหัสผ่านใหม่
    $("#oldPassword").focusout(checkPass);   //ตรวจสอบรหัสผ่านเก่า

    $("#btnUpdate").click(function(){

      var u_user = $("#u_user").val();
      var u_pass = $("#newPassword").val();
      var newData = {"u_user" : u_user,"u_pass" : u_pass}

      $.ajax({
					   type: "POST",
					   url: "updatepass.php",
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
                                <input type="text" id="oldPassword" class="form-control" placeholder="โปรดป้อนรหัสผ่านเดิม">
                                <div class="alert alert-danger"  id="divCheckOldPassword"></div>
                                <div class="alert alert-success"  id="divpassOK"></div>
                            </div>
                            <div class="form-group">
                                <label class="sr-only">รหัสผ่านใหม่</label>
                                <input type="text" id="newPassword" class="form-control" placeholder="รหัสผ่านใหม่">
                            </div>
                            <div class="form-group">
                                <label class="sr-only">รหัสผ่านใหม่อีกครั้ง</label>
                                <input type="text" id="confirmPassword" class="form-control" placeholder="รหัสผ่านใหม่อีกครั้ง"  onChange="checkPasswordMatch();"/>
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

/*
function send_data(result_id){
    $("#btnCheck").click(function() {
           var result_id ={ "result_id" : result_id }

					  $.ajax({
					   type: "POST",
					   url: "checkpass.php",
					   data: result_id,
					   success: 
             function(result) {
					    	if (result.success == "oura"){
                  $("#divCheckOldPassword").html('ถูกต้อง');
                }else{
                  $("#divCheckOldPassword").html('ข้อมูลไม่ตรง');
                } 
                  
					    }  
					 });

			});
}

*/


function checkPass(){    //ตรวจสอบรหัสผ่านเดิม
       var oldPassword = $("#oldPassword").val();
       var oldPassword = { "oldPassword":oldPassword };


					  $.ajax({
					   type: "POST",
					   url: "checkpass.php",
					   data: oldPassword,
					   success: 
              function(result) {
                  if(result.success == 0){
                    $("#divCheckOldPassword").show();
                    $("#divCheckOldPassword").html('รหัสผ่านเดิมไม่ถูกต้อง');s
                    $("#newPassword").attr("disabled",true);
                    $("#confirmPassword").attr("disabled",true);
                  }else{
                    $("#divpassOK").show();
                    $("#divpassOK").html('ถูกต้อง');
                    // $("#newPassword").attr("disabled",false);
                    // $("#confirmPassword").attr("disabled",false);
                  }
                }  
				    });
}


</script>

