<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->

<?php
include "koneksi.php";
session_start();
if (!isset ($_SESSION['username'])) {
echo("<script type='text/javascript'>
		alert('Upps harus lewat menu dulu');document.location='javascript:history.back(1)';
		</script>");
}else{
if(isset($_POST['save'])){
	$query_edit=mysqli_query($koneksi,"update mahasiswa set nama='".$_POST['nama']."',
	jenis_kelamin='".$_POST['jenis_kelamin']."'
	where id_mahasiswa='".$_POST['id_mahasiswa']."'");
	
	if($query_edit){
		header("location:tampil_mahasiswa.php");
	}else{
		echo mysqli_error();
	}
	
}

$data_dari_tampil_mahasiswa=mysqli_query($koneksi,"select * from mahasiswa where id_mahasiswa='".$_GET['id_mahasiswa']."'");
$tampil=mysqli_fetch_array($data_dari_tampil_mahasiswa);
?>
<form method="POST">
	<table class="table table-dark">
		<input type="hidden" name="id_mahasiswa" value="<?php echo $tampil['id_mahasiswa'];?>" 
		<tr>
			<td>Nama</td>
			<td><input type="text" name="nama" value="<?php echo $tampil['nama'];?>"></td>
		<tr>
		<tr>
		<td>Jenis Kelamin</td>
		<td><select name="jenis_kelamin">
			<option value="">--pilih--</option>
			<option value="pria">pria</option>
			<option value="wanita">wanita</option>
		</select>
		</tr>
		<tr>
		<td><input type="submit" name="save" class="btn btn-success btn-lg"></td>
		</tr>
		</table>
</form>
</form>
