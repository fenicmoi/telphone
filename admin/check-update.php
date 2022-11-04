<?php
session_start(); 

$u_user = $_SESSION["u_user"];	
include "header.php";

$sql = "SELECT g_head_th, g_position, substr(g_update,1,4) as trim_gupdate  FROM govern ORDER BY trim_gupdate DESC LIMIT 0,100";
$result = dbQuery($sql);

?>

<table class="table">
    <thead>
        <tr>
            <th>name</th>
            <th>ตำแหน่ง</th>
            <th>วันที่ update</th>
        </tr>
    </thead>
    <tbody>

     <?php  
        while ($row = dbFetchArray($result)) { ?>
            <tr>
                <td><?php echo $row['g_head_th'];?></td>
                <td><?php echo $row['g_position'];?></td>
                <td><?php echo $row['trim_gupdate'];?></td>
            </tr>
    <?php }?>

    </tbody>
</table>

<?php include "footer.php";?>