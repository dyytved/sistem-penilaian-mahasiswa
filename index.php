<?php
// Data mahasiswa dalam array multidimensi
$mahasiswa = array(
    array(
        "nim" => "21001",
        "nama" => "Adi Pratama",
        "mtk" => 85,
        "pemrograman" => 90,
        "database" => 88,
        "webdev" => 92
    ),
    array(
        "nim" => "21002",
        "nama" => "Budi Santoso",
        "mtk" => 75,
        "pemrograman" => 78,
        "database" => 72,
        "webdev" => 80
    ),
    array(
        "nim" => "21003",
        "nama" => "Citra Dewi",
        "mtk" => 92,
        "pemrograman" => 95,
        "database" => 91,
        "webdev" => 94
    ),
    array(
        "nim" => "21004",
        "nama" => "Doni Hermawan",
        "mtk" => 68,
        "pemrograman" => 65,
        "database" => 70,
        "webdev" => 67
    ),
    array(
        "nim" => "21005",
        "nama" => "Eva Nurul",
        "mtk" => 88,
        "pemrograman" => 86,
        "database" => 89,
        "webdev" => 87
    )
);

// Fungsi menghitung rata-rata nilai
function hitungRataRata($mtk, $pemrograman, $database, $webdev) {
    return ($mtk + $pemrograman + $database + $webdev) / 4;
}

// Fungsi menentukan status kelulusan
function statusKelulusan($rataRata) {
    if ($rataRata >= 80) {
        return array("status" => "LULUS", "grade" => "A", "color" => "success");
    } elseif ($rataRata >= 70) {
        return array("status" => "LULUS", "grade" => "B", "color" => "info");
    } elseif ($rataRata >= 60) {
        return array("status" => "LULUS", "grade" => "C", "color" => "warning");
    } else {
        return array("status" => "TIDAK LULUS", "grade" => "D", "color" => "danger");
    }
}

// Menghitung rata-rata kelas
$totalRataRata = 0;
$jumlahMahasiswa = count($mahasiswa);

foreach ($mahasiswa as $siswa) {
    $rataRata = hitungRataRata($siswa["mtk"], $siswa["pemrograman"], $siswa["database"], $siswa["webdev"]);
    $totalRataRata += $rataRata;
}
$rataRataKelas = $totalRataRata / $jumlahMahasiswa;
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Penilaian Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px 0;
        }
        .container {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.2);
            padding: 30px;
            margin-top: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }
        .header h1 {
            font-weight: 700;
            color: #667eea;
            margin-bottom: 10px;
        }
        .stats-box {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 30px;
            text-align: center;
        }
        .stats-box h4 {
            margin-bottom: 10px;
            font-weight: 600;
        }
        .stats-box .nilai {
            font-size: 2em;
            font-weight: 700;
        }
        table {
            margin-top: 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        table thead {
            background: #667eea;
            color: white;
        }
        table thead th {
            border: none;
            font-weight: 600;
            padding: 15px;
            text-align: center;
        }
        table tbody td {
            padding: 12px 15px;
            vertical-align: middle;
            border-bottom: 1px solid #e0e0e0;
        }
        table tbody tr:hover {
            background-color: #f5f5f5;
        }
        .badge-custom {
            padding: 8px 12px;
            font-weight: 600;
            border-radius: 5px;
        }
        .nilai-tinggi {
            color: #28a745;
            font-weight: 600;
        }
        .nilai-sedang {
            color: #ffc107;
            font-weight: 600;
        }
        .nilai-rendah {
            color: #dc3545;
            font-weight: 600;
        }
        .no-column {
            text-align: center;
            font-weight: 600;
            width: 50px;
        }
        .footer {
            margin-top: 30px;
            text-align: center;
            color: #999;
            font-size: 0.9em;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>📊 Sistem Penilaian Mahasiswa</h1>
            <p class="text-muted">Manajemen Nilai dan Status Kelulusan Siswa</p>
        </div>

        <!-- Statistik Kelas -->
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="stats-box">
                    <h4>Total Mahasiswa</h4>
                    <div class="nilai"><?php echo $jumlahMahasiswa; ?></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stats-box">
                    <h4>Rata-rata Kelas</h4>
                    <div class="nilai"><?php echo number_format($rataRataKelas, 2); ?></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stats-box">
                    <h4>Grade Kelas</h4>
                    <div class="nilai">
                        <?php 
                        $gradeKelas = statusKelulusan($rataRataKelas);
                        echo $gradeKelas['grade'];
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabel Penilaian -->
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="no-column">No</th>
                        <th>NIM</th>
                        <th>Nama Mahasiswa</th>
                        <th class="text-center">MTK</th>
                        <th class="text-center">Pemrograman</th>
                        <th class="text-center">Database</th>
                        <th class="text-center">Web Dev</th>
                        <th class="text-center">Rata-rata</th>
                        <th class="text-center">Grade</th>
                        <th class="text-center">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    foreach ($mahasiswa as $siswa) {
                        $rataRata = hitungRataRata(
                            $siswa["mtk"], 
                            $siswa["pemrograman"], 
                            $siswa["database"], 
                            $siswa["webdev"]
                        );
                        $hasil = statusKelulusan($rataRata);
                        
                        // Tentukan warna nilai berdasarkan range
                        $kelasNilai = ($rataRata >= 80) ? 'nilai-tinggi' : (($rataRata >= 70) ? 'nilai-sedang' : 'nilai-rendah');
                    ?>
                    <tr>
                        <td class="no-column"><?php echo $no++; ?></td>
                        <td><?php echo $siswa["nim"]; ?></td>
                        <td><?php echo $siswa["nama"]; ?></td>
                        <td class="text-center"><?php echo $siswa["mtk"]; ?></td>
                        <td class="text-center"><?php echo $siswa["pemrograman"]; ?></td>
                        <td class="text-center"><?php echo $siswa["database"]; ?></td>
                        <td class="text-center"><?php echo $siswa["webdev"]; ?></td>
                        <td class="text-center">
                            <span class="<?php echo $kelasNilai; ?>">
                                <?php echo number_format($rataRata, 2); ?>
                            </span>
                        </td>
                        <td class="text-center">
                            <span class="badge badge-custom bg-<?php echo $hasil['color']; ?>">
                                <?php echo $hasil['grade']; ?>
                            </span>
                        </td>
                        <td class="text-center">
                            <span class="badge bg-<?php echo $hasil['color']; ?>">
                                <?php echo $hasil['status']; ?>
                            </span>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <!-- Keterangan -->
        <div class="alert alert-info mt-4">
            <h5>📋 Keterangan Grade</h5>
            <ul class="mb-0">
                <li><strong>A (80-100)</strong>: Lulus dengan sangat memuaskan</li>
                <li><strong>B (70-79)</strong>: Lulus dengan baik</li>
                <li><strong>C (60-69)</strong>: Lulus cukup memuaskan</li>
                <li><strong>D (&lt;60)</strong>: Tidak lulus</li>
            </ul>
        </div>

        <div class="footer">
            <p>© 2026 Sistem Penilaian Mahasiswa | Dibuat dengan PHP & Bootstrap</p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>