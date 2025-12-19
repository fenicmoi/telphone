<?php
error_reporting(E_ALL ^ E_NOTICE);
?>
<!DOCTYPE html>
<html lang="eng">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ทำเนียบหัวหน้าส่วนราชการจังหวัดพัทลุง (ptl-contact)</title>
  <!-- datatable -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <script type="text/javascript" charset="utf8"
    src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  <!-- font awasome -->
  <script src="https://use.fontawesome.com/88952fc5e3.js"></script>

  <!-- Modern Design System -->
  <link rel="stylesheet" href="css/modern.css">

  <!-- Flip pdf -->
  <script src="//static.fliphtml5.com/web/js/plugin/LightBox/js/fliphtml5-light-box-api-min.js"></script>

  <!-- sweet -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <!--  favicon  -->
  <link rel="apple-touch-icon" sizes="57x57" href="images/favicon/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="images/favicon/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="images/favicon/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="images/favicon/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="images/favicon/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="images/favicon/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="images/favicon/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="images/favicon/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="images/favicon/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192" href="images/favicon/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="images/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="images/favicon/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="images/favicon/favicon-16x16.png">
  <link rel="manifest" href="/manifest.json">


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.3/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  <script language="JavaScript" type="text/JavaScript">
    function MM_jumpMenu(targ,selObj,restore){ //v3.0
      eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
      if (restore) selObj.selectedIndex=0;
    }
</script>

  <script language="JavaScript" type="text/JavaScript">
  $(document).ready(function() {
    $('#tbAll').DataTable();
} );
</script>

  <!-- Messenger ปลั๊กอินแชท Code -->
  <div id="fb-root"></div>

  <!-- Your ปลั๊กอินแชท code -->
  <div id="fb-customer-chat" class="fb-customerchat">
  </div>

  <script>
    var chatbox = document.getElementById('fb-customer-chat');
    chatbox.setAttribute("page_id", "432046637559675");
    chatbox.setAttribute("attribution", "biz_inbox");
  </script>

  <!-- Your SDK code -->
  <script>
    window.fbAsyncInit = function () {
      FB.init({
        xfbml: true,
        version: 'v18.0'
      });
    };

    (function (d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = 'https://connect.facebook.net/th_TH/sdk/xfbml.customerchat.js';
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
  </script>

</head>

<body>
  <?php
  include 'connection/StartConnect.php';
  include './connection/function.php';
  ?>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg fixed-top navbar-modern">
    <div class="container">
      <a class="navbar-brand" href="index.php">
        <img src="./images/logo-small.png" alt="โลโก้" class="mr-2">
        พัทลุง คอนแทค
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
        aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa fa-bars text-primary"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php"><i class="fa fa-home"></i> หน้าหลัก</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="report.php"><i class="fa fa-file-excel-o"></i> ไฟล์ excel</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contacts.vcf"><i class="fa fa-address-book-o"></i> ไฟล์ vcf</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="modal" data-target="#modalLogin"><i class="fa fa-lock"></i>
              เข้าสู่ระบบ</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Hero Section -->
  <div class="hero-section text-center">
    <div class="container animate-fade-in">
      <h1 class="display-4 font-weight-bold mb-3">ทำเนียบหัวหน้าส่วนราชการ</h1>
      <p class="lead mb-5">จังหวัดพัทลุง (ptl-contact)</p>

      <form name="search_data" method="post" action="#" class="search-container-modern">
        <i class="fa fa-search ml-3 text-muted"></i>
        <input type="text" name="txtSearch" class="search-input-modern"
          placeholder="ค้นหาชื่อ, ตำแหน่ง หรือหน่วยงาน (เช่น ผู้ว่า...)" required>
        <button type="submit" name="btnSearch" class="search-btn-modern">ค้นหาเลย</button>
      </form>
    </div>
  </div>

  <div class="row mt-4">
    <div class="col-12 text-center">
      <h5 class="text-muted mb-3 font-weight-bold">หรือเลือกชมตามสังกัด</h5>
      <div class="d-flex flex-wrap justify-content-center gap-2">
        <?php
        $q_sql = "SELECT * FROM ministry ORDER BY m_impo ASC LIMIT 10";
        $q_res = dbQuery($q_sql);
        while ($q_row = dbFetchAssoc($q_res)) {
          echo '<form method="post" action="index.php" class="m-1">';
          echo '<input type="hidden" name="txtSearch" value="' . $q_row['m_name'] . '">';
          echo '<button type="submit" class="btn btn-outline-primary shadow-sm px-3" style="border-radius: 20px; font-weight: 500;">';
          echo '<i class="fa fa-university mr-1"></i> ' . $q_row['m_name'];
          echo '</button>';
          echo '</form>';
        }
        ?>
        <a href="report.php" class="btn btn-outline-success shadow-sm px-3 m-1"
          style="border-radius: 20px; font-weight: 500;">
          <i class="fa fa-file-excel-o mr-1"></i> ดูทั้งหมด (Excel)
        </a>
      </div>
    </div>
  </div>

  <div class="row mt-5">
    <div class="col-md-12">
      <?php include 'code/show_index.php'; ?>
    </div> <!-- col -->
  </div> <!-- row -->

  <div class="row mt-5">
    <div class="col-md-12">
      <div class="card-modern text-center py-4">
        <p class="mb-0 text-muted">พัฒนาโดย สำนักงานจังหวัดพัทลุง</p>
      </div>
    </div>
  </div>
  </div>



  <!-- Login Modal -->
  <div id="modalLogin" class="modal fade modal-modern" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content shadow-lg">
        <div class="modal-header">
          <h4 class="modal-title font-weight-bold"><i class="fa fa-lock mr-2"></i> เข้าสู่ระบบจัดการ</h4>
          <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body p-4">
          <form action="member/ch_user.php" method="post" name="userlogin" id="userlogin">
            <div class="form-group mb-4">
              <label class="text-muted small font-weight-bold">ชื่อผู้ใช้งาน</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text bg-light border-0"><i class="fa fa-user text-primary"></i></span>
                </div>
                <input class="form-control border-0 bg-light" name="u_user" type="text" placeholder="Username" required
                  style="height: 50px; border-radius: 0 10px 10px 0;">
              </div>
            </div>
            <div class="form-group mb-4">
              <label class="text-muted small font-weight-bold">รหัสผ่าน</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text bg-light border-0"><i class="fa fa-key text-primary"></i></span>
                </div>
                <input class="form-control border-0 bg-light" name="u_pass" type="password" placeholder="Password"
                  required style="height: 50px; border-radius: 0 10px 10px 0;">
              </div>
            </div>
            <button class="btn btn-primary btn-block py-3 font-weight-bold" type="submit"
              style="border-radius: 12px; font-size: 1.1rem;">
              Log In <i class="fa fa-sign-in ml-2"></i>
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Details Modal -->
  <div class="modal fade modal-modern" id="modelDetail" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content border-0 shadow-lg" style="border-radius: 20px; overflow: hidden;">
        <div class="modal-header" style="background: var(--primary-gradient); color: white; border: none;">
          <h5 class="modal-title font-weight-bold"><i class="fa fa-info-circle mr-2"></i> รายละเอียดข้อมูล</h5>
          <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body p-0">
          <div id="divDataview">
            <div class="text-center p-5">
              <i class="fa fa-spinner fa-spin fa-3x text-primary"></i>
              <p class="mt-2 text-muted">กำลังโหลดข้อมูล...</p>
            </div>
          </div>
        </div>
        <div class="modal-footer bg-light border-0">
          <button type="button" class="btn btn-secondary px-4" data-dismiss="modal"
            style="border-radius: 10px;">ปิด</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Developer Modal -->
  <div class="modal fade modal-modern" id="modelId" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content border-0 shadow-lg">
        <div class="modal-header">
          <h5 class="modal-title font-weight-bold"><i class="fa fa-code mr-2"></i> ผู้พัฒนาระบบ</h5>
          <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body p-0">
          <div class="text-center p-4 bg-light">
            <img src="images/infinity.jpg" class="rounded-circle shadow-sm mb-3"
              style="width: 120px; height: 120px; object-fit: cover; border: 4px solid white;" alt="Dev">
            <h4 class="font-weight-bold mb-1">นายสมศักดิ์ แก้วเกลี้ยง</h4>
            <p class="text-primary font-weight-bold">นักวิชาการคอมพิวเตอร์ชำนาญการ</p>
          </div>
          <div class="p-4">
            <div class="d-flex align-items-center mb-3">
              <div class="bg-primary-light p-2 rounded mr-3 text-primary"
                style="background: rgba(26, 35, 126, 0.1); width: 40px; text-align: center;"><i
                  class="fa fa-envelope"></i></div>
              <div>
                <small class="text-muted d-block">Email</small>
                <span class="font-weight-bold">fenicmoi@hotmail.com</span>
              </div>
            </div>
            <div class="d-flex align-items-center mb-3">
              <div class="bg-primary-light p-2 rounded mr-3 text-primary"
                style="background: rgba(26, 35, 126, 0.1); width: 40px; text-align: center;"><i
                  class="fa fa-mobile fa-lg"></i></div>
              <div>
                <small class="text-muted d-block">Phone</small>
                <span class="font-weight-bold">0-8153-99135</span>
              </div>
            </div>
            <div class="d-flex align-items-center">
              <div class="bg-primary-light p-2 rounded mr-3 text-primary"
                style="background: rgba(26, 35, 126, 0.1); width: 40px; text-align: center;"><i
                  class="fa fa-comments"></i></div>
              <div>
                <small class="text-muted d-block">Line ID</small>
                <span class="font-weight-bold">0815399135</span>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer bg-light border-0">
          <button type="button" class="btn btn-secondary px-4" data-dismiss="modal"
            style="border-radius: 10px;">ปิดหน้าต่าง</button>
          <a href="https://www.facebook.com/fenicmoi" target="_blank" class="btn btn-primary px-4"
            style="border-radius: 10px;"><i class="fa fa-facebook mr-1"></i> Facebook</a>
        </div>
      </div>
    </div>
  </div>

</body>

</html>


<script>
  function load_data(g_id) {   /* ส่งค่าแสดงรายละเอียด  */

    var sdata = {
      g_id: g_id,
    };
    $('#divDataview').load('./code/info_data.php', sdata);

  }
</script>