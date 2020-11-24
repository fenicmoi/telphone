<?php

header('Access-Control-Allow-Origin: *');
include './connection/StartConnect.php';

$dep_id = $_GET['dep_id'];
//header('Content-Type:application/json');
$strSQL = 'SELECT * FROM govern  WHERE g_dep ='.$dep_id.'  ORDER BY g_impo ASC';
$objQuery = dbQuery($strSQL);
$resultArray = array();
while ($obResult = dbFetchArray($objQuery)) {
    //array_push($resultArray, $obResult);
      $resultArray[] = $obResult;
}

echo json_encode($resultArray);
