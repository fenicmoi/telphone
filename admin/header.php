<?php
session_start();
if (!isset($_SESSION['u_user']) || $_SESSION['u_type'] !== 'a') {
	echo "<script>
            alert('คุณไม่มีสิทธิ์เข้าถึงหน้านี้ กรุณาเข้าสู่ระบบในฐานะ Admin');
            window.location.replace('../index.php');
        </script>";
	exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>สมุดโทรศัพท์จังหวัดพัทลุง PLG-PHONE</title>

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
		integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script> -->


	<!-- bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<script src="js/bootstrap-select.js"></script>
	<script type="text/javascript">
		$('.selectpicker').selectpicker({
		});
	</script>

	<script>

		$(document).ready(function () {
			$(function () {
				var current_page_URL = location.href;

				$("a").each(function () {

					if ($(this).attr("href") !== "#") {

						var target_URL = $(this).prop("href");

						if (target_URL == current_page_URL) {
							$('nav a').parents('li, ul').removeClass('active');
							$(this).parent('li').addClass('active');

							return false;
						}
					}
				});
			});
		});
	</script>



	<STYLE type=text/css>
		A:link {
			TEXT-DECORATION: none
		}
	</STYLE>

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.3/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
</head>
<?php include("../connection/StartConnect.php"); ?>

<body>
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
		<div class="navbar-header">
			<a class="navbar-brand" href="#">สมุดโทรศัพท์จังหวัดพัทลุง</a>
		</div>
		<ul class="navbar-nav">
			<li class="active nav-item"><a class="nav-link" href="minis_add.php"><i class="fas fa-building"></i>
					สังกัด</a></li>
			<li class="nav-item"><a class="nav-link" href="dep_add.php"><i class="fas fa-landmark"></i> หน่วยงาน</a>
			</li>
			<li class="nav-item"><a class="nav-link" href="head_add.php"><i class="fas fa-user-circle"></i>
					ผู้บริหาร</a></li>
			<li class="nav-item"><a class="nav-link" href="user_add.php"><i class="fas fa-id-card"></i> ผู้ใช้งาน</a>
			</li>
			<li class="nav-item"><a class="nav-link" href="user_relation.php"><i class="fas fa-user-shield"></i>
					สิทธิ์การดูแล</a></li>
			<li class="nav-item"><a class="nav-link" href="ch_pass.php"><i class="fas fa-unlock"></i>
					เปลี่ยนรหัสผ่าน</a></li>
			<li class="nav-item"><a class="nav-link" href=""><i class="fas fa-book-open"></i> คู่มือ</a></li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
					<i class="fas fa-print"></i> รายงาน
				</a>
				<div class="dropdown-menu">
					<a class="dropdown-item" href="#" data-toggle="modal" data-target="#modelReport1">รายชื่อ User</a>
					<a class="dropdown-item" href="#">Link 2</a>
					<a class="dropdown-item" href="#">Link 3</a>
				</div>
			</li>
			<li class="nav-item"><a class="nav-link pull-right" href="../index.php"><i class="fas fa-sign-out-alt"></i>
					ออกจากระบบ</a></li>
		</ul>
	</nav>
	<div class="container-fluid">