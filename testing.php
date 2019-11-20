<?php

require 'send.php';
$user ="root";
$password = "";
$db = "exp1";
$conn = new mysqli("localhost",$user,$password,$db) or die("Internet Problem");
	
$pass = $_POST['password'];
$username = $_POST['username'];

$sql = "SELECT team_name FROM details WHERE team_name ="."'".$username."' ";
$res = mysqli_query($conn,$sql) or die("error");
if(mysqli_num_rows($res) == 0)
{    
	echo '<script> alert("User does not Exists")</script>';
	echo '<script>window.location.replace("ter.html");</script>';
}else{
    $correct = createPassword($username);
    if($correct == $pass)
    {
		$sql = "SELECT attendance FROM details WHERE team_name ="."'".$username."' ";
		$res = mysqli_query($conn,$sql) or die("error");
		$row = mysqli_fetch_row($res);
		if($row[0] == 0)
		{
        echo '<script> sessionStorage.setItem("user","'.$username.'") </script>';
		$sql = "UPDATE team_name SET attendance = 1 WHERE team_name ="."'".$username."' ";
        $res = mysqli_query($conn,$sql) or die("error");
		echo '<script type="text/JavaScript"> 
				alert("Welcome");
				window.open("landing.html",\'TheNewpop\',\'toolbar=1,location=1,directories=1,status=1,menubar=1,scrollbars=1,resizable=1\');
				self.close()				
			  </script>' ;
		}else{
			echo '<script> alert("Already Logined")</script>';
			echo '<script>window.location.replace("ter.html");</script>';
		}
    }else
    {
		echo '<script> alert("Wrong Password")</script>';
		echo '<script>window.location.replace("ter.html");</script>';
    }
    }
?>