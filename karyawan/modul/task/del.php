<?php
$del = mysqli_query($con, "DELETE FROM tb_task WHERE id_task=$_GET[id]");
if ($del) {
	echo " <script>
		alert('Data telah dihapus !');
		window.location='?page=task';
		</script>";
}
