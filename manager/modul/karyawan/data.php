<?php
$query = "SELECT
    SUM(CASE WHEN posisi = 'Designer' THEN 1 ELSE 0 END) AS jumlahDesainer,
    SUM(CASE WHEN posisi = 'Programmer' THEN 1 ELSE 0 END) AS jumlahProgrammer,
    SUM(CASE WHEN posisi = 'System Analyst' THEN 1 ELSE 0 END) AS jumlahAnalyst,
    SUM(CASE WHEN posisi = 'System Engineer' THEN 1 ELSE 0 END) AS jumlahEngineer,
    SUM(CASE WHEN posisi = 'Quality Control' THEN 1 ELSE 0 END) AS jumlahQuality,
    SUM(CASE WHEN posisi = 'Marketing' THEN 1 ELSE 0 END) AS jumlahMarketing
FROM tb_posisi
JOIN tb_task ON tb_posisi.id_posisi = tb_task.id_posisi;";

// Eksekusi query
$result = mysqli_query($con, $query);

// Periksa apakah query berhasil dieksekusi
if (!$result) {
    die("Query failed: " . mysqli_error($con));
}

// Ambil hasil query
$row = mysqli_fetch_assoc($result);

// Ambil nilai-nilai jumlah karyawan untuk setiap posisi
$jumlahDesainer = $row['jumlahDesainer'];
$jumlahProgrammer = $row['jumlahProgrammer'];
$jumlahAnalyst = $row['jumlahAnalyst'];
$jumlahEngineer = $row['jumlahEngineer'];
$jumlahQuality = $row['jumlahQuality'];
$jumlahMarketing = $row['jumlahMarketing'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Diagram Posisi Karyawan</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .paginate_button.page-item.active a {
            background-color: #e96020 !important;
            /* Warna latar belakang saat aktif */
            border: 1px solid #e96020 !important;
            /* Warna border saat aktif */
            color: white !important;
            /* Warna teks saat aktif */
        }
    </style>
</head>

<body>
    <div class="page-inner">
        <div class="page-header">
            <h2 class="page-title">Data Karyawan</h2>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="index.php">
                        <i class="flaticon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Data Karyawan</a>
                </li>
            </ul>
        </div>

        <div class="row py-4">
            <div class="col-md-6 py-1">
                <div class="card">
                    <div class="card-body">
                        <!-- Ganti ukuran width dan height di bawah sesuai keinginan Anda -->
                        <canvas id="pieChart" width="200" height="200"></canvas>
                        <div id="legend"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title"></div>
                    </div>

                    <div class="table-responsive">
                        <table id="example" class="display table table-striped table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th style="background-color: #e96020; color: white; width: 10%;">No</th>
                                    <th style="background-color: #e96020; color: white; width: 40%;">Nama Karyawan</th>
                                    <th style="background-color: #e96020; color: white; width: 50%;">Posisi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $karyawan = mysqli_query($con, "SELECT * FROM tb_user
                                    INNER JOIN tb_task ON tb_user.id_user = tb_task.id_user
                                    INNER JOIN tb_posisi ON tb_task.id_posisi = tb_posisi.id_posisi
                                    ORDER BY tb_user.id_jabatan='2' ASC");

                                foreach ($karyawan as $k) { ?>
                                    <tr>
                                        <td><?= $no++; ?>.</td>
                                        <td><?= $k['nama_user']; ?></td>
                                        <td><?= $k['posisi']; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery, Bootstrap, DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+WyK8lDSt5DTNFjELzCpLegwGpGtU25g" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

    <!-- DataTables initialization -->
    <script>
        $(document).ready(function() {
            var table = $('#example').DataTable({
                lengthChange: false
            });

            table.buttons().container().appendTo('#example_wrapper .col-md-6:eq(0)');
        });
    </script>

    <!-- Chart.js initialization -->
    <script>
        var ctxPie = document.getElementById('pieChart').getContext('2d');

        // Data untuk setiap posisi
        var dataPie = [
            <?= $jumlahDesainer; ?>,
            <?= $jumlahProgrammer; ?>,
            <?= $jumlahAnalyst; ?>,
            <?= $jumlahEngineer; ?>,
            <?= $jumlahQuality; ?>,
            <?= $jumlahMarketing; ?>
        ];

        // Nama posisi
        var labelsPie = ['Designer', 'Programmer', 'System Analyst', 'System Engineer', 'Quality Control', 'Marketing'];

        // Warna untuk setiap posisi
        var colorsPie = ['#F6AB1E', '#E96120', '#FDD904', '#FCE67E', '#FAC265', '#FAA247'];

        // Fungsi untuk membuat pie chart
        function createPieChart(ctx, data, labels, colors) {
            new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: labels,
                    datasets: [{
                        backgroundColor: colors,
                        borderWidth: 0,
                        data: data
                    }]
                },
                options: {
                    legend: {
                        display: false
                    }
                }
            });
        }

        // Membuat pie chart
        createPieChart(ctxPie, dataPie, labelsPie, colorsPie);
    </script>
</body>

</html>