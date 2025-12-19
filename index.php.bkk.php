<?php include 'connection/StartConnect.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
     <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css">
    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/jquery.dataTables.js" type="text/javascript"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable(
         
        );
    } );
    </script>
</head>
<body>

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
            <a class="navbar-brand" href="#">สมุดโทรศัพท์จังหวัดพังงา</a>
            </div>
            <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#">Page 1</a></li>
            <li><a href="#">Page 2</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">เข้าสู่ระบบ</button>
            </ul>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
            <table id="example" class="display table table-bordered" cellspacing="0" width="100%">
                    <thead>
                      <?php
                      $s_sql = 'SELECT * FROM ministry ORDER BY m_impo ';
                      $s_result = dbQuery($s_sql);
                      $s_num = dbNumRows($s_result);
                      if ($s_num > 0) {
                          while ($s_row = dbFetchArray($s_result)) {
                              $s_id = $s_row['m_id'];
                              $s_impo = $s_row['m_impo'];
                              $s_name = $s_row['m_name'];

                              $d_sql = "SELECT * FROM depart WHERE  dep_minis='$s_id' ORDER BY dep_impo ASC";
                              $d_result = dbQuery($d_sql);
                              $d_num = dbNumRows($d_result);
                              if ($d_num > 0) {
                                  $i = 1; ?>
                                  <tr height="60" class="bg-primary";>
                                        <th colspan="5" ><center><h3><?php echo $s_name; ?></h3></center></th>
                                  </tr>
                              <?php
                              while ($d_row = dbFetchArray($d_result)) {
                                  $d_name = $d_row['dep_name'];
                                  $dep_id = $d_row['dep_id']; ?>
                                  <tr height=25 class='bg-info'>
                                  <th><div align=left><i class='fa fa-building'></i><?php echo $d_name; ?></div></th>
                                  <th><i class='fa fa-globe'></i> ที่ตั้งหน่วยงาน</th>
                                  <th><i class='fa fa-phone'></i> เบอร์โทรศัพท์</th>
                                  <th><i class='fa fa-envelope'></i>มือถือ</th>
                                  <th><i class='fa fa-envelope'></i>อีเมลล์</th>
                            </tr>
                    </thead>
                    <tbody>
                            <?php
                                  $g_sql = "SELECT * FROM govern WHERE  g_dep='$dep_id'  ORDER BY g_impo ASC ";
                                  $g_result = dbQuery($g_sql);
                                  $g_num = dbNumRows($g_result);
                                  if ($g_num > 0) {
                                      while ($g_row = dbFetchArray($g_result)) {
                                          $g_id = $g_row['g_id'];
                                          $g_position = $g_row['g_position'];
                                          $g_head_th = $g_row['g_head_th'];
                                          $g_add = $g_row['g_add'];
                                          $g_phone = $g_row['g_phone'];
                                          $g_email = $g_row['g_email'];
                                          $g_web = $g_row['g_web'];
                                          $g_mobile = $g_row['g_mobile']; ?>
                                        <tr>
                                          <td>
                                              <?php echo $g_position; ?>
                                              <a href="javascript:popup('member/detail_data.php?g_id=<?php echo "$g_id"; ?>','',950,500)" >
                                                <?php echo "$g_head_th"; ?>
                                              </a>
                                          </td>
                                          <td><?php echo $g_add; ?></td>
                                          <td><?php echo $g_phone; ?></td>
                                          <td>
                                        
                                          </td>
                                          <td><?php echo $g_email; ?></td>
                                        </tr>
                              <?php
                                      } //  close  while(show  head)
                                  } //  close  if ($g_num>0)
                              } //  close  while(show  department)
                              } //    close  if ($d_num>0)
                          } //  close  while(show  ministry)
                      } //    close  if ($s_num>0)
                    ?>
                    </tbody>
                     <tfoot>
                      <tr>
                          <th>Name</th>
                          <th>Position</th>
                          <th>Office</th>
                          <th>Age</th>
                           <th>Age</th>
                      </tr>
        </tfoot>
            </table>
          </div> <!-- col -->
      </div> <!-- row -->

  </div> <!-- container -->
  <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">เข้าสู่ระบบ</h4>
              </div>
              <div class="modal-body">
                <form action="member/ch_user.php" method="post" name="userlogin" target="_parent" id="userlogin" >
                  <div class="form-group ">
                      <input class="form-control" name="u_user" type="text" id="u_user" placeholder="username">
                      <br>
                      <input class="form-control" name="u_pass" type="password" id="u_pass" placeholder="password" >
                      <input class="btn btn-primary" type="submit" name="Submit2" value="Log In">
                      <input class="btn btn-default" type="reset" name="Submit3" value="Reset">   
                  </div>
              </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
</body>
</html>