<?php
$id_login = @$_SESSION['karyawan'];
$userAktif = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM tb_user WHERE id_user='$id_login'"));
?>

<div class="page-inner">
  <div class="page-header">
    <h4 class="page-title">Tambah Task</h4>

  </div>
  <div class="row">
    <div class="col-lg-8">
      <div class="card">
        <div class="card-header d-flex align-items-center">
          <h3 class="h4">Form Entry Data Task</h3>
        </div>
        <div class="card-body">
          <form action="?page=task&act=proses" method="post" enctype="multipart/form-data">
            <table cellpadding="12" style="font-weight: bold;">
              <input name="id" type="hidden" value="<?= $t['id_user'] ?>">
              <tr>
                <td>Nama Task</td>
                <td>:</td>
                <td><input type="text" class="form-control" name="task" placeholder="Nama Task" autofocus required  maxlength="255"></td>
              </tr>
              <tr>
                <td>Assigned</td>
                <td>:</td>
                <td><input name="nama" type="text" class="form-control" placeholder="nama user" value="<?= $userAktif['nama_user'] ?>" readonly required>
                </td>
              </tr>
              <tr>
                <td>Posisi </td>
                <td>:</td>
                <td>
                  <select class="form-control" name="posisi" required>
                    <?php
                    $sqlPosisi = mysqli_query($con, "SELECT * FROM tb_posisi 
    ORDER BY id_posisi ASC");
                    while ($posisi = mysqli_fetch_array($sqlPosisi)) {
                      echo "<option value='$posisi[id_posisi]'>$posisi[posisi]</option>";
                    }
                    ?>
                  </select>
                </td>
              </tr>
              <tr>
                <td>Diberikan</td>
                <td>:</td>
                <td><input name="tgl_mulai" type="date" class="form-control" required></td>
              </tr>
              <tr>
                <td>Deadline</td>
                <td>:</td>
                <td><input name="tgl_selesai" type="date" class="form-control" required></td>
              </tr>
              <tr>
                <td>Status </td>
                <td>:</td>
                <td>
                  <select name="status" class="form-control" required>
                    <option value="Not Started">Not Started</option>
                    <option value="In Progress">In Progress</option>
                    <option value="Done">Done</option>
                  </select>
                </td>
              </tr>

              <td colspan="4">
                <button name="saveTask" type="submit" class="btn text-white" style="background-color: #e96020;"><i class="fa fa-save"></i> Simpan</button>
                <a href="javascript:history.back()" class="btn text-white" style="background-color: darkblue;"><i class="fa"></i> Batal</a>
              </td>
              </tr>
            </table>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
