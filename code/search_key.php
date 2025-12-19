<?php	
$type_s = $_GET['type_s'];
if ($type_s == 2) {
    $type_n = 'หน่วยงาน';
} elseif ($type_s == 3) {
    $type_n = 'ตำแหน่ง';
} elseif ($type_s == 4) {
    $type_n = 'ชื่อ-สกุล';
} elseif ($type_s == 5) {
    $type_n = 'ที่ตั้งหน่วยงาน';
} else {
    $type_n = 'สังกัด';
    //$type_s = 1;
}

?>
<br/><br/>
<div class="nav">
<div class="form-group form-inline">
	<label><b>ประเภทการค้นหา</b><i class="fa fa-keyboard-o"></i></label>
	<select class="form-control" name="menu1" onChange="MM_jumpMenu('parent',this,0)">
        <option   selected><?php echo "$type_n"; ?></option>
        <option value="?type_s=1">สังกัด</option>
        <option value="?type_s=2">หน่วยงาน</option>
        <option value="?type_s=3">ตำแหน่ง</option>
     </select>	

	
	&nbsp&nbsp&nbsp<label>คำค้น <i class="fa fa-search"></i> </label> 
	<?php
    if ($type_s == 1) {
        if ($hide01 == 'recal') {
            $m_sql = "SELECT * FROM ministry WHERE  m_id='$minis' ";
            $presee_row = dbFetchArray(dbQuery($m_sql));
            $m_name = $presee_row['m_name'];
        } else {
            $key_s = 'สังกัด';
            $minis = '12';
            $m_name = 'กระทรวงมหาดไทย';
        } ?>

		<select class="form-control" name="minis" id="minis">
			<option value="<?php echo"$minis"; ?>" selected><?php echo "$m_name"; ?></option>
		<?php   include 'list_minis.php'; ?>
		</select>
 	<?php
    } else {
        ?>
	 <form name="form" method="post" enctype="multipart/form-data">
		<input class="form-control" name="key_w" type="text" value="<?php echo"$key_w"; ?>" id="key_w" size="35" maxlength="50">
<?php
    }  ?>
    &nbsp<button type="submit" name="Submit" class="btn btn-primary text-white">
    	<i class="fa fa-search"></i> Let's go
	</button>
     <input name="hide01" type="hidden" id="hide01" value="recal">	
</div>	
</div>
