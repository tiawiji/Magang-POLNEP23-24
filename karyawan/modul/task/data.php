<?php
// menghiutng jumlah status
session_start();

$id_login = @$_SESSION['karyawan'];

// Ambil informasi pengguna
$userAktif = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM tb_user WHERE id_user='$id_login'"));

// Ambil jumlah tugas untuk setiap status berdasarkan pengguna yang masuk
$result = mysqli_query($con, "SELECT status, COUNT(*) AS jumlah FROM tb_task WHERE id_user = '$id_login' GROUP BY status");
$statusCounts = [];

while ($row = mysqli_fetch_assoc($result)) {
  $statusCounts[$row['status']] = $row['jumlah'];
}

$jumlahDone = $statusCounts['Done'] ?? 0;
$jumlahProgress = $statusCounts['In Progress'] ?? 0;
$jumlahNotStarted = $statusCounts['Not Started'] ?? 0;
?>

<div class="page-inner">
  <div class="page-header">
    <h3 class="page-title">Daftar Task</h3>
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
        <a href="#">Data Task</a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#">Tambah Task</a>
      </li>
    </ul>
  </div>
  <div class="row mt--6">
    <!-- Card Total Pegawai Designer -->
    <div class="col-xl-4 col-md-4 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-uppercase mb-1" style="color:#e96020; font-size: 20px;">DONE</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                <h2 style="font-size: 35px; text-align: left; margin-top: 40px; margin-left:30px;"><?php echo $jumlahDone; ?></h2>
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
    <!-- Card Total Pegawai Designer -->
    <div class="col-xl-4 col-md-4 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-uppercase mb-1" style="color:#e96020; font-size: 20px;">IN PROGRESS</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                <h2 style="font-size: 35px; text-align: left; margin-top: 40px; margin-left:30px;"><?php echo $jumlahProgress; ?></h2>
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
    <!-- Card Total Pegawai Designer -->
    <div class="col-xl-4 col-md-4 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-uppercase mb-1" style="color:#e96020; font-size: 20px;">NOT STARTED</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                <h2 style="font-size: 35px; text-align: left; margin-top: 40px; margin-left:30px;"><?php echo $jumlahNotStarted; ?></h2>
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
      <!-- Dropdown untuk Status -->
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
                        </div>

                    </div> -->
        </div>

      </div>
    </div>
  </div>




  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="card-title">
            <a href="?page=task&act=add" class="btn  btn-sm text-white" style="background-color: #e96020;"><i class="fa fa-plus"></i> Tambah</a>
          </div>
        </div>

        <div class="table-responsive">
          <table id="example" class="display table table-striped table-hover">
            <thead>
              <tr>
                <th style="background-color: #e96020; color: white;">No</th>
                <th style="background-color: #e96020; color: white;">Nama Task</th>
                <th style="background-color: #e96020; color: white;">Posisi</th>
                <th style="background-color: #e96020; color: white;">Diberikan</th>
                <th style="background-color: #e96020; color: white;">Deadline</th>
                <th style="background-color: #e96020; color: white;">Status</th>
                <th style="background-color: #e96020; color: white;">Opsi</th>
              </tr>
            </thead>
            <!-- <tfoot>
              <tr>
                <th style="background-color: #e96020; color: white;">No</th>
                <th style="background-color: #e96020; color: white;">Nama Task</th>
                <th style="background-color: #e96020; color: white;">Posisi</th>
                <th style="background-color: #e96020; color: white;">Diberikan</th>
                <th style="background-color: #e96020; color: white;">Deadline</th>
                <th style="background-color: #e96020; color: white;">Status</th>
                <th style="background-color: #e96020; color: white;">Opsi</th>
              </tr>
            </tfoot> -->


            <tbody>
              <?php
              $no = 1;
              $task = mysqli_query($con, "SELECT * FROM tb_task
              INNER JOIN tb_user ON tb_task.id_user = tb_user.id_user
              INNER JOIN tb_posisi ON tb_task.id_posisi = tb_posisi.id_posisi
              WHERE tb_task.id_user = '$id_login'
              ORDER BY tb_task.id_task ASC");

              foreach ($task as $t) { ?>
                <tr>
                  <td><?= $no++; ?>.</td>
                  <td><?= $t['nama_task']; ?></td>
                  <td><?= $t['posisi']; ?></td>
                  <td><?= $t['tgl_mulai']; ?></td>
                  <td><?= $t['tgl_selesai']; ?></td>
                  <td>
                    <?php
                    switch ($t['status']) {
                      case 'Done':
                        echo '<span class="status-icon done" title="Done"></span>';
                        break;
                      case 'In Progress':
                        echo '<span class="status-icon in-progress" title="In Progress"></span>';
                        break;
                      case 'Not Started':
                        echo '<span class="status-icon not-started" title="Not Started"></span>';
                        break;
                      default:
                        echo $t['status'];
                    }
                    echo $t['status'];
                    ?>
                  </td>
                  <td>
                    <div class="btn-group" role="group">
                      <button class="btn btn-danger btn-delete-task" data-id="<?= $t['id_task'] ?>">
                        <img src="../assets/img/ICON/ikon_hapus_data-removebg-preview.png" alt="Delete" width="16" height="16">
                      </button>
                      <a class="btn btn-info" href="?page=task&act=edit&id=<?= $t['id_task'] ?>">
                        <img src="../assets/img/ICON/ikon_edit_data-removebg-preview.png" alt="Edit" width="16" height="16">
                      </a>
                    </div>
                  </td>

                </tr>
              <?php } ?>

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<style>
  /* status */
  .status-icon {
    display: inline-block;
    width: 20px;
    /* Atur lebar ikon */
    height: 20px;
    /* Atur tinggi ikon */
    border-radius: 50%;
    margin-right: 5px;
    vertical-align: middle;
  }

  .done {
    background-color: #4CAF50;
    /* Warna hijau untuk Done */
  }

  .in-progress {
    background-color: #3498db;
    /* Warna biru untuk In Progress */
  }

  .not-started {
    background-color: #808080;
    /* Warna abu-abu untuk Not Started */
  }

  /* button page */
  .paginate_button.page-item.active a {
    background-color: #e96020 !important;
    /* Warna latar belakang saat aktif */
    border: 1px solid #e96020 !important;
    /* Warna border saat aktif */
    color: white !important;
    /* Warna teks saat aktif */
  }

  /* Styling untuk menempatkan ikon di atas */
  .swal2-popup-custom {
    flex-direction: column;
    align-items: center;
  }

  .swal2-title-custom {
    margin-top: 10px;
    /* Menentukan jarak antara ikon dan judul */
  }

  .swal2-content-custom {
    margin-top: 10px;
    /* Menentukan jarak antara ikon dan konten */
  }

  .swal2-icon.swal2-icon-show {
    border: none !important;
  }
</style>


<!-- show entri 10 baris  -->
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
      // buttons: ['excel', 'pdf', 'colvis']
    });

    table.buttons().container()
      .appendTo('#example_wrapper .col-md-6:eq(0)');
  });
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Menggunakan event delegation untuk menangani klik pada semua tombol hapus
    document.addEventListener('click', function(e) {
      if (e.target.classList.contains('btn-delete-task')) {
        e.preventDefault();

        const taskId = e.target.getAttribute('data-id');

        // Tampilkan peringatan SweetAlert dengan gambar sebagai ikon di atas judul dan teks
        Swal.fire({
          title: 'Yakin untuk menghapus Data?',
          text: 'Anda tidak dapat mengembalikan data yang dihapus!',
          iconHtml: '<img src="../assets/img/ICON/ikon_peringatan_sebelum_hapus_data-removebg-preview.png" alt="Custom Warning Icon" width="150" height="150">',
          showCancelButton: true,
          confirmButtonColor: '#e96020',
          cancelButtonColor: '#0A1D50',
          confirmButtonText: 'Yes',
          cancelButtonText: 'No',
          customClass: {
            // Menggunakan aturan CSS bawaan dari SweetAlert
            popup: 'swal2-popup-custom',
            title: 'swal2-title-custom',
            content: 'swal2-content-custom',
            cancelButton: 'swal2-cancel-button-custom',
            confirmButton: 'swal2-confirm-button-custom'
          }
        }).then((result) => {
          if (result.isConfirmed) {
            // Redirect ke halaman penghapusan dengan parameter ID
            window.location.href = `?page=task&act=del&id=${taskId}`;
          }
        });
      }
    });
  });
</script>