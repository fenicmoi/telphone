<?php

// header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type, x-xsrf-token');
header('Content-Type:application/json');
include './connection/StartConnect.php';


$strSQL = 'SELECT g.g_dep,g.g_impo, g.g_head_th, g.g_position, g.g_phone, g.g_mobile, g.g_pic,d.dep_id,d.dep_impo FROM  govern as g
           INNER JOIN  depart as d ON d.dep_id = g.g_dep
           ORDER BY d.dep_impo, g.g_impo';

$objQuery = dbQuery($strSQL);
$resultArray = array();
while ($obResult = dbFetchArray($objQuery)) {
  //  array_push($resultArray, $obResult);
     $resultArray[] = $obResult;
}

echo json_encode($resultArray);
