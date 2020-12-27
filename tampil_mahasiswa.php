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
		alert('Upps anda belum login silahkan login terlebih dahulu');document.location='javascript:history.back(1)';
		</script>");
}else{
$jml_mhs=mysqli_query($koneksi,"select count(id_mahasiswa) as all_mhs from mahasiswa");
$total=mysqli_fetch_array($jml_mhs);

$jml_mhs_pria=mysqli_query($koneksi,"select count(id_mahasiswa) as all_pria from mahasiswa where jenis_kelamin='pria'");
$total_pria=mysqli_fetch_array($jml_mhs_pria);

$jml_mhs_wanita=mysqli_query($koneksi,"select count(id_mahasiswa) as all_wanita from mahasiswa where jenis_kelamin='wanita'");
$total_wanita=mysqli_fetch_array($jml_mhs_wanita);

?>
<nav class="nav nav-pills flex-column flex-sm-row">
  <a class="flex-sm-fill text-sm-center nav-link" aria-current="page" href="utama.php">Menu Utama</a>
  <a class="flex-sm-fill text-sm-center nav-link" href="input_mahasiswa.php">Input Mahasiswa</a>
  <a class="flex-sm-fill text-sm-center nav-link active" href="tampil_mahasiswa.php">Data Mahasiswa</a>
  <a class="flex-sm-fill text-sm-center nav-link" href="logout.php" tabindex="-1" aria-disabled="true">Logout</a>
</nav>
<h1><tr><td><div class="alert alert-primary" role="alert"><center>
  Data Mahasiswa</center></tr></td></h1>
<table class="table table-dark">
	<tr>
		<td>NO</td>
		<td>Nama</td>
		<td>Jenis Kelamin</td>
		<td colspan="2">Action</td>
	</tr>
	<?php
		$no=1;
		$query=mysqli_query($koneksi,"select * from mahasiswa");
		while($list_mahasiswa=mysqli_fetch_array($query))
		{
		?>
	<tr>
		<td><?php echo $no++;?></td>
		<td><?php echo $list_mahasiswa['nama'];?></td>
		<td><?php echo $list_mahasiswa['jenis_kelamin'];?>
		<td><a href="edit_mahasiswa.php?id_mahasiswa=<?php echo $list_mahasiswa['id_mahasiswa'];?>" class="btn btn-success btn-lg">Edit</a></td>
		<td><a href="hapus_mahasiswa.php?id_mahasiswa=<?php echo $list_mahasiswa['id_mahasiswa'];?>" class="btn btn-danger btn-lg">Hapus</a></td>
	</tr>
	</center>
		<?php } ?>
	<tr>
		<td>Jumlah Mahasiswa <?php echo $total['all_mhs'];?></td>
		<td>Jumlah Mahasiswa Pria <?php echo $total_pria['all_pria'];?></td>
		<td>Jumlah Mahasiswa wanita <?php echo $total_wanita['all_wanita'];?></td>
	</tr>
		
</table>
<td><a href="input_mahasiswa.php" class="btn btn-success btn-lg">INPUT</a></td>
<?php } ?>
		

