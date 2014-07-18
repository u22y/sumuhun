<?php

function checkpass() {
	$servername="localhost";
	$username="root";
	$password="";
	$conn=  mysql_connect($servername,$username)or die(mysql_error());
	mysql_select_db("sumuhun",$conn);

	if (isset($_GET['userlogin']) && isset($_GET['password'])) {
		$sql="select * from users where username='$_GET[userlogin]' and password='$_GET[password]'";
		$result=mysql_query($sql,$conn) or die(mysql_error());
		return  mysql_num_rows($result);	
	}
}

function loginform() {
	print "please enter your login information to proceed with our site";
	print ("<table border='2'><tr><td>username</td><td><input type='text' name='userlogin' size'20'></td></tr><tr><td>password</td><td><input type='password' name='password' size'20'></td></tr></table>");
	print "<input type='submit' >";	
	print "<h3><a href='registerform.html'>register now!</a></h3>";	
}

function print_secure_content() {
	print("<b><h1>hi mr.$_SESSION[user]</h1>");
	print "<br><h2>Go To HOME</h2><br><a href='indexx.html'>HOME</a><br>";	
	header('Location: indexx.html' );}
	
session_start(); 
if (isset($_SESSION['logging']) && (isset($_SESSION['logged']))) {
	print_secure_content();
} else {
    if (!$_SESSION['logging']) {  
		$_SESSION['logging']=true;
		loginform();
    } else if($_SESSION['logging']) {
		$number_of_rows=checkpass();
        if($number_of_rows==1) {	
			$_SESSION['user']=$_GET['userlogin'];
	        $_SESSION['logged']=true;
	        print"<h1>you have logged in successfully</h1>";
	        print_secure_content();
		} else {
			print "wrong password or username, please try again";	
			loginform();
        }
	}
}
          
header('Location: indexx.html' );
?>
