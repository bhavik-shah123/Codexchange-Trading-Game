<html>
<body>
<?php

function createPassword(String $user)
{
   $check="";
   $msg = hash("sha1",$user."22DEC2019");
   for($i = 0 ; $i <10 ; $i++)
   {
	   $cut_msg = substr($msg,$i,4);
	   $number = addition($cut_msg);
	   
	   if($i <= 4)
	   {
		$div = 26;
		$add = 97;
	   }else{
		   $div = 27;
		   $add = 64;
	   }
	   
	   $check = $check.chr(((encryption($number)%$div)+$add));
   }
   return $check;
}

function addition(String $a)
{	
	$sum = 0; 
	$a = str_split($a);
	foreach($a as $x)
	{
		$sum = $sum + ord($x);
	}
	
	return $sum;
}

function encryption(int $a)
{
	$a = ($a%431)* (9679%2999) ;
	$a = $a%199;
	return $a;
}

?>
</body>
</html>