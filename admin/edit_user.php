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
.style16 {font-size: 18px}
.style18 {
	font-size: 18px;
	color: #0033FF;
	font-weight: bold;
}
-->
</style></head>

<body>
<div align="center">
  <table width="800" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="990"><div align="center">
        <?
			include ("../connection/StartConnect.inc");	
			include ("../code/detail_user.php");	
			?>
      </div></td>
    </tr>
    <tr align="center" valign="top" bgcolor="#E0E0E0">
      <td height="204"><form name="form1" method="post" action="edit_user.php">
        <table width="800" border="0" cellspacing="3" cellpadding="2">
          <tr align="left" valign="middle" bgcolor="#CCCCFF">
            <td height="30" colspan="2" align="center"><span class="style18">ข้อมูล User </span></td>
          </tr>
          <tr align="left" valign="middle">
            <td width="134" height="30" align="right" bgcolor="#FFFFCC"><div align="right" class="style16">UserName</div></td>
            <td width="649" height="30" bgcolor="#FFFFFF">
              <div align="left" class="style16"><span class="style18"><? echo"$ua_user";?>            </span> </div></td>
          </tr>
          <tr align="left" valign="middle">
            <td height="30" align="right" bgcolor="#FFFFCC"><div align="right" class="style16">ประเภท</div></td>
            <td height="30" bgcolor="#FFFFFF">
              <div align="left" class="style16"><span class="style18">
			  <?
									if($u_type=='a') {	$ut_name='Admin';		}
									else							{	$ut_name='User';		$u_type=='u'; }
			  ?>
                <select name="u_type" id="u_type">
                  <option value="<? echo"$u_type";?>" selected><? echo "$ut_name";?></option>
                      <option value="a">Admin</option>
                      <option value="u" >User</option>
                  </select>
            </span> </div></td>
          </tr>
          <tr align="left" valign="middle">
            <td height="30" align="right" bgcolor="#FFFFCC"><div align="right" class="style16">ชื่อ - สกุล</div></td>
            <td height="30" bgcolor="#FFFFFF">
              <div align="left" class="style16"><span class="style18">
<select name="u_prefix" id="select3">
  <option value="<? echo"$u_prefix";?>" selected><? echo "$prea_name";?></option>
  <?   include ("../code/list_prefix.php");	  ?>
</select>
<input name="u_name" type="text" id="u_name" value="<?echo"$u_name";?>" size="30" maxlength="20">
                <input name="u_last" type="text" id="u_last" value="<?echo"$u_last";?>" size="30" maxlength="20">
</span> </div></td>
          </tr>
          <tr align="left" valign="middle">
            <td height="30" align="right" bgcolor="#FFFFCC"><div align="right" class="style16">หน่วยงาน</div></td>
            <td height="30" bgcolor="#FFFFFF">
              <div align="left" class="style16"><span class="style18">
                <select name="u_dep" id="select">
                  <option value="<? echo"$u_dep_id";?>" selected><? echo "$depa_name";?></option>
                  <?  				  			include ("../code/list_minis_dep.php");								  ?>
                </select>
            </span> </div></td>
          </tr>
          <tr align="left" valign="middle">
            <td height="30" align="right" bgcolor="#FFFFCC">&nbsp;</td>
            <td height="30" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
          <tr align="center" valign="middle" bgcolor="#FFFFFF">
            <td height="30" colspan="2"><div align="right" class="style16"></div> <span class="style16">
              <input type="submit" name="Submit" value="ตกลง">
              <input type="reset" name="Submit2" value="ยกเลิก">
              <input name="ua_user" type="hidden" id="ua_user" value="<?echo"$ua_user";?>">
              <input name="recal" type="hidden" id="recal" value="recal">
</span> </td>
            </tr>
        </table>
    
      </form></td>
    </tr>
    <tr align="center" valign="top">
      <td>
	 <?
			  include ("../connection/EndConnect.inc");  
	 ?>
	  </td>
    </tr>
  </table>
</div>
</body>
</html>
