<?php
include "koneksi.php";
if (isset($_POST['login'])) {
$username=$_POST["username"];
$password=md5($_POST["password"]);

$sql=mysqli_query($koneksi, "select * from admin where username = '$username' and password = '$password'");
$hasil=mysqli_fetch_array($sql);
$cek=mysqli_num_rows($sql);
$nama_user= $hasil['username'];
if ($cek >0){
	session_start();
	$_SESSION['username']= $nama_user;
	header("location:utama.php");	
}else{
echo ("<script type='text/javascript'>
		alert('Upps anda gagal login periksa kembali data yang ada masukan');document.location='javascript:history.back(1)';
		</script>");
}
	

}
?>
<?php
session_start();
if (isset ($_SESSION['username'])) {
echo("<script type='text/javascript'>
		alert('Upps anda belum logout');document.location='javascript:history.back(1)';
		</script>");
}else{
?>

<!DOCTYPE html>

<html>

<head>

 <title>Login Form</title>

 <link rel="stylesheet" href="style.css">

</head>

<body>

<form class="box" method="post">

<h1>Login Here</h1>

<input type="text" name="username" placeholder="username">

<input type="password" name="password" placeholder="password">

<input type="submit" name="login" value="Login">

</form>

</body>

</html>

<?php } ?>
