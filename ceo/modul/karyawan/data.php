<div class="page-inner">
    <div class="page-header">
        <h3 class="page-title">Data Karyawan</h3>
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
            <!-- <li class="separator">
                <i class="flaticon-right-arrow"></i>
              </li>
              <li class="nav-item">
                <a href="#">Tambah K</a>
              </li> -->
        </ul>
    </div>
    <div class="row mt--6">
        <div class="col-xl-4 col-md-4 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1" style="color:#e96020; font-size: 20px;">JUMLAH KARYAWAN</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <h2 style="font-size: 35px; text-align: left; margin-top: 40px; margin-left:30px;"><?php echo $jumlahKaryawan; ?></h2>
                            </div>
                        </div>
                        <div class="col-auto">
                            <svg width="35" height="150" viewBox="0 0 50 150" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="32.9952" height="48.6695" transform="matrix(-0.00893818 -0.99996 0.999908 -0.0135454 1.33508 150)" fill="#E96120" />
                                <rect width="32.1269" height="48.6695" transform="matrix(-0.00893818 -0.99996 0.999908 -0.0135454 0.98584 110.928)" fill="#E96120" fill-opacity="0.75" />
                                <rect width="32.1269" height="48.6695" transform="matrix(-0.00893818 -0.99996 0.999908 -0.0135454 0.636597 71.8567)" fill="#E96120" fill-opacity="0.5" />
                                <rect width="32.9952" height="48.6695" transform="matrix(-0.00893818 -0.99996 0.999908 -0.0135454 0.295044 33.6531)" fill="#E96120" fill-opacity="0.25" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">

            <div class="row">
                <div class="col-md-6 position-relative" style="top: 65px; left: 50px;">
                    <!-- <div class="dropdown">
                        <button class="btn text-white dropdown-toggle" style="background-color: #e96020;" type="button" id="statusDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Status
                        </button>
                        <div class="dropdown-menu" aria-labelledby="statusDropdown">
                            <a class="dropdown-item" href="#" data-status="Not Started">Not Started</a>
                            <a class="dropdown-item" href="#" data-status="In Progress">In Progress</a>
                            <a class="dropdown-item" href="#" data-status="Finished">Finished</a>
                        </div> -->

                </div>
            </div>

        </div>
    </div>
</div>




<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                </div>
            </div>

            <div class="table-responsive">
                <table id="example" class="display table table-striped table-hover">
                    <thead>
                        <tr>
                            <th style="background-color: #e96020; color: white;">No</th>
                            <th style="background-color: #e96020; color: white;">Nama Karyawan</th>
                            <th style="background-color: #e96020; color: white;">Posisi</th>

                        </tr>
                    </thead>
                    <!-- <tfoot>
                        <tr>
                            <th style="background-color: #e96020; color: white;">No</th>
                            <th style="background-color: #e96020; color: white;">Nama Karyawan</th>
                            <th style="background-color: #e96020; color: white;">Posisi</th>
                        </tr>
                    </tfoot> -->


                    <tbody>
                        <?php
                        $no = 1;
                        $karyawan = mysqli_query($con, "SELECT * FROM tb_user
                        INNER JOIN tb_task ON tb_user.id_user = tb_task.id_user
                        INNER JOIN tb_posisi ON tb_task.id_posisi =tb_posisi.id_posisi
                        ORDER BY tb_user.id_jabatan='2'  ASC");


                        foreach ($karyawan as $k) { ?>
                            <tr>
                                <td><?= $no++; ?>.</td>
                                <td><?= $k['nama_user']; ?></td>
                                <td><?= $k['posisi']; ?></td>


                                <!-- <a class="btn btn-danger btn-sm" onclick="return confirm('Yakin Hapus Data ??')" href="?page=pegawai&act=del&id=<?= $p['id_pegawai'] ?>"><i class="fas fa-trash"></i></a>
                            <a class="btn btn-info btn-sm" href="?page=proyek&act=edit&id=<?= $p['id_pegawai'] ?>"><i class="far fa-edit"></i></a> -->

                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- show entri 10 baris -->
<script src="../assets/js/plugin/datatables/jquery-3.7.0.js"></script>
<script src="../assets/js/plugin/datatables/dataTables.js"></script>
<script src="../assets/js/plugin/datatables/dataTables.bootstrap4.min.js"></script>
<script src="../assets/js/plugin/datatables/dataTables.buttons.min.js"></script>
<script src="../assets/js/plugin/datatables/buttons.bootstrap4.min.js"></script>
<script src="../assets/js/plugin/datatables/jszip.min.js"></script>
<script src="../assets/js/plugin/datatables/pdfmake.min.js"></script>
<script src="../assets/js/plugin/datatables/vfs_fonts.js"></script>
<script src="../assets/js/plugin/datatables/buttons.html5.min.js"></script>
<script src="../assets/js/plugin/datatables/buttons.print.min.js"></script>
<script src="../assets/js/plugin/datatables/buttons.colVis.min.js"></script>

<script>
    $(document).ready(function() {
        var table = $('#example').DataTable({
            lengthChange: false,
            buttons: ['excel', 'pdf', 'colvis']
        });

        table.buttons().container()
            .appendTo('#example_wrapper .col-md-6:eq(0)');
    });
</script>

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