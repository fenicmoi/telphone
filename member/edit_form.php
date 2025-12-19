<?
			session_start(); 
			$_SESSION["u_user"];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><!-- InstanceBegin template="/Templates/temp01.dwt" codeOutsideHTMLIsLocked="false" -->
<head>

<!-- InstanceBeginEditable name="doctitle" -->
<title>นามสงเคราะห์ส่วนราชการจังหวัดภูเก็ต</title>
<!-- InstanceEndEditable --><meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<style type="text/css">
<!--
body,td,th {
	font-family: MS Sans Serif;
	font-size: 15px;
	color: #000000;
}
a {
	font-family: MS Sans Serif;
	font-size: 16px;
	color: #000000;
}
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #FF0000;
}
a:hover {
	text-decoration: none;
	color: #FF0000;
}
a:active {
	text-decoration: none;
	color: #FF0000;
}
body {
	margin-top: 10px;
}
.style12 {font-size: 16px}
-->
</style>
<Script language="JavaScript">
function validForm()
{
formObj = document.add_dep;
if((formObj.impo.value=="") || (formObj.position.value=="") || (formObj.name.value=="") )
{
alert("กรุณากรอกข้อมูลให้ครบถ้วน");
return false;
}
else if(isNaN(document.add_dep.impo.value)) 
{		alert("กรุณากรอกลำดับข้อมูล เป็นตัวเลข") ;				return false;		}

else
return true;
}
</script>
<!-- InstanceBeginEditable name="head" -->
<style type="text/css">
<!--
.style14 {color: #0000FF}
.style15 {color: #FF0000}
.style17 {
	font-size: 18;
	font-weight: bold;
	color: #0033FF;
}
.style18 {font-size: 18px}
.style21 {font-size: 18px; font-weight: bold; }
-->
</style>
<!-- InstanceEndEditable -->
</head>

<body>
			

<div align="center">
  <table width="990" border="0" cellspacing="0" cellpadding="0">
    <tr bgcolor="#99CCFF">
      <td><div align="center"><img src="../image/top02.gif" width="990" height="200" border="0"></div></td>
    </tr>
    <tr>
      <td height="30" align="center" valign="middle" bgcolor="#99CCFF"><img src="../image/tap_user.gif" width="980" height="25" border="0" usemap="#Map">
        <map name="Map">
          <area shape="rect" coords="44,2,154,23" href="show_data.php" target="_parent">
          <area shape="rect" coords="205,3,322,23" href="show_dep.php" target="_parent">
          <area shape="rect" coords="371,3,487,22" href="ch_pass.php" target="_parent">
          <area shape="rect" coords="859,6,961,22" href="../index.php" target="_parent">
          <area shape="rect" coords="774,0,833,24" href="../manual/manual_user.pdf" target="_blank">
      </map></td>
    </tr>
    <tr align="center" valign="top" bgcolor="#E0E0E0">
      <td height="322"><!-- InstanceBeginEditable name="EditRegion3" --><img src="../image/ad_h_head_edit.gif" width="375" height="43">
			<?
			include ("../connection/StartConnect.inc");	
			include ("../code/show_user.php");	
			if ($u_num>0)
			{
			?>
        <table width="990" border="0">
          <tr>
            <td width="16">&nbsp;</td>
            <td width="964" align="left" valign="top">
			  <div align="left" class="style14"><?
					echo "$pre_name$u_name $u_last<br>$dep_name";	
			?></div></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td align="center" valign="top">
			<?
									// หา ID ของ user
									$user_sql="SELECT * FROM user WHERE  u_user='$u_user'  ";
									$user_result=mysql_query($user_sql);
									$user_num=mysql_num_rows($user_result);
									if ($user_num>0)
									{
											while($user_row=mysql_fetch_array($user_result))
											{			$u_id=$user_row["u_id"];		}
									}
			include ("../code/edit_head.php");	
			?>
            <form action="edit_form.php" method="post" enctype="multipart/form-data" name="add_dep"  target="_parent"  onSubmit="return validForm()">
              <table width="900" height="803" border="2" cellpadding="2" cellspacing="2" bordercolor="#FFFFFF">
                <tr>
                  <td height="30" colspan="2" align="center" valign="middle">
				  <span class="style17"><span class="style18"><?
				 	 echo"$d_name";
				  ?>
				  </span>
				  </span>&nbsp;</td>
                  </tr>
                <tr>
                  <td height="30" align="right" valign="middle">
				  <?
				  		if ($g_pic!=NULL)
						{  ?>
						 <div align="center"><img src="../image/pic_head/<? echo $g_pic;?>" width="100" height="130">  
						     <? }
				  ?>
				           </div></td>
                  <td height="30" align="left" valign="middle"><div align="left"><span class="style21">
				  
				  
                    แก้ไขรูปภาพ </span>
                      <input name="file" type="file" id="file" size="50">
                      <br>
                      <br>
					  <strong><span class="style22 style15">( ต้องเป็นไฟล์ภาพ .gif หรือ .jpg ขนาดไม่เกิน 100 kb  และควรปรับ size = 100 x 130 px )</span></strong>
                      <br>
                  </div></td>
                </tr>
                <tr>
                  <td width="150" height="30" align="right" valign="middle"><span class="style21">สังกัด</span></td>
                  <td width="728" height="30" align="left" valign="middle">
<? echo "$s_name";?>                    </td>
                </tr>
                <tr>
                  <td height="30" align="right" valign="middle"><span class="style21">ลำดับข้อมูล</span></td>
                  <td height="30" align="left" valign="middle"><input name="impo" type="text" id="impo" value="<? echo"$g_impo";  ?>" size="5" maxlength="2"> 
                  <span class="style15">*</span>
                  
                  </td>
                </tr>
                <tr>
                  <td height="30" align="right" valign="middle"><span class="style21">ตำแหน่ง</span></td>
                  <td height="30" align="left" valign="middle"><input name="position" type="text" id="position" value="<? echo"$g_position";?>" size="100" maxlength="250"> 
                  <span class="style15">*</span></td>
                </tr>
                <tr>
                  <td height="30" align="right" valign="middle"><span class="style21">ชื่อ - สกุล </span></td>
                  <td height="30" align="left" valign="middle"><input name="name" type="text" id="name" value="<? echo"$g_head_th"; ?>" size="100" maxlength="150"> 
                  <span class="style15">*</span></td>
                </tr>
                <tr>
                  <td height="30" align="right" valign="middle"><span class="style21">ที่ตั้งหน่วยงาน</span></td>
                  <td height="30" align="left" valign="middle"><input name="add" type="text" id="add" value="<? echo"$g_add"; ?>" size="100" maxlength="250"> </td>
                </tr>
                <tr>
                  <td height="30" align="right" valign="middle"><span class="style21">หมายเลขโทรศัพท์</span></td>
                  <td height="30" align="left" valign="middle"><input name="phone" type="text" id="phone" value="<? echo"$g_phone"; ?>" size="50" maxlength="30">
                    &nbsp;( รูปแบบ : 076 123456 )</td>
                </tr>
                <tr>
                  <td height="30" align="right" valign="middle"><span class="style21">เบอร์มหาดไทย</span></td>
                  <td height="30" align="left" valign="middle"><input name="hotline" type="text" id="hotline" value="<? echo"$g_hotline"; ?>" size="50" maxlength="30"> 
                    &nbsp;( รูปแบบ : 67955 )</td>
                </tr>
                <tr>
                  <td height="30" align="right" valign="middle"><span class="style21">หมายเลขโทรสาร</span></td>
                  <td height="30" align="left" valign="middle"><input name="fax" type="text" id="fax" value="<? echo"$g_fax"; ?>" size="50" maxlength="30">
                    &nbsp;( รูปแบบ : 076 123456 )</td>
                </tr>
                <tr>
                  <td height="30" align="right" valign="middle"><span class="style21">โทรศัพท์มือถือ</span></td>
                  <td height="30" align="left" valign="middle"><input name="mobile" type="text" id="mobile" value="<? echo"$g_mobile";?>" size="50" maxlength="30">
                    &nbsp;( รูปแบบ : 081 1234567 )</td>
                </tr>
                <tr>
                  <td height="30" align="right" valign="middle"><span class="style21">E-mail หน่วยงาน </span></td>
                  <td height="30" align="left" valign="middle"><input name="email" type="text" id="email" value="<?echo"$g_email";?>" size="80" maxlength="50"></td>
                </tr>
                <tr>
                  <td height="30" align="right" valign="middle"><span class="style21">Website หน่วยงาน </span></td>
                  <td height="30" align="left" valign="middle"><input name="web" type="text" id="web" value="<? echo"$g_web"; ?>" size="80" maxlength="100"></td>
                </tr>
                <tr>
                  <td height="30" align="right" valign="middle"><span class="style21">แผนที่ หน่วยงาน<br>
                    (google map)<br>
                    <span class="style15">(size : 800x400)
                    </span></span></td>
                  <td height="30" align="left" valign="middle">                    <textarea name="map" cols="100" rows="10" id="map"><?echo"$g_map"; ?></textarea></td>
                </tr>
                <tr>
                  <td height="30" colspan="2" align="center" valign="middle"><input type="submit" name="Submit" value="ตกลง">
&nbsp;
<input type="reset" name="Submit2" value="ยกเลิก">
&nbsp;
<input name="g_id" type="hidden" id="g_id" value="<?echo"$g_id";?>">
                  <input name="recal" type="hidden" id="recal" value="recal">
                  <input name="g_pic" type="hidden" id="g_pic" value="<? echo "$g_pic";?>"></td>
                </tr>
              </table>
            </form>
</td>
          </tr>
        </table>
		<?
		}
			else
			{
					?>
					<SCRIPT language=JAVASCRIPT>window.location.replace('../index.php')</SCRIPT>	
					<?
			}
			  include ("../connection/EndConnect.inc");  
		?>
<!-- InstanceEndEditable -->
	  
	  </td>
    </tr>
    <tr align="center" valign="top">
      <td><img src="../image/end.gif" width="980" height="130"></td>
    </tr>
  </table>
</div>
</body>
<!-- InstanceEnd --></html>
