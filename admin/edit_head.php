<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>

<title>นามสงเคราะห์ส่วนราชการจังหวัดภูเก็ต</title>

<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
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
.style16 {font-size: 18px}
.style18 {
	font-size: 18px;
	color: #0033FF;
	font-weight: bold;
}
.style21 {color: #FF0000; font-weight: bold; }
.style22 {color: #FF0000}
-->
</style>
<Script language="JavaScript">
function validForm()
{
formObj = document.add_user;
if((formObj.impo.value=="") || (formObj.position.value=="") || (formObj.name.value=="")  )
{
alert("กรุณากรอกข้อมูลให้ครบถ้วน");
return false;
}
else if(isNaN(document.add_user.impo.value)) 
{		alert("กรุณากรอกลำดับข้อมูล เป็นตัวเลข") ;				return false;		}
else
return true;
}
</script>
</head>

<body>
<div align="center">
  <table width="800" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="990"><div align="center">
        <?
			include ("../connection/StartConnect.inc");	
			include ("../code/edit_head.php");	
			?>
      </div></td>
    </tr>
    <tr align="center" valign="top" bgcolor="#E0E0E0">
      <td height="204"><form action="edit_head.php" method="post" enctype="multipart/form-data" name="add_user"  target="_parent"  onSubmit="return validForm()">
        <table width="800" border="0" cellspacing="3" cellpadding="2">
          <tr align="left" valign="middle" bgcolor="#CCCCFF">
            <td height="30" colspan="2" align="center"><span class="style18"> <?  echo"$d_name";?> </span></td>
          </tr>
          <tr align="left" valign="middle">
            <td height="30" align="right" valign="middle" bgcolor="#FFFFCC">
				  <?
				  		if ($g_pic!=NULL)
						{  ?>
						 <div align="center"><img src="../image/pic_head/<? echo $g_pic;?>" width="100" height="130">  
						     <? }
				  ?>
              </div></td>
            <td height="30" bgcolor="#FFFFFF"><br><div align="right" class="style16">
              <div align="left">แก้ไขรูปภาพ <input name="file" type="file" id="file" size="50"></div>
            </div>
                      <br>
					  <strong><span class="style22 style15">( ต้องเป็นไฟล์ภาพ .gif หรือ .jpg ขนาดไม่เกิน 100 kb  และควรปรับ size = 100 x 130 px )</span></strong>                      </td>
          </tr>
          <tr align="left" valign="middle">
            <td height="30" align="right" bgcolor="#FFFFCC"><div align="right" class="style16">สังกัด</div></td>
            <td height="30" bgcolor="#FFFFFF">
              <div align="left" class="style16"><? echo"$s_name";?></div></td>
          </tr>
          <tr align="left" valign="middle">
            <td width="179" height="30" align="right" bgcolor="#FFFFCC"><div align="right" class="style16">ลำดับข้อมูล</div></td>
            <td width="604" height="30" bgcolor="#FFFFFF">
              <div align="left" class="style16">
                <input name="impo" type="text" id="impo" value="<? echo"$g_impo";?>" size="5" maxlength="2"> 
                <strong><span class="style22">*</span></strong>
               
                </div></td>
          </tr>
          <tr align="left" valign="middle">
            <td height="30" align="right" bgcolor="#FFFFCC"><div align="right" class="style16">ตำแหน่ง</div></td>
            <td height="30" bgcolor="#FFFFFF">
              <div align="left" class="style16">
                <input name="position" type="text" id="position" value="<? echo"$g_position";?>" size="80" maxlength="250">
                <span class="style21">*</span></div></td>
          </tr>
          <tr align="left" valign="middle">
            <td height="30" align="right" bgcolor="#FFFFCC"><div align="right" class="style16">ชื่อ - สกุล</div></td>
            <td height="30" bgcolor="#FFFFFF">
              <div align="left" class="style16">
                <input name="name" type="text" id="name" value="<? echo"$g_head_th";?>" size="80" maxlength="150">
                <span class="style21">*</span></div></td>
          </tr>
          <tr align="left" valign="middle">
            <td height="30" align="right" bgcolor="#FFFFCC"><div align="right" class="style16">ที่ตั้งหน่วยงาน</div></td>
            <td height="30" bgcolor="#FFFFFF">
              <div align="left" class="style16">
                <input name="add" type="text" id="add" value="<? echo"$g_add";?>" size="80" maxlength="250">
                </div></td>
          </tr>
          <tr align="left" valign="middle">
            <td height="30" align="right" bgcolor="#FFFFCC"><div align="right" class="style16">หมายเลขโทรศัพท์</div></td>
            <td height="30" bgcolor="#FFFFFF">
              <div align="left" class="style16">
                <input name="phone" type="text" id="phone" value="<? echo"$g_phone";?>" size="50" maxlength="30">
                  &nbsp;( รูปแบบ : 076 123456 )</div></td>
          </tr>
          <tr align="left" valign="middle">
            <td height="30" align="right" bgcolor="#FFFFCC"><div align="right" class="style16">Hotline</div></td>
            <td height="30" bgcolor="#FFFFFF">
              <div align="left" class="style16">
                <input name="hotline" type="text" id="hotline" value="<? echo"$g_hotline";?>" size="50" maxlength="30">
                  &nbsp;( รูปแบบ : 67955 )</div></td>
          </tr>
          <tr align="left" valign="middle">
            <td height="30" align="right" bgcolor="#FFFFCC"><div align="right" class="style16">หมายเลขโทรสาร</div></td>
            <td height="30" bgcolor="#FFFFFF">
              <div align="left" class="style16">
                <input name="fax" type="text" id="fax" value="<? echo"$g_fax";?>" size="50" maxlength="30">
                  &nbsp;( รูปแบบ : 076 123456 )</div></td>
          </tr>
          <tr align="left" valign="middle">
            <td height="30" align="right" bgcolor="#FFFFCC"><div align="right" class="style16">โทรศัพท์มือถือ</div></td>
            <td height="30" bgcolor="#FFFFFF">
              <div align="left" class="style16">
                <input name="mobile" type="text" id="mobile" value="<? echo"$g_mobile";?>" size="50" maxlength="30">
                &nbsp;( รูปแบบ : 081 1234567 )</div></td>
          </tr>
          <tr align="left" valign="middle">
            <td height="30" align="right" bgcolor="#FFFFCC"><div align="right" class="style16">E-mail หน่วยงาน</div></td>
            <td height="30" bgcolor="#FFFFFF">
              <div align="left" class="style16">
                <input name="email" type="text" id="email" value="<? echo"$g_email";?>" size="80" maxlength="50">
                </div></td>
          </tr>
          <tr align="left" valign="middle">
            <td height="30" align="right" bgcolor="#FFFFCC"><div align="right" class="style16">Website หน่วยงาน</div></td>
            <td height="30" bgcolor="#FFFFFF">
              <div align="left" class="style16">
                <input name="web" type="text" id="web" value="<? echo"$g_web";?>" size="80" maxlength="100">
                </div></td>
          </tr>
          <tr align="left" valign="middle">
            <td height="30" align="right" bgcolor="#FFFFCC"><div align="right" class="style16">แผนที่ หน่วยงาน<br>
                    (google map)<br>
                    <span class="style15 style22">(size : w800 x h400)
                    </span></div></td>
            <td height="30" bgcolor="#FFFFFF">
              <div align="left" class="style16">
                <textarea name="map" cols="80" rows="8" id="map"><?echo"$g_map"; ?></textarea>
                </div></td>
          </tr>
          <tr align="center" valign="middle" bgcolor="#FFFFFF">
            <td height="30" colspan="2"><div align="right" class="style16"></div> <span class="style16">
              <input type="submit" name="Submit" value="ตกลง">
               <input type="reset" name="Submit2" value="ยกเลิก">
              <input name="recal" type="hidden" id="recal" value="recal">
              <input name="g_id" type="hidden" id="g_id" value="<? echo"$g_id";?>">
              <input name="g_pic" type="hidden" id="g_pic" value="<? echo "$g_pic";?>">
</span> <input name="u_id" type="hidden" id="u_id" value="<? echo"$u_id";?>"></td>
            </tr>
        </table>
    
      </form></td>
    </tr>
    <tr align="center" valign="top">
      <td><br>
	 <?
			  include ("../connection/EndConnect.inc");  
	 ?>	  </td>
    </tr>
  </table>
</div>
</body>
</html>
