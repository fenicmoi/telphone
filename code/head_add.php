<?php

	if (isset($_POST['btnSearch'])){
		$minis = $_POST['minis'];
		$m_sql="SELECT * FROM ministry WHERE  m_id='$minis' ";
		$presee_row=dbFetchArray(dbQuery($m_sql));
		$m_name=$presee_row["m_name"];
	}else{
		$minis="12";
		$m_name="กระทรวงมหาดไทย";
	}
	?>
    <div class="card">
	<form action="head_add.php" method="post">
		<div class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">กรองข้อมูลตามกระทรวง</span>
				</div>
				<select name="minis" id="select" class="selectpicker"  data-live-search="true" title="โปรดระบุ">
					<option value="<? echo"$minis";?>" selected><? echo "$m_name";?></option>
					<?php   include ("../code/list_minis.php");		  ?>
				</select>
				<button type="submit" name="btnSearch" id="btnSearch"  class="btn btn-info"><i class="fas fa-filter"></i> กรอง</button>
				<input name="hide01" type="hidden" id="hide01" value="recal">
			</div>
		</div>
	</form>
	</div>

<table class="table table-bordered" id="manager">
<thead>
<?php
	//เลือกกระทรวง
	$s_sql="SELECT * FROM ministry WHERE  m_id='$minis' ";
	$s_row=dbFetchArray($s_result=dbQuery($s_sql));				//เอาส่วนราชการมาเก็บไว้ตามเงื่อนไขที่เลือกจาก combobox

	//เลือกหน่วยงาน
	$d_sql="SELECT * FROM depart WHERE  dep_minis='$minis'  ORDER BY dep_impo ASC";
	$d_result=dbQuery($d_sql);
	$d_num=dbNumRows($d_result);

	if ($d_num>0){
		while($d_row=dbFetchArray($d_result)){     //loop1 ส่วนราชการในสังกัด
			 $d_name=$d_row["dep_name"];
			 $dep_id=$d_row["dep_id"]; ?>
			 <tr class="bg-secondary text-white">
				<th>ลำดับ</th>
				<th colspan=3><?php echo $d_name;?></th>
			 </tr>
			 <tbody>
			 <?php 
			$g_sql="SELECT * FROM govern WHERE  g_dep='$dep_id'  ORDER BY g_impo ASC";      
			$g_result=dbQuery($g_sql);      //รายชื่อหัวหน้าส่วนราชการและเจ้าหน้าที่ตาม id ส่วนราชการ
			$g_num=dbNumRows($g_result);

			if ($g_num>0){					//ตรวจสอบว่ามีส่วนราชการหรือไม่ 
				while($g_row=dbFetchArray($g_result)){ ?>   <!-- loop 2 นำรายชื่อเจ้าหน้าที่มาแสดงผล -->
					<tr>
						<td><?php print $g_row['g_impo'];?></td>
						<td>
							<span class="font-weight-bold"><?php print $g_row['g_position'];?></span><br>
							<a
									href="#" 
									onclick="load_data('<?php echo $g_row['g_id'];?>');" 
									data-toggle="modal" 
									data-target="#modDetail">
									<i class="fas fa-address-card"></i> <?php print $g_row['g_head_th'];?>
							</a> 
						</td>
						<td>
							<a
									href="#" 
									onclick="load_edit('<?php echo $g_row['g_id'];?>');" 
									data-toggle="modal" 
									data-target="#modEdit"
									class="btn btn-warning btn-sm">
									<i class="fas fa-edit"></i> แก้ไข
							</a> 
						</td>
						<!-- <td><button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> แก้ไข</button></td> -->
						<td><button class="btn btn-dark btn-sm"><i class="fas fa-trash"></i> ลบ</button></td>
					</tr>
					<?php 
				} // end while
			}	//end if			
		} //end while เลือกหน่วยงาน
	}else {
		echo"<tr><td colspan=990><div align=center><strong><FONT COLOR=red>ไมใ่มีข้อมูล</td></tr>";
}
?>
</tbody>
</thead>
</table>

