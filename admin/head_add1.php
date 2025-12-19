<?
			session_start(); 
			$_SESSION["u_user"];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><!-- InstanceBegin template="/Templates/temp02.dwt" codeOutsideHTMLIsLocked="false" -->
<head>

<!-- InstanceBeginEditable name="doctitle" -->
<title>���ʧ��������ǹ�Ҫ��èѧ��Ѵ����</title>
<!-- InstanceEndEditable --><meta http-equiv="Content-Type" content="text/html; charset=windows-874">

</head>

<body>
			

<div align="center">
  <table width="990" border="0" cellspacing="0" cellpadding="0">
    <tr bgcolor="#99CCFF">
      <td><div align="center"><img src="../image/top03.gif" width="990" height="200" border="0"></div></td>
    </tr>
    <tr>
      <td height="30" align="center" valign="middle" bgcolor="#99CCFF"><img src="../image/tap_admin.gif" width="980" height="25" border="0" usemap="#Map">
        <map name="Map">
          <area shape="rect" coords="18,2,78,22" href="minis_add.php" target="_parent">
          <area shape="rect" coords="104,4,186,22" href="dep_add.php" target="_parent">
          <area shape="rect" coords="218,5,290,23" href="head_add.php" target="_parent">
          <area shape="rect" coords="326,4,413,21" href="user_add.php" target="_parent">
          <area shape="rect" coords="450,5,511,22" href="user_relation.php" target="_parent">
          <area shape="rect" coords="544,5,665,22" href="ch_pass.php" target="_parent">
          <area shape="rect" coords="860,6,958,22" href="../index.php" target="_parent">
          <area shape="rect" coords="772,3,832,25" href="../manual/test.txt" target="_blank">
        </map></td>
    </tr>
    <tr align="center" valign="top" bgcolor="#E0E0E0">
      <td height="322"><!-- InstanceBeginEditable name="EditRegion3" -->
        <script type="text/javascript"> 
function popup(url,name,windowWidth,windowHeight){ 
myleft=(screen.width)?(screen.width-windowWidth)/2:100; 
mytop=(screen.height)?(screen.height-windowHeight)/2:100; 
properties = "width="+windowWidth+",height="+windowHeight; 
properties +=",scrollbars=yes, top="+mytop+",left="+myleft; 
window.open(url,name,properties); 
} 
</script> 
	  
	  
	    <img src="../image/ad_h_head.gif" width="375" height="43">
	    <?
			include ("../connection/StartConnect.inc");	
			include ("../code/show_user.php");	
			if ($u_num>0)
			{		
			?>
      <br>
     
      <table width="900" border="2" cellpadding="0" cellspacing="2" bordercolor="#FFFFFF">
        <tr>
          <td width="902">
            <form action="head_add.php" method="post" name="form2" target="_parent">
              <table width="900" border="0" cellspacing="3" cellpadding="4">
                
                <tr>
                  <td width="625" align="left" valign="middle">���͡�ѧ�Ѵ
                    <?
			  	if ($hide01=='recal')
				{
							  		$m_sql="SELECT * FROM ministry WHERE  m_id='$minis' ";
									$presee_row=mysql_fetch_array(mysql_query($m_sql));
												$m_name=$presee_row["m_name"];
				}
				else
				{
												$minis="12";
												$m_name="��з�ǧ��Ҵ��";
				}
			  ?>
                    <select name="minis" id="select">
                      <option value="<? echo"$minis";?>" selected><? echo "$m_name";?></option>
                      <?   include ("../code/list_minis.php");		  ?>
                    </select>
                    <input type="submit" name="Submit" value="����">
                    <input name="hide01" type="hidden" id="hide012" value="recal"></td>
                  <td width="240" align="right" valign="middle"></td>
                </tr>
                <tr>
                  <td colspan="2" align="center" valign="top">
                    <? 		
					include ("../code/del_head.php");	
				
					?>
                    </td>
                  </tr>
              </table>
          </form></td>
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
