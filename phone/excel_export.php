<?php
header("Content-Type: application/vnd.ms-excel");
header('Content-Disposition: attachment; filename="MyXls.xls"');#ชื่อไฟล์
?>

<html xmlns:o="urn:schemas-microsoft-com:office:office"

xmlns:x="urn:schemas-microsoft-com:office:excel"

xmlns="http://www.w3.org/TR/REC-html40">

<HTML>

<HEAD>

<meta http-equiv="Content-type" content="text/html;charset=tis-620" />

</HEAD><BODY>
  <?
			include ("../connection/StartConnect.inc");	
			include ("../code/excel_export_file.php");	
			include ("../connection/EndConnect.inc");  
?>
</BODY>
</HTML>