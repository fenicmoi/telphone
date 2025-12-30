<?php
session_start();
include "header.php";

// Fetch Data

// 1. Top 10 Latest Updates
$sqlLatest = "SELECT g_head_th, g_position, g_update FROM govern ORDER BY g_update DESC LIMIT 10";
$resLatest = dbQuery($sqlLatest);

// 2. Top 10 Stagnant Records
$sqlStagnant = "SELECT g_head_th, g_position, g_update FROM govern ORDER BY g_update ASC LIMIT 10";
$resStagnant = dbQuery($sqlStagnant);

// 3. Data Anomalies
$sqlAnomalies = "SELECT g_head_th, g_position, g_add FROM govern 
                 WHERE g_add NOT LIKE '%พัทลุง%' 
                 OR g_head_th IN ('ว่าง', '-', 'cfg') 
                 OR g_add IN ('', ' ', '-') 
                 LIMIT 20";
$resAnomalies = dbQuery($sqlAnomalies);
?>

<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-12 mb-4">
            <h2 class="text-center"><i class="fas fa-tachometer-alt"></i> Deskboard Summary</h2>
        </div>
    </div>

    <div class="row">
        <!-- Latest Updates -->
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0"><i class="fas fa-clock"></i> 10 รายการอัปเดตล่าสุด</h5>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped table-sm mb-0">
                        <thead class="thead-light">
                            <tr>
                                <th>ชื่อ-สกุล</th>
                                <th>ตำแหน่ง</th>
                                <th>วันที่อัปเดต</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = dbFetchAssoc($resLatest)) { ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($row['g_head_th']); ?></td>
                                    <td><?php echo htmlspecialchars($row['g_position']); ?></td>
                                    <td><?php echo htmlspecialchars($row['g_update']); ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Stagnant Records -->
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-warning">
                    <h5 class="mb-0"><i class="fas fa-hourglass-half"></i> 10 รายการที่ไม่อัปเดตนานที่สุด</h5>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped table-sm mb-0">
                        <thead class="thead-light">
                            <tr>
                                <th>ชื่อ-สกุล</th>
                                <th>ตำแหน่ง</th>
                                <th>วันที่อัปเดต</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = dbFetchAssoc($resStagnant)) { ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($row['g_head_th']); ?></td>
                                    <td><?php echo htmlspecialchars($row['g_position']); ?></td>
                                    <td><?php echo htmlspecialchars($row['g_update']); ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Data Anomalies -->
        <div class="col-12 mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-danger text-white">
                    <h5 class="mb-0"><i class="fas fa-exclamation-triangle"></i> ข้อมูลที่ควรตรวจสอบ (Anomalies)</h5>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped table-sm mb-0">
                        <thead class="thead-light">
                            <tr>
                                <th>ชื่อ-สกุล</th>
                                <th>ตำแหน่ง</th>
                                <th>ที่อยู่</th>
                                <th>ประเด็นที่พบ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = dbFetchAssoc($resAnomalies)) {
                                $issue = "";
                                if (strpos($row['g_add'], 'พัทลุง') === false && !empty($row['g_add']) && $row['g_add'] !== '-' && $row['g_add'] !== ' ') {
                                    $issue = "ที่อยู่ไม่ระบุ 'พัทลุง'";
                                } elseif ($row['g_head_th'] === 'ว่าง' || $row['g_head_th'] === '-') {
                                    $issue = "ชื่อเป็นค่าว่าง/Placeholder";
                                } elseif ($row['g_add'] === '' || $row['g_add'] === ' ' || $row['g_add'] === '-') {
                                    $issue = "ที่อยู่ว่างเปล่า";
                                } elseif ($row['g_head_th'] === 'cfg') {
                                    $issue = "ข้อมูลขยะ (Test Data)";
                                } else {
                                    $issue = "รูปแบบข้อมูลไม่ถูกต้อง";
                                }
                                ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($row['g_head_th']); ?></td>
                                    <td><?php echo htmlspecialchars($row['g_position']); ?></td>
                                    <td><?php echo htmlspecialchars($row['g_add']); ?></td>
                                    <td><span class="badge badge-danger"><?php echo $issue; ?></span></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>