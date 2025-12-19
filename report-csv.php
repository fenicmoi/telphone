<?php
include './connection/StartConnect.php';
ob_start();
// Set PHP headers for CSV output.
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=csv_export.csv');
// Create the headers.
$header_args = array( 'Name', 'position' );


$sql = "SELECT g_head_th,g_position FROM govern ORDER BY g_impo";
$result = dbQuery($sql);
$json_array = array();
while($row = dbFetchAssoc($result)){
    $json_array[] = $row;
}

ob_end_clean();
// Create a file pointer with PHP.
$output = fopen( 'php://output', 'w' );

// Write headers to CSV file.
fputcsv( $output, $header_args );

foreach( $data as $json_array ){
    fputcsv( $output, $data_item );
}


// Close the file pointer with PHP with the updated output.
fclose( $output );
exit;


//print(json_encode($json_array))
$data = json_encode($json_array);
$display = json_decode($data);



for($i=0; $i<count($display); $i++){
    $name = $display[$i]->g_head_th;
    $position = $display[$i] -> g_position;
    echo $name.":".$position."<br>";
}
?>