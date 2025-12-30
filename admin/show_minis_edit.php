<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
if (!isset($_SESSION['u_user']) || $_SESSION['u_type'] !== 'a') {
  die("Unauthorized access");
}
include "../connection/StartConnect.php";
$m_id = $_POST['m_id'];
$sql = "SELECT * FROM ministry WHERE m_id = ?";
$result = dbQueryPrepared($sql, [$m_id]);
$row = dbFetchAssoc($result);
?>
<form method="POST">
  <div class="form-group">
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text">ชื่อต้นสังกัด</span>
      </div>
      <input type="text" id="m_name" name="m_name" class="form-control col-10" value="<?php print $row['m_name']; ?>">
    </div>
    <br>
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text">ลำดับที่</span>
      </div>
      <input type="text" id="m_impo" name="m_impo" class="form-control col-2" value="<?php print $row['m_impo']; ?>">
    </div>
  </div> <!-- form-group -->
  <br>
  <center>
    <button type="submit" class="btn btn-primary btn-md" name="btnEdit" id="btnEdit"><i class="fas fa-check"></i>
      ตกลง</button>
  </center>
  <input type="hidden" name="m_id" id="m_id" value="<?php echo $m_id; ?>">
</form>