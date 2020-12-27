
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

if(isset($_POST['save'])){
		$nama=$_POST['nama'];
		$jenis_kelamin=$_POST['jenis_kelamin'];
$query=mysqli_query($koneksi,"insert into mahasiswa(nama,jenis_kelamin)
value('$nama',
'$jenis_kelamin')");
if($query){
	header("location:tampil_mahasiswa.php");
}	else {
	echo mysqli_error();
}

}
?>
<nav class="nav nav-pills flex-column flex-sm-row">
  <a class="flex-sm-fill text-sm-center nav-link" aria-current="page" href="utama.php">Menu Utama</a>
  <a class="flex-sm-fill text-sm-center nav-link active" href="input_mahasiswa.php">Input Mahasiswa</a>
  <a class="flex-sm-fill text-sm-center nav-link" href="tampil_mahasiswa.php">Data Mahasiswa</a>
  <a class="flex-sm-fill text-sm-center nav-link" href="logout.php" tabindex="-1" aria-disabled="true">Logout</a>
</nav>
<h1><tr><td><div class="alert alert-primary" role="alert"><center>
  Silahkan Input data Mahasiswa <?php echo $_SESSION['username'] ?> </center></tr></td></h1>
<form method ="POST">
<table class="table table-dark" border="0">
        <tr height="46">
                <td width="10%"> </td>
                <td width="25%"> </td>
               
        </tr>
        <tr height="46">
            <td> </td>
            <td>NAMA</td>
            <td><input type="text" name="nama" size="35" maxlength="20" /></td>
        </tr>
        <tr height="46">
            <td> </td>
            <td>Jenis Kelamin</td>
            <td><select name="jenis_kelamin">
                    <option value="-">- Pilih Jenis Kelamin -
                    <option value="Laki-Laki">Laki-Laki
                    <option value="Perempuan">Perempuan
                </select></td>
        <center>
        <height="46">
		<td><input type="submit" name="save" value="simpan" class="btn btn-success btn-lg"></td>
		</tr></center>
</table>
</form>
<?php } ?>