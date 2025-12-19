<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include_once("../connection/StartConnect.php");
include_once("../connection/function.php");

$g_id = isset($_POST['g_id']) ? intval($_POST['g_id']) : 0;

if ($g_id > 0) {
    $sql = "SELECT g.*, d.dep_name, m.m_name 
            FROM govern as g   
            INNER JOIN depart as d ON d.dep_id = g.g_dep
            INNER JOIN ministry as m ON m.m_id = d.dep_minis
            WHERE g.g_id = ?";

    $result = dbQueryPrepared($sql, [$g_id]);
    $row = dbFetchAssoc($result);
    $num_row = dbNumRows($result);

    if ($num_row > 0) {
        $g_pic = !empty($row['g_pic']) ? $row['g_pic'] : 'no_pic.jpg';
        $g_head_th = $row['g_head_th'];
        $g_position = $row['g_position'];
        $dep_name = $row['dep_name'];
        $m_name = $row['m_name'];
        $g_phone = setformat($row['g_phone']);
        $g_fax = setformat($row['g_fax']);
        $g_mobile = setformat($row['g_mobile']);
        $g_hotline = $row['g_hotline'];
        $g_add = $row['g_add'];
        $g_update = $row['g_update'];
        ?>
        <div class="p-4">
            <div class="row">
                <div class="col-md-4 text-center mb-4 mb-md-0">
                    <img src="image/pic_head/<?php echo $g_pic; ?>" class="rounded shadow-sm img-fluid border"
                        style="width: 100%; max-width: 250px; height: auto; object-fit: cover; border-radius: 15px !important;"
                        onerror="this.src='images/logo-small.png'">
                    <div class="mt-3">
                        <?php if ($g_mobile): ?>
                            <a href="tel:<?php echo preg_replace('/[^0-9]/', '', $g_mobile); ?>"
                                class="btn btn-success btn-block shadow-sm py-2">
                                <i class="fa fa-phone mr-2"></i> โทรหาเบอร์มือถือ
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-md-8">
                    <h4 class="text-primary font-weight-bold mb-1"><?php echo $g_head_th; ?></h4>
                    <p class="text-muted font-weight-bold mb-3"><?php echo $g_position; ?></p>

                    <div class="detail-card bg-light p-3 rounded mb-3 border-0">
                        <div class="row mb-2">
                            <div class="col-sm-4 text-muted small uppercase font-weight-bold">หน่วยงาน</div>
                            <div class="col-sm-8 font-weight-bold"><?php echo $dep_name; ?></div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-4 text-muted small uppercase font-weight-bold">สังกัด</div>
                            <div class="col-sm-8 text-primary"><?php echo $m_name; ?></div>
                        </div>
                        <hr class="my-3">
                        <?php if ($g_phone): ?>
                            <div class="row mb-2">
                                <div class="col-sm-4 text-muted small uppercase font-weight-bold">โทรศัพท์</div>
                                <div class="col-sm-8 font-weight-bold"><?php echo $g_phone; ?></div>
                            </div>
                        <?php endif; ?>
                        <?php if ($g_fax): ?>
                            <div class="row mb-2">
                                <div class="col-sm-4 text-muted small uppercase font-weight-bold">โทรสาร</div>
                                <div class="col-sm-8"><?php echo $g_fax; ?></div>
                            </div>
                        <?php endif; ?>
                        <?php if ($g_hotline): ?>
                            <div class="row mb-2">
                                <div class="col-sm-4 text-muted small uppercase font-weight-bold">HOT LINE</div>
                                <div class="col-sm-8 text-danger font-weight-bold"><?php echo $g_hotline; ?></div>
                            </div>
                        <?php endif; ?>
                        <?php if ($g_add): ?>
                            <div class="row mb-2">
                                <div class="col-sm-4 text-muted small uppercase font-weight-bold">ที่อยู่</div>
                                <div class="col-sm-8 small"><?php echo $g_add; ?></div>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="mt-3 text-right">
                        <small class="text-muted italic"><i class="fa fa-clock-o mr-1"></i> ปรับปรุงล่าสุด:
                            <?php echo $g_update; ?></small>
                    </div>
                </div>
            </div>
        </div>
        <?php
    } else {
        echo '<div class="alert alert-warning text-center m-4">ไม่พบข้อมูลที่ระบุ</div>';
    }
} else {
    echo '<div class="alert alert-danger text-center m-4">รหัสข้อมูลไม่ถูกต้อง</div>';
}
?>