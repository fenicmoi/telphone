<?php
include './header.php';
?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<?php
$u_user = $_POST['u_user'];
$u_pass_input = $_POST['u_pass'];

// Fetch user by username only
$u_sql = "SELECT u.*, p.pre_name, d.dep_name FROM user as u
          INNER JOIN prefix as p ON p.pre_id = u.u_prefix 
          INNER JOIN depart as d ON d.dep_id = u.u_dep_id
          WHERE u.u_user = ?";

$result = dbQueryPrepared($u_sql, [$u_user]);
$u_row = dbFetchArray($result);

$login_success = false;
if ($u_row) {
	$db_pass = $u_row['u_pass'];

	// Check if the password matches (hashed or plaintext)
	if (password_verify($u_pass_input, $db_pass)) {
		$login_success = true;
	} elseif ($u_pass_input === $db_pass) {
		// Plaintext match - login success and start migration
		$login_success = true;

		// Auto-migrate to hashed password
		$new_hash = password_hash($u_pass_input, PASSWORD_DEFAULT);
		$update_sql = "UPDATE user SET u_pass = ? WHERE u_id = ?";
		dbQueryPrepared($update_sql, [$new_hash, $u_row['u_id']]);
	}
}

if ($login_success) {
	$u_id = $u_row['u_id'];
	$u_user = $u_row['u_user'];
	$u_type = $u_row['u_type'];
	$u_prefix = $u_row['u_prefix'];
	$u_name = $u_row['u_name'];
	$u_last = $u_row['u_last'];
	$u_dep_id = $u_row['u_dep_id'];
	$pre_name = $u_row['pre_name'];
	$dep_name = $u_row['dep_name'];


	$_SESSION['u_user'] = $u_user;    //ตัวแปรใช้เช็คการเข้าสู่ระบบ
	$_SESSION['u_id'] = $u_id;
	$_SESSION['u_type'] = $u_type;
	$_SESSION['dep_id'] = $u_dep_id;   //ลงทะเบียนตัวแปร session 


	if ($u_type == 'a') {   //ถ้าเป็น admin ให้เปลี่ยนหน้าไปที่หน้า system admin
		echo "<script>
					Swal.fire({
						position: 'top-end',
						type: 'success',
						title: 'Signin',
						showConfirmButton: false,
						timer: 1500
						});
					 window.location.replace('../admin/ch_admin.php');
				</script>";
	} elseif ($u_type == 'u') { ?>
		<div class="row">
			<div class="col"></div>
			<div class="col">
				<div class="card" style="width: 25rem;">
					<img class="card-img-top" src="../images/img_avatar1.png" alt="Card image" style="width:100%">
					<div class="card-body">
						<h4 class="card-title">ข้อมูลผู้ใช้ </h4>
						<table class="table table-bordered">
							<tr>
								<td>ชื่อผู้ใช้</td>
								<td><?php echo $u_user ?></td>
							</tr>
							<tr>
								<td>ชื่อ-นามสกุล</td>
								<td><?php echo $pre_name;
								echo $u_name; ?>&nbsp<?php echo $u_last; ?></td>
							</tr>
							<tr>
								<td>ต้นสังกัด</td>
								<td><?php echo $dep_name; ?></td>
							</tr>
						</table>
					</div>
				</div>
			</div> <!-- col -->
			<div class="col"></div>
		</div>
	<?php }
} else {
	echo "<script>
			Swal.fire({
						title: 'ไม่พบข้อมูล!',
						text: 'กรุณาตรวจสอบอีกครั้ง',
						type: 'error',
						confirmButtonText: 'ok'
						}).then((result) => {
							if (result.value) {
								history.back();
							}
							})
			
			</script>";
}

include "footer.php";
?>