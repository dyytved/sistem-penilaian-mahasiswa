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
    if ($r >= 80) return array("LULUS", "A");
    elseif ($r >= 70) return array("LULUS", "B");
    elseif ($r >= 60) return array("LULUS", "C");
    else return array("TIDAK LULUS", "D");
}

$totalRata = 0;
foreach ($mahasiswa as $s) $totalRata += rataRata($s["mtk"], $s["prog"], $s["db"], $s["web"]);
$rataKelas = $totalRata / count($mahasiswa);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Penilaian Mahasiswa</title>
    <style>
        body { font-family: Arial; margin: 20px; background: #f5f5f5; }
        .container { background: white; padding: 20px; border-radius: 5px; max-width: 1000px; }
        h1 { color: #333; text-align: center; }
        .stats { margin-bottom: 20px; }
        .stat-box { display: inline-block; width: 45%; margin: 10px; padding: 15px; background: #667eea; color: white; border-radius: 5px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th { background: #333; color: white; padding: 10px; text-align: left; }
        td { padding: 10px; border-bottom: 1px solid #ddd; text-align: center; }
        tr:hover { background: #f9f9f9; }
        .lulus { color: green; font-weight: bold; }
        .tidaklulus { color: red; font-weight: bold; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Sistem Penilaian Mahasiswa</h1>
        
        <div class="stats">
            <div class="stat-box">Total Mahasiswa: <strong><?php echo count($mahasiswa); ?></strong></div>
            <div class="stat-box">Rata-rata Kelas: <strong><?php echo number_format($rataKelas, 2); ?></strong></div>
        </div>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>MTK</th>
                    <th>Prog</th>
                    <th>DB</th>
                    <th>Web</th>
                    <th>Rata-rata</th>
                    <th>Grade</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 1;
                foreach ($mahasiswa as $s) {
                    $r = rataRata($s["mtk"], $s["prog"], $s["db"], $s["web"]);
                    list($status, $grade) = statusGrade($r);
                    $class = ($status == "LULUS") ? "lulus" : "tidaklulus";
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $s["nim"]; ?></td>
                    <td><?php echo $s["nama"]; ?></td>
                    <td><?php echo $s["mtk"]; ?></td>
                    <td><?php echo $s["prog"]; ?></td>
                    <td><?php echo $s["db"]; ?></td>
                    <td><?php echo $s["web"]; ?></td>
                    <td><strong><?php echo number_format($r, 2); ?></strong></td>
                    <td><?php echo $grade; ?></td>
                    <td class="<?php echo $class; ?>"><?php echo $status; ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>