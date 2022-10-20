<script>
$(document).ready( function () {
    $('#show_minis').DataTable();
} );
</script>

<?php 
####### แสดงตาราง #########################################
$presee_sql="SELECT * FROM ministry  ORDER BY m_impo ASC ";
$presee_result=dbQuery($presee_sql);
$presee_num=dbFetchRow($presee_result);
$num_row = dbNumRows($presee_result);
?>
<br>
<table class="display" id="show_minis">
<thead>
  <tr>
    <th>ลำดับที่</th>
    <th>ชื่อสังต้นสังกัด</th>
    <th>แก้ไข</th>
    <th>ลบ</th>
  </tr>
</thead>
<tbody>
  <?php
    $sql = "SELECT * FROM ministry ORDER BY m_impo ASC";
    $result = dbQuery($sql);
    $num_row = dbNumRows($result);
    
    if($num_row > 0 ){
      while ($r = dbFetchArray($result)) {
      $m_id = $r['m_id'];	
      ?>
      <tr>
        <td><?php echo $r["m_impo"];?></td>
        <td><?php echo $r["m_name"];?></td>
        <td>
          <a class="btn btn-warning btn-sm" 
              href="#" 
              onclick="load_edit('<?php print $m_id;?>');" 
              data-toggle="modal" 
              data-target="#modalEdit">
              <i class="fas fa-pencil-alt"></i> 
          </a> 
        </td>
        <td>
          <a class="btn btn-danger btn-sm" href="?m_id=<?php echo $m_id;?>"><i class="fas fa-trash-alt"></i></a>
        </td>			
      </tr>
        
    <?php	}
    }
  ?>
</tbody>
</table>
<!--  end show data -->


