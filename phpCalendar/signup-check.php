<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['uname']) && isset($_POST['password'])
    && isset($_POST['name']) && isset($_POST['re_password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);

	$re_pass = validate($_POST['re_password']);
	$name = validate($_POST['name']);

	$user_data = 'uname='. $uname. '&name='. $name;


	if (empty($uname)) {
		header("Location: signup.php?error= Lütfen Kullanıcı Adı Giriniz&$user_data");
	    exit();
	}else if(empty($pass)){
        header("Location: signup.php?error=Lütfen Şifre Giriniz&$user_data");
	    exit();
	}
	else if(empty($re_pass)){
        header("Location: signup.php?error=Şifreyi Tekrar Giriniz&$user_data");
	    exit();
	}

	else if(empty($name)){
        header("Location: signup.php?error=Lütfen Adı Soyad Giriniz&$user_data");
	    exit();
	}

	else if($pass !== $re_pass){
        header("Location: signup.php?error=Şifreler Uyuşmuyor !&$user_data");
	    exit();
	}

	else{

        $pass = md5($pass);

	    $sql = "SELECT * FROM users WHERE user_name='$uname' ";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			header("Location: signup.php?error=Kullanıcı Adı Kullanılıyor&$user_data");
	        exit();
		}else {
           $sql2 = "INSERT INTO users(user_name, password, name) VALUES('$uname', '$pass', '$name')";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
           	// header("Location: signup.php?success=Hesabınız başarılı bir şekilde oluşturuldu");
			   header("Location: home.php");
	         exit();
           }else {
	           	header("Location: signup.php?error=Bilinmeyen hata&$user_data");
		        exit();
           }
		}
	}
	
}else{
	header("Location: signup.php");
	exit();
}