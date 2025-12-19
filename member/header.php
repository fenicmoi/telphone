

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>สมุดโทรศัพท์จังหวัดพัทลุง PGL-PHONE</title>

        <!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
		<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

		<!-- bootstrap select -->
		<link rel="stylesheet" href="../admin/css/bootstrap-select.css">	
		<link rel="stylesheet" href="../css/footer.css">
			
		<script src="../admin/js/bootstrap-select.js"></script>
		<script type="text/javascript">
			$('.selectpicker').selectpicker({
			});
		</script>


		
<STYLE type=text/css> 
A:link {TEXT-DECORATION: none} 
</STYLE>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.3/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
<?php 
	 include ("../connection/StartConnect.php");	 
	 include "../connection/function.php";
?>
    <body>
                <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
						<div class="navbar-header">
							<a class="navbar-brand" href="#">สมุดโทรศัพท์จังหวัดพัทลุง</a>
						</div>
						<ul class="navbar-nav">
							<li class="active nav-item">
								<a class="nav-link" href="show_data.php">
									<i class="fas fa-user-tie"></i> ข้อมูลผู้บริหาร
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="show_dep.php">
									<i class="fas fa-warehouse"></i> ข้อมูลหน่วยงาน
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="./ch_pass.php">
									<i class="fas fa-key"></i> เปลี่ยนรหัสผ่าน
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="../manual/test.txt">
									<i class= "fas fa-book"></i> คู่มือ
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="../index.php">
									<i class="fas fa-sign-out-alt"></i> ออกจากระบบ
								</a>
							</li>
						</ul>
				</nav>
    <div class="container-fluid">
   
   <script>
	  function logou(){
		   swal({
                          title: 'ผิดพลาด!',
                          text: 'มีบางอย่างผิดพลาด!',
                          icon: 'error',
                          button: 'ตกลง!',
                        }).then(function(){
                            window.location = '../index.php';
                        });
	  }
   </script>