
<?php 
    @$res_id = $_GET['res_id'];
    include ("../code/edit_relation.php");	
  ?>
  <form name="form1" method="post" action="#">
    <div class="form-group">
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text">หน่วยงานรับผิดชอบ</span>
            <select name="u_dep" id="u_dep">
                <option value="<? echo"$res_dep";?>" selected><? echo "$depd_name";?></option>
                <?php include ("../code/list_minis_dep.php");								  ?>
            </select>
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text">User</span>
           <select name="ur_user" id="ur_user">
                <option value="<? echo"$res_user";?>" selected><? echo "$res_user ---- $prer_name$ur_name  $ur_last ---- $depr_name";?></option>
                <?php include ("../code/list_user.php");?>
           </select>
        </div>
      </div>
    </div>
    <center>
        <input type="submit" class="btn btn-primary" id="btnUpdate" name="btnUpdate" value="ตกลง">
        <input type="reset" name="Submit2" class="btn btn-secondary" value="ยกเลิก">
        <input name="res_id" type="hidden" id="res_id" value="<?echo"$res_id";?>">
        <input name="recal" type="hidden" id="recal" value="recal">
    </center>

</form>


