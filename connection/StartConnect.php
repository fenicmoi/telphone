<?php
/*
$dbHost = 'localhost';
$dbUser = 'root';
$dbPass = '';
$dbName = 'publicn_db'; 
*/

$dbHost = 'localhost';
$dbUser = 'phatthalun_dol'; // phatthalun
$dbPass = 'nSSYV5cJ'; // Phatthalun#2019
$dbName = 'phatthalun_telphone'; 


$dbConn=new mysqli($dbHost, $dbUser, $dbPass);
$dbConn->query("set names utf8");
$dbConn->select_db($dbName);
	
if(!$dbConn){
        die("ไม่สามารถเชื่อมต่อเครื่องแม่ข่ายได้".mysqli_error());
}

function dbQuery($sql)
{   
        global $dbConn;
        $result = $dbConn->query($sql);
	return $result;
}

function dbAffectedRows()  //ส่งจำนวนแถวก่อนดำเนินการ
{
	//global $dbConn;
	
	//return mysql_affected_rows($dbConn);
        return mysqli_affected_rows($dbConn);
}

function dbFetchArray($result) {
	//return mysql_fetch_array($result, $resultType);
          global $dbConn;
          return mysqli_fetch_array($result);
}

function dbFetchAssoc($result)
{
	//return mysql_fetch_assoc($result);
    global $dbConn;
          return mysqli_fetch_assoc($result);
}

function dbFetchRow($result) 
{
	 //return mysqli_fetch_row($result);
    global $dbConn;
         return mysqli_fetch_row($result);
}

function dbFreeResult($result)
{
	//return mysql_free_result($result);
    global $dbConn;
          return mysqli_free_result($result);
}

function dbNumRows($result)
{
	//return mysql_num_rows($result);
   // global $dbConn;
        return mysqli_num_rows($result);
}

function dbSelect($dbName)
{
	return mysqli_select_db($dbName);
}

function dbInsertId()
{
        global $dbConn;
	return mysqli_insert_id($dbConn);
       
}
?>
