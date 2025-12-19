<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>

<title>ทำเนียบหัวหน้าส่วนราชการจังหวัดตรัง</title>

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
.style16 {
	font-size: 16px
}
.style18 {
	font-size: 18px;
	color: #0033FF;
	font-weight: bold;
}
.style21 {color: #FF0000; font-weight: bold; }
.style22 {color: #FF0000}
.style161 {
	font-size: 14px
}
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
			include ("../code/insert_head.php");	
			?>
      </div></td>
    </tr>
    <tr align="center" valign="top" bgcolor="#E0E0E0">
      <td height="204"><form action="insert_head.php" method="post" enctype="multipart/form-data" name="add_user"  target="_parent"  onSubmit="return validForm()">
        <table width="800" border="0" cellspacing="3" cellpadding="2">
          <tr align="left" valign="middle" bgcolor="#CCCCFF">
            <td height="30" colspan="2" align="center"><span class="style18"> <?  echo"$dep_name";?> </span></td>
          </tr>
          <tr align="left" valign="middle">
            <td width="179" height="30" align="right" bgcolor="#FFFFCC"><div align="right" class="style16">ลำดับข้อมูล</div></td>
            <td width="604" height="30" bgcolor="#FFFFFF">
              <div align="left" class="style16">
                <input name="impo" type="text" id="impo" size="5" maxlength="2"> 
                <strong><span class="style22">*</span></strong></div></td>
          </tr>
          <tr align="left" valign="middle">
            <td height="30" align="right" bgcolor="#FFFFCC"><div align="right" class="style16">ตำแหน่ง</div></td>
            <td height="30" bgcolor="#FFFFFF">
              <div align="left" class="style16">
                <input name="position" type="text" id="position" size="80" maxlength="250">
                <span class="style21">*</span></div></td>
          </tr>
          <tr align="left" valign="middle">
            <td height="30" align="right" bgcolor="#FFFFCC"><div align="right" class="style16">ชื่อ - สกุล</div></td>
            <td height="30" bgcolor="#FFFFFF">
              <div align="left" class="style16">
                <input name="name" type="text" id="name" size="80" maxlength="150">
                <span class="style21">*</span></div></td>
          </tr>
          <tr align="left" valign="middle">
           <td height="30" align="right" bgcolor="#FFFFCC"><div align="right" class="style16">ภาพผู้บริหาร</div></td>
            <td height="30" bgcolor="#FFFFFF"><input name="file" type="file" id="file" size="50">
              <br>
              <strong><span class="style22">( ต้องเป็นไฟล์ภาพ .gif หรือ .jpg ขนาดไม่เกิน 100 kb  และควรปรับ size = 100 x 130 px )</span></strong></td>
          </tr>
          <tr align="left" valign="middle">
            <td height="30" align="right" bgcolor="#FFFFCC"><div align="right" class="style16">ที่ตั้งหน่วยงาน</div></td>
            <td height="30" bgcolor="#FFFFFF">
              <div align="left" class="style16">
                <input name="add" type="text" id="add" size="80" maxlength="250">
                </div></td>
          </tr>
          <tr align="left" valign="middle">
            <td height="30" align="right" bgcolor="#FFFFCC"><div align="right" class="style16">หมายเลขโทรศัพท์</div></td>
            <td height="30" bgcolor="#FFFFFF">
              <div align="left" class="style16">
                <input name="phone" type="text" id="phone" size="50" maxlength="30">
                <span class="style161"> &nbsp;( รูปแบบ : 076 123456 )</span></div></td>
          </tr>
          <tr align="left" valign="middle">
            <td height="30" align="right" bgcolor="#FFFFCC"><div align="right" class="style16">Hotline</div></td>
            <td height="30" bgcolor="#FFFFFF">
              <div align="left" class="style16">
                <input name="hotline" type="text" id="hotline" size="50" maxlength="30">
                <span class="style161"> &nbsp;( รูปแบบ : 67955 )</span></div></td>
          </tr>
          <tr align="left" valign="middle">
            <td height="30" align="right" bgcolor="#FFFFCC"><div align="right" class="style16">หมายเลขโทรสาร</div></td>
            <td height="30" bgcolor="#FFFFFF">
              <div align="left" class="style16">
                <input name="fax" type="text" id="fax" size="50" maxlength="30">
                <span class="style161"> &nbsp;( รูปแบบ : 076 123456 )</span></div></td>
          </tr>
          <tr align="left" valign="middle">
            <td height="30" align="right" bgcolor="#FFFFCC"><div align="right" class="style16">โทรศัพท์มือถือ</div></td>
            <td height="30" bgcolor="#FFFFFF">
              <div align="left" class="style16">
                <input name="mobile" type="text" id="mobile" size="50" maxlength="30">
                <span class="style161"> &nbsp;( รูปแบบ : 071 1234567 )</span></div></td>
          </tr>
          <tr align="left" valign="middle">
            <td height="30" align="right" bgcolor="#FFFFCC"><div align="right" class="style16">E-mail หน่วยงาน</div></td>
            <td height="30" bgcolor="#FFFFFF">
              <div align="left" class="style16">
                <input name="email" type="text" id="email" size="80" maxlength="50">
                </div></td>
          </tr>
          <tr align="left" valign="middle">
            <td height="30" align="right" bgcolor="#FFFFCC"><div align="right" class="style16">Website หน่วยงาน</div></td>
            <td height="30" bgcolor="#FFFFFF">
              <div align="left" class="style16">
                <input name="web" type="text" id="web" size="80" maxlength="100">
                </div></td>
          </tr>
          <tr align="left" valign="middle">
            <td height="30" align="right" bgcolor="#FFFFCC"><div align="right" class="style16">แผนที่ หน่วยงาน<br>
                    (google map)<br>
                    <span class="style15">(size : 800x400)
                    </span></div></td>
            <td height="30" bgcolor="#FFFFFF">
              <div align="left" class="style16">
                <textarea name="map" cols="80" rows="10" id="map"></textarea>
                </div></td>
          </tr>
          <tr align="center" valign="middle" bgcolor="#FFFFFF">
            <td height="30" colspan="2"><div align="right" class="style16"></div> <span class="style16">
              <input type="submit" name="Submit" value="เพิ่ม">
               <input type="reset" name="Submit2" value="ยกเลิก">
              <input name="recal" type="hidden" id="recal" value="recal">
              <input name="dep_id" type="hidden" id="dep_id" value="<? echo"$dep_id";?>">
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
