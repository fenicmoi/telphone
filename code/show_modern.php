<?php
$txtSearch = isset($_POST['txtSearch']) ? $_POST['txtSearch'] : '';
$selMinis = isset($_POST['selMinis']) ? $_POST['selMinis'] : '';

if (empty($txtSearch) && empty($selMinis)) {
    echo '<div class="alert alert-info">กรุณากรอกคำค้นหาหรือเลือกหมวดหมู่เพื่อเริ่มต้น</div>';
    return;
}

// Modern SQL search: searching across names, positions, and departments
$sql = "SELECT g.*, d.dep_name, m.m_name 
        FROM govern g
        LEFT JOIN depart d ON g.g_dep = d.dep_id
        LEFT JOIN ministry m ON d.dep_minis = m.m_id
        WHERE (g.g_head_th LIKE ? 
           OR g.g_position LIKE ? 
           OR d.dep_name LIKE ? 
           OR m.m_name LIKE ?)";

$params = ["%" . $txtSearch . "%", "%" . $txtSearch . "%", "%" . $txtSearch . "%", "%" . $txtSearch . "%"];

if (!empty($selMinis)) {
    $sql .= " AND m.m_id = ?";
    $params[] = $selMinis;
}

$sql .= " ORDER BY g.g_impo ASC";

$result = dbQueryPrepared($sql, $params);
$num = dbNumRows($result);

echo '<div class="row animate-fade-in">';
echo '<div class="col-12 mb-4">';
echo '<h3 class="text-muted">ผลการค้นหาสำหรับ: <span class="text-primary">' . htmlspecialchars($txtSearch) . '</span> (' . $num . ' รายการ)</h3>';
echo '</div>';

if ($num > 0) {
    while ($row = dbFetchAssoc($result)) {
        $g_id = $row['g_id'];
        $g_head_th = $row['g_head_th'];
        $g_position = $row['g_position'];
        $dep_name = $row['dep_name'];
        $m_name = $row['m_name'];
        $g_mobile = setformat($row['g_mobile']);
        $g_phone = setformat($row['g_phone']);
        $g_pic = !empty($row['g_pic']) ? $row['g_pic'] : 'no_pic.jpg';
        $g_update = $row['g_update'];

        ?>
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card-modern h-100 d-flex flex-column">
                <div class="d-flex align-items-center mb-3">
                    <img src="image/pic_head/<?php echo $g_pic; ?>" class="contact-avatar mr-3" alt="<?php echo $g_head_th; ?>"
                        onerror="this.src='images/logo-small.png'">
                    <div>
                        <h5 class="mb-0 text-primary font-weight-bold"><?php echo $g_head_th; ?></h5>
                        <small class="text-muted font-weight-600"><?php echo $g_position; ?></small>
                    </div>
                </div>

                <div class="flex-grow-1">
                    <p class="mb-1"><i class="fa fa-university text-muted mr-2"></i> <?php echo $dep_name; ?></p>
                    <p class="mb-3 small text-muted"><?php echo $m_name; ?></p>

                    <div class="bg-light p-2 rounded mb-3">
                        <?php if ($g_phone): ?>
                            <div class="d-flex justify-content-between mb-1">
                                <span><i class="fa fa-phone mr-2"></i> โทรศัพท์:</span>
                                <span class="font-weight-bold"><?php echo $g_phone; ?></span>
                            </div>
                        <?php endif; ?>
                        <?php if ($g_mobile): ?>
                            <div class="d-flex justify-content-between">
                                <span><i class="fa fa-mobile mr-2"></i> มือถือ:</span>
                                <span class="font-weight-bold"><?php echo $g_mobile; ?></span>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="mt-auto">
                    <?php if ($g_mobile): ?>
                        <a href="tel:<?php echo preg_replace('/[^0-9]/', '', $g_mobile); ?>" class="call-btn-large">
                            <i class="fa fa-phone"></i> โทรออกเลย
                        </a>
                    <?php elseif ($g_phone): ?>
                        <a href="tel:<?php echo preg_replace('/[^0-9]/', '', $g_phone); ?>" class="call-btn-large">
                            <i class="fa fa-phone"></i> โทรออกเลย
                        </a>
                    <?php else: ?>
                        <button class="call-btn-large bg-secondary" disabled>
                            <i class="fa fa-phone"></i> ไม่มีข้อมูลเบอร์โทร
                        </button>
                    <?php endif; ?>

                    <div class="d-flex justify-content-between mt-3 px-1">
                        <button class="btn btn-link btn-sm p-0 text-muted" onclick="load_data('<?php echo $g_id; ?>')"
                            data-toggle="modal" data-target="#modelDetail">
                            <i class="fa fa-info-circle"></i> รายละเอียด
                        </button>
                        <small class="text-muted italic" style="font-size: 0.7rem;">อัปเดต: <?php echo $g_update; ?></small>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
} else {
    echo '<div class="col-12 text-center py-5">';
    echo '  <i class="fa fa-search fa-4x text-muted mb-3"></i>';
    echo '  <h4 class="text-muted">ไม่พบข้อมูลที่ตรงกับคำค้นหาของคุณ</h4>';
    echo '  <p>ลองค้นหาด้วยคำอื่นๆ เช่น "ผู้ว่า" หรือ "สำนักงานจังหวัด"</p>';
    echo '</div>';
}
echo '</div>';
?>