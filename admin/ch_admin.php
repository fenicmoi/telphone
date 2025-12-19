<?php
	session_start(); 
	$u_user = $_SESSION["u_user"];
			
?>
<?php include "header.php";?>
<div class="row">
	<div class="col"></div>
		<div class="col">
			<?php
			include ("../code/show_user.php");	
			if ($u_num>0){?>
				<div class="card" style="width: 25rem;">
					<img class="card-img-top" src="../images/img_avatar1.png" alt="Card image" style="width:100%">
					<div class="card-body">
						<h4 class="card-title">ข้อมูลผู้ใช้</h4>
						<table class="table table-bordered">
							<tr><td>ชื่อผู้ใช้</td><td><?php echo $u_user?></td></tr>
							<tr><td>ชื่อ-นามสกุล</td><td><?php echo $u_pre_name; echo $u_name; echo $u_last;?></td></tr>
							<tr><td>ต้นสังกัด</td><td><?php echo $u_dep_name;?></td></tr>
						</table>
					</div>
				</div>
		<?php }else{?>
				<h1>no data</h1>
				<!-- <SCRIPT language=JAVASCRIPT>window.location.replace('../index.php')</SCRIPT>	 -->
		<?php } ?>
		</div> <!-- col -->
	<div class="col"></div>
</div> <!-- row -->
<?php include "footer.php";?>