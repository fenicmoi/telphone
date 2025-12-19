<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>

<title>ระบบทำเนียบหัวหน้าส่วนราชการจังหวัดตรัง</title>

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
			  <?
			include ("../connection/StartConnect.inc");	
			include ("../code/excel_data.php");	
			
			?>
              <br>
              
         
              <table width="500" height="59" border="0" cellpadding="4" cellspacing="4">
                <tr>
                  <td width="250" height="51" align="right" valign="top"><div align="right">
				  <form name="form1" method="post" action="">
                    <input type="submit" name="Submit" value="Print" onClick="window.print()">
                  </form>
				  </div></td>
                  <td width="250" height="51" align="left" valign="top"><div align="left">
                    <form name="form2" method="post" action="excel_export.php">
                      <input name="Exp_file" type="submit" id="Exp_file" value="Excel File">
                    </form>
                  </div></td>
                </tr>
              </table>
</div>
</body>
</html>