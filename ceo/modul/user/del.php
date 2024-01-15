<?php
$del = mysqli_query($con, "DELETE FROM tb_user WHERE id_user=$_GET[id]");
if ($del) {
	echo " <script>
		alert('Data telah dihapus !');
		window.location='?page=user';
		</script>";
}
