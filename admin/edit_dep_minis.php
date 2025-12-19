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
-->
</style></head>

<body>
<div align="center">
  <table width="800" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="990"><div align="center">
        <?
			include ("../connection/StartConnect.inc");	
			include ("../code/detail_dep_minis.php");	
			?>
      </div></td>
    </tr>
    <tr align="center" valign="top" bgcolor="#E0E0E0">
      <td height="204"><form name="form1" method="post" action="edit_dep_minis.php">
        <table width="800" border="0" cellspacing="3" cellpadding="2">
          <tr align="left" valign="middle" bgcolor="#CCCCFF">
            <td height="30" colspan="2" align="center"><span class="style18">หน่วยงาน </span></td>
          </tr>
          <tr align="left" valign="middle">
            <td width="134" height="30" align="right" bgcolor="#FFFFCC"><div align="right" class="style16">สังกัด</div></td>
            <td width="649" height="30" bgcolor="#FFFFFF">              <div align="left" class="style16">
              <select name="minis" id="minis">
                <option value="<? echo"$d_minis";?>" selected><? echo "$s_name";?></option>
                <?
							  		$presee_sql="SELECT * FROM ministry  ORDER BY m_impo";
									$presee_result=mysql_query($presee_sql);
									$presee_num=mysql_num_rows($presee_result);
									if ($presee_num>0)
									 {
											while($presee_row=mysql_fetch_array($presee_result))
											{	
												$m_id=$presee_row["m_id"];
												$m_name=$presee_row["m_name"];
												?>
                <option value="<? echo"$m_id"?>"><? echo"$m_name"?></option>
                <?
											}
							  			}
							  		else
										{
											?>
                <option value="0">NoData</option>
                <?
										}
							  ?>
              </select>			  
            
			  </div></td>
          </tr>
          <tr align="left" valign="middle">
            <td width="134" height="30" align="right" bgcolor="#FFFFCC"><div align="right" class="style16">ลำดับ</div></td>
            <td height="30" bgcolor="#FFFFFF"><input name="a_d_impo" type="text" id="a_d_impo" value="<? echo"$d_impo";?>" size="10" maxlength="3"></td>
          </tr>
          <tr align="left" valign="middle">
            <td height="30" align="right" bgcolor="#FFFFCC"><div align="right" class="style16">หน่วยงาน</div></td>
            <td height="30" bgcolor="#FFFFFF"> <span class="style16"> <span class="style18">
              <input name="edit_dep_fi" type="text" id="edit_dep_fi" value="<? echo"$d_name";?>" size="100" maxlength="150"> 
              </span> </span> </td>
          </tr>
          <tr align="center" valign="middle" bgcolor="#FFFFFF">
            <td height="30" colspan="2"><div align="right" class="style16"></div> <span class="style16">
              <input type="submit" name="Submit" value="ตกลง">
              <input type="reset" name="Submit2" value="ยกเลิก">
              <input name="g_dep" type="hidden" id="g_dep" value="<?echo"$g_dep";?>">
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
