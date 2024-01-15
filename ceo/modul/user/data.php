<?php
//query menghitung jumlah user



$query = "SELECT COUNT(*) AS jumlahManager FROM tb_user WHERE id_jabatan = 3";
$result = mysqli_query($con, $query);

if (!$result) {
  die("Query failed: " . mysqli_error($con));
}

// Ambil hasil query
$row = mysqli_fetch_assoc($result);

// Ambil nilai jumlah manager
$jumlahManager = $row['jumlahManager'];
?>



<div class="page-inner">
  <div class="page-header">
    <h2 class="page-title">Data User</h2>
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
        <a href="#">Data user</a>
      </li>
      <!-- <li class="separator">
                <i class="flaticon-right-arrow"></i>
              </li>
              <li class="nav-item">
                <a href="#">Data Pegawai</a>
              </li>
              <li class="separator">
                <i class="flaticon-right-arrow"></i>
              </li>
              <li class="nav-item">
                <a href="#">Tambah Pegawai</a>
              </li> -->
    </ul>
  </div><br>
  <div class="row mt--4">
    <!-- Card Total Pegawai  -->
    <div class="col-xl-4 col-md-4 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-right">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-uppercase mb-1" style="color:#e96020; font-size: 20px;">JUMLAH USER</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                <h2 style="font-size: 35px; text-align: left; margin-top: 40px; margin-left:30px;"><?php echo $jumlahUser; ?></h2>
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

    <!-- Card Total manager -->
    <div class="col-xl-4 col-md-4 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-right">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold  text-uppercase mb-1" style="color:#e96020; font-size: 20px;">MANAGER</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                <h2 style="font-size: 35px; text-align: left; margin-top: 40px; margin-left:30px;"> <?php echo $jumlahManager; ?></h2>
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

    <!-- Card Total Pegawai Programmer -->
    <div class="col-xl-4 col-md-4 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-right">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold  text-uppercase mb-1" style="color:#e96020;font-size: 20px;"> KARYAWAN</div>
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
  </div>
</div>


<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <div class="card-title">
          <!-- <a href="?page=karyawan&act=add" class="btn  btn-sm text-white" style="background-color: #e96020;"><i class="fa fa-plus"></i> Tambah</a> -->
        </div>
      </div>
      <div class="table-responsive">
        <table id="example" class="display table table-striped table-hover">
          <thead>
            <tr>
              <th style="background-color: #e96020; color: white;">No</th>
              <th style="background-color: #e96020; color: white;">Nama User</th>
              <th style="background-color: #e96020; color: white;">Jabatan</th>
              <th style="background-color: #e96020; color: white;">Email</th>
              <th style="background-color: #e96020; color: white;">Foto</th>
              <th style="background-color: #e96020; color: white;">Opsi</th>
            </tr>
          </thead>
          <!-- <tfoot>
            <tr>
              <th style="background-color: #e96020; color: white;">No</th>
              <th style="background-color: #e96020; color: white;">Nama User</th>
              <th style="background-color: #e96020; color: white;">Jabatan</th>
              <th style="background-color: #e96020; color: white;">Email</th>
              <th style="background-color: #e96020; color: white;">Foto</th>
              <th style="background-color: #e96020; color: white;">Opsi</th>
            </tr>
          </tfoot> -->
          <tbody>
            <?php
            $no = 1;
            $user = mysqli_query($con, "SELECT * FROM tb_user
            INNER JOIN tb_jabatan ON tb_user.id_jabatan=tb_jabatan.id_jabatan
            ORDER BY id_user ASC
           ");
            foreach ($user as $k) { ?>
              <tr>
                <td><?= $no++; ?>.</td>
                <td><?= $k['nama_user']; ?></td>
                <td><?= $k['nama_jabatan']; ?></td>
                <td><?= $k['email']; ?></td>
                <td><img src="../assets/img/user/<?= $k['foto'] ?>" width="45" height="45"></td>
                <td>
                  <div class="btn-group" role="group">
                    <button class="btn btn-danger delete-user-btn" data-id="<?= $k['id_user'] ?>">
                      <img src="../assets/img/ICON/ikon_hapus_data-removebg-preview.png" alt="Delete" width="16" height="16">
                    </button>
                    <a class="btn btn-info" href="?page=user&act=edit&id=<?= $k['id_user'] ?>">
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
<!-- show entri data 10 baris -->


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

<!-- Penangan alert delete data  -->
<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Menggunakan event delegation untuk menangani klik pada semua tombol hapus
    document.addEventListener('click', function(e) {
      if (e.target.classList.contains('delete-user-btn')) {
        e.preventDefault();

        const userId = e.target.getAttribute('data-id');

        // Tampilkan peringatan SweetAlert
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
            window.location.href = `?page=user&act=del&id=${userId}`;
          }
        });
      }
    });
  });
</script>

<style>
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