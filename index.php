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
   <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 

    <!-- font awasome -->
    <script src="https://use.fontawesome.com/88952fc5e3.js"></script>

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
<link rel="icon" type="image/png" sizes="192x192"  href="images/favicon/android-icon-192x192.png">
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
<!-- Chatra {literal} -->
<script>
    (function(d, w, c) {
        w.ChatraID = '8hztemC96qH6pieSE';
        var s = d.createElement('script');
        w[c] = w[c] || function() {
            (w[c].q = w[c].q || []).push(arguments);
        };
        s.async = true;
        s.src = 'https://call.chatra.io/chatra.js';
        if (d.head) d.head.appendChild(s);
    })(document, window, 'Chatra');
</script>
<!-- /Chatra {/literal} -->
  </head>
  <body> 
<?php 
  include 'connection/StartConnect.php'; 
  include './connection/function.php';
  ?>

<!-- Navigation -->
<!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top"> -->
<nav class="navbar navbar-expand-lg fixed-top navbar-light bg-dark">
  <div class="container-fluid">
       <a class="navbar-brand" href="#">
          <img src="./images/logo-small.png" alt="โลโก้">
        </a>
        <div class="navbar-header">
      <a class="navbar-brand text-white" href="#">ทำเนียบหัวหน้าส่วนราชการจังหวัดพัทลุง</a>
  </div>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
       <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link text-white" href="#"><i class="fa fa-home"></i> หน้าหลัก
                <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="report.php"><i class="fa fa-download" aria-hidden="true"></i> Download ไฟล์ excel</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="#"><i class="fa fa-bullhorn" aria-hidden="true"></i> รับตำแหน่งใหม่</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white"  data-toggle="modal" data-target="#modelId"><i class="fa fa-bullhorn" aria-hidden="true"></i> ขอ User & password</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="#" data-toggle="modal" data-target="#modalLogin"  ><i class="fa fa-key"></i> เข้าสู่ระบบ</a>
        </li>
      </ul> 
      
    </div>
  </div>
</nav>
b4-mo

<div class="container-fluid">
  <div class="row">
    <div class="col-md-12 ">
      <div class="card border-primary bg-warning">
        <div class="card-body">
          <h4 class="card-title">Title</h4>
          <form name="search_data" method="post" action="#">
          <?php  include 'code/search_key.php'; ?>			    
      </form>    
        </div>
      </div>
      <div class="card">
       
      </div> 
    </div> 

  </div> 
  
  <div class="row">
    <div class="col-md-12">
      <?php  include 'code/show_index.php'; ?>
    </div>  <!-- col -->
  </div> <!-- row -->

  <div class="row">
    <div class="col-md-12">
      <div class="bg-dark text-white"><center>พัฒนาโดย  สำนักงานจังหวัดพัฒลุง   </div>
    </div>
  </div>
</div>



<!-- Modal -->
<div id="modalLogin" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
  <div class="modal-dialog"  role="document">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header bg-warning">

        <h4 class="modal-title">เข้าสู่ระบบ</h4>
      </div>
      <div class="modal-body">
         <form action="member/ch_user.php" method="post" name="userlogin" target="_parent" id="userlogin" >
          <div class="form-group ">
              <input class="form-control" name="u_user" type="text" id="u_user" placeholder="username" required>
              <br>
              <input class="form-control" name="u_pass" type="password" id="u_pass" placeholder="password" required >
              <br>
              <center><input class="btn btn-primary" type="submit" name="Submit2" value="Log In"></center>
 
          </div>
       </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal programmer-->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">ผู้พัฒนา</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
            <div class="card">
             <center> <img class="card-img-top" src="images/infinity.jpg" style="width:20%" alt=""></center>
              <div class="card-body">
                <p class="card-text">
                
                <h4>นายสมศักดิ์  แก้วเกลี้ยง</h4>
                  <p class="titlecard">นักวิชาการคอมพิวเตอร์ชำนาญการ</p>
                  <p><i class="fa fa-envelope "></i>:fenicmoi@hotmail.com
                  <p><i class="fa fa-mobile" aria-hidden="true"></i>: 0-8153-99135</p>
                  <p><i class="fa fa-line">LINE ID = 0815399135</i>
                  <img src=" image/line.jpg " sizes="150" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                  <div style="margin: 24px 0;">
                    <a href="#"><i class="fa fa-envelope fa-2x"></i></a>
                    <a href="https://www.facebook.com/fenicmoi"><i class="fa fa-facebook fa-2x"></i></a> 
                </p>
              </div>
            </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modelId">
  Launch
</button>

<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
        Body
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>

</body>
</html>


<script>
   function load_data(g_id){   /* ส่งค่าแสดงรายละเอียด  */

      var sdata = {
        g_id : g_id,
      };
      $('#divDataview').load('./code/info_data.php',sdata);
   
    }
</script>

