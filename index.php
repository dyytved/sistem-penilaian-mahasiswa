<?php
$mahasiswa = array(
    array("nim" => "21001", "nama" => "Adi Pratama", "mtk" => 85, "prog" => 90, "db" => 88, "web" => 92),
    array("nim" => "21002", "nama" => "Budi Santoso", "mtk" => 75, "prog" => 78, "db" => 72, "web" => 80),
    array("nim" => "21003", "nama" => "Citra Dewi", "mtk" => 92, "prog" => 95, "db" => 91, "web" => 94),
    array("nim" => "21004", "nama" => "Doni Hermawan", "mtk" => 68, "prog" => 65, "db" => 70, "web" => 67),
    array("nim" => "21005", "nama" => "Eva Nurul", "mtk" => 88, "prog" => 86, "db" => 89, "web" => 87)
);

function rataRata($a, $b, $c, $d) { return ($a + $b + $c + $d) / 4; }
function statusGrade($r) { 
    if ($r >= 80) return array("LULUS", "A", "success");
    elseif ($r >= 70) return array("LULUS", "B", "info");
    elseif ($r >= 60) return array("LULUS", "C", "warning");
    else return array("TIDAK LULUS", "D", "danger");
}

$totalRata = 0;
foreach ($mahasiswa as $s) $totalRata += rataRata($s["mtk"], $s["prog"], $s["db"], $s["web"]);
$rataKelas = $totalRata / count($mahasiswa);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penilaian Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: linear-gradient(135deg, #667eea, #764ba2); min-height: 100vh; padding: 20px 0; }
        .container { background: white; border-radius: 15px; padding: 30px; }
        .header h1 { color: #667eea; text-align: center; margin-bottom: 30px; }
        .stats { background: #667eea; color: white; padding: 15px; border-radius: 10px; margin-bottom: 20px; text-align: center; }
        table thead { background: #667eea; color: white; }
        table tbody tr:hover { background: #f5f5f5; }
        .badge-success { background: #28a745 !important; }
        .badge-info { background: #17a2b8 !important; }
        .badge-warning { background: #ffc107 !important; }
        .badge-danger { background: #dc3545 !important; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header"><h1>📊 Sistem Penilaian Mahasiswa</h1></div>
        
        <div class="row mb-4">
            <div class="col-md-6">
                <div class="stats"><h5>Total Mahasiswa</h5><h3><?php echo count($mahasiswa); ?></h3></div>
            </div>
            <div class="col-md-6">
                <div class="stats"><h5>Rata-rata Kelas</h5><h3><?php echo number_format($rataKelas, 2); ?></h3></div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th><th>NIM</th><th>Nama</th><th>MTK</th><th>Prog</th><th>DB</th><th>Web</th><th>Rata-rata</th><th>Grade</th><th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    foreach ($mahasiswa as $s) {
                        $r = rataRata($s["mtk"], $s["prog"], $s["db"], $s["web"]);
                        list($status, $grade, $color) = statusGrade($r);
                    ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $s["nim"]; ?></td>
                        <td><?php echo $s["nama"]; ?></td>
                        <td class="text-center"><?php echo $s["mtk"]; ?></td>
                        <td class="text-center"><?php echo $s["prog"]; ?></td>
                        <td class="text-center"><?php echo $s["db"]; ?></td>
                        <td class="text-center"><?php echo $s["web"]; ?></td>
                        <td class="text-center"><strong><?php echo number_format($r, 2); ?></strong></td>
                        <td class="text-center"><span class="badge bg-<?php echo $color; ?>"><?php echo $grade; ?></span></td>
                        <td class="text-center"><span class="badge bg-<?php echo $color; ?>"><?php echo $status; ?></span></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>