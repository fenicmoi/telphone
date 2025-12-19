<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
include "../connection/StartConnect.php";
$m_id = $_POST['m_id'];
$sql = "SELECT * FROM ministry WHERE m_id = $m_id";
$result = dbQuery($sql);
$row = dbFetchAssoc($result);
?>
<form action="../admin/minis_add.php"  method="POST">
    <div class="input-group">
        <div class="input-group-prepend">
        <span class="input-group-text">ชื่อต้นสังกัด</span>
    </div>
    <input type="text" id="m_name" name="m_name" class="form-control col-10" value="<?php print $row['m_name'];?>">
    <input type="submit" class="btn btn-primary btn-sm" name="btnEdit" id="btnEdit" value="แก้ไข">
    <input type="hidden" name="m_id" id="m_id" value="<?php echo $m_id;?>">
</form>

