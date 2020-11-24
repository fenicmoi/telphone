<?php

header('Access-Control-Allow-Origin: *');
include './connection/StartConnect.php';

//$m_id = $_POST['mid'];
$m_id = $_GET['m_id'];
//header('Content-Type:application/json');
$strSQL = 'SELECT * FROM depart WHERE dep_minis ='.$m_id.'  ORDER BY dep_impo ASC';
$objQuery = dbQuery($strSQL);
$resultArray = array();
while ($obResult = dbFetchArray($objQuery)) {
   // array_push($resultArray, $obResult);
     $resultArray[] = $obResult;
}

echo json_encode($resultArray);
