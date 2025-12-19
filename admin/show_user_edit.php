<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<!-- bootstrap select -->
<link rel="stylesheet" href="css/bootstrap-select.css">
<script src="js/bootstrap-select.js"></script>
<script type="text/javascript">
    $('.selectpicker').selectpicker({
    });
</script>
<?php
session_start();
if (!isset($_SESSION['u_user']) || $_SESSION['u_type'] !== 'a') {
    die("Unauthorized access");
}
include "../connection/StartConnect.php";

$u_id = $_POST['u_id'];
$sql = "SELECT * FROM user WHERE u_id = ?";
$result = dbQueryPrepared($sql, [$u_id]);
$row = dbFetchAssoc($result);
$u_type = $row["u_type"];
$pre_id = $row["u_prefix"];
$dep_id = $row["u_dep_id"];
?>
<form method="POST">
    <div class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">หน่วยงาน</span>
                <select name="depart" id="depart" class="selectpicker" data-live-search="true" title="โปรดระบุ">
                    <?php
                    $sql_dep = "SELECT * FROM depart  ORDER BY dep_impo";
                    $result_dep = dbQuery($sql_dep);
                    while ($row_dep = dbFetchArray($result_dep)) { ?>
                        <option value="<?php echo $row_dep['dep_id']; ?>" <?php if ($dep_id == $row_dep['dep_id']) {
                              echo "selected";
                          } ?>>
                            <?php echo $row_dep['dep_name']; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <br>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">ประเภทผู้ใช้งาน</span>
            </div>
            <select class="form-control col-2" name="u_type" id="u_type">
                <option value="u" <?php if ($u_type == 'u') {
                    echo "selected";
                } ?>>User</option>
                <option value="a" <?php if ($u_type == 'a') {
                    echo "selected";
                } ?>>Admin</option>
            </select>

            <div class="input-group-prepend">
                <span class="input-group-text">Username</span>
            </div>
            <input type="text" name="u_user" id="u_user" class="form-control" value="<?php echo $row['u_user']; ?>">

            <div class="input-group-prepend">
                <span class="input-group-text">Password</span>
            </div>
            <input type="text" name="u_pass" id="u_pass" class="form-control" value="<?php echo $row['u_pass']; ?>">
        </div>
        <br>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">คำนำหน้า</span>
            </div>
            <select class=" selectpicker form-control col-2" data-live-search="true" title="โปรดระบุ" name="prefix"
                id="prefix">
                <?php
                $sql = "SELECT * FROM prefix ORDER BY pre_id";
                $result = dbQuery($sql);
                while ($row_prefix = dbFetchArray($result)) { ?>
                    <option value="<?php echo $row_prefix['pre_id']; ?>" <?php if ($pre_id == $row_prefix['pre_id']) {
                          echo "selected";
                      } ?>>
                        <?php echo $row_prefix['pre_name']; ?>
                    </option>
                <?php } ?>
            </select>

            <div class="input-group-prepend">
                <span class="input-group-text">ชื่อ</span>
                <input type="text" id="u_name" name="u_name" class="form-control" value="<?php print $row['u_name']; ?>">
            </div>


            <div class="input-group-prepend">
                <span class="input-group-text">นามสกุล</span>
                <input type="text" id="u_last" name="u_last" class="form-control" value="<?php print $row['u_last']; ?>">
            </div>
        </div>
    </div> <!-- form-group -->
    <br>
    <center>
        <button type="submit" class="btn btn-primary btn-md" name="btnEdit" id="btnEdit"><i class="fas fa-check"></i>
            ตกลง</button>
        <input type="hidden" id="u_id" name="u_id" value="<?php print $row['u_id']; ?>">
    </center>
    <input type="hidden" name="dep_id" id="dep_id" value="<?php echo $dep_id; ?>">
</form>