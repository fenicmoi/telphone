<?php

// header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type, x-xsrf-token');
header('Content-Type:application/json');
include './connection/StartConnect.php';


$strSQL = 'SELECT m_id, m_impo, m_name FROM ministry  ORDER BY m_impo';
$objQuery = dbQuery($strSQL);
$resultArray = array();
while ($obResult = dbFetchArray($objQuery)) {
  //  array_push($resultArray, $obResult);
     $resultArray[] = $obResult;
}

echo json_encode($resultArray);
