  <?
	$hostmame="localhost";
	$username="root";
	$password="";
	$link=new mysqli($dbHost, $dbUser, $dbPass);
	mysqli_query("USE publicn_db;",$link);
	mysqli_query($link,"set NAMES utf8 ");
?>