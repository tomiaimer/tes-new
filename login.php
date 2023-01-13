<?php 
session_start();
if( isset($_COOKIE['id']) && isset($_COOKIE['key']) ) {
	$id = $_COOKIE['id'];
	$key = $_COOKIE['key'];

	// ambil username berdasarkan id
	$result = mysqli_query($conn, "SELECT username FROM user WHERE id = $id");
	$row = mysqli_fetch_assoc($result);

	// cek cookie dan username
	if( $key === hash('sha256', $row['username']) ) {
		$_SESSION['login'] = true;
	}};

if( isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}
    
    

require "koneksi.php";
if(isset($_POST["submit"])) {

    $user = $_POST["username"];
    $pass = $_POST["password"];
    $result = mysqli_query($konek , "SELECT * FROM user WHERE user ='$user'");
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if ( password_verify($pass , $row["password"])){
            $_SESSION["login"] = true;
            if (isset($_POST["remember"])){
                setcookie('id', $row['id'], time()+3600);
				setcookie('key', hash('sha256', $row['username']), time()+3600);}
            header("Location: index.php");
            exit;
        }} 
        $error = true;



}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN WEB</title>
</head>
<body>
    <h1>LOGIN Akun</h1>

    <?php if( isset($error) ) : ?>
	<p style="color: red; font-style: italic;">username / password salah</p>
<?php endif; ?>
<ul>
    <form action="" method="POST">
    <li><label for="username"> Username : </label>
    <input type="text" name="username" id="username" required placeholder="input username / email" autofocus>
    <li><label for="password"> Password :</label>
    <input type="password" name="password" id="password" required placeholder="silahkan isi password" size="40" autocomplete="off">
    <li><input type="checkbox" name="remember" id="remember">
    <label for="remember"> Remember me?</label></li>
    <li><button type="submit" name="submit"> Log in</button></li>
    </form>
</ul>
</body>
</html>