<?php
session_start();
require 'send.php';
$user ="root";
$password = "bhavik";
$db = "codexchange";
$conn = new mysqli("localhost",$user,$password,$db) or die("Internet Problem");
	
$pass = $_POST['password'];
$username = $_POST['username'];

$sql = "SELECT username FROM users WHERE username ="."'".$username."' ";
$res = mysqli_query($conn,$sql) or die("error");
if(mysqli_num_rows($res) == 0)
{    
	echo '<script> alert("User does not Exists")</script>';
	echo '<script>window.location.replace("index.html");</script>';
}else{
    $correct = createPassword($username);
    if($correct == $pass)
    {
		$res = mysqli_query($conn,$sql) or die("error");
		$row = mysqli_fetch_row($res);
		if($row[0] == 0)
		{
		echo '<script> sessionStorage.setItem("user","'.$username.'") </script>';
		$_SESSION['username']=$username;
        $res = mysqli_query($conn,$sql) or die("error");
		echo '<script type="text/JavaScript"> 
				alert("Welcome");
				window.open("landing.html",\'TheNewpop\',\'toolbar=1,location=1,directories=1,status=1,menubar=1,scrollbars=1,resizable=1\');
				self.close()				
			  </script>' ;
		}else{
			echo '<script> alert("Already Logined")</script>';
			echo '<script>window.location.replace("landing.html");</script>';
		}
    }else
    {
		echo '<script> alert("Wrong Password")</script>';
		echo '<script>window.location.replace("index.html");</script>';
    }
    }
?>