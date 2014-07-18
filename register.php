<?php
 session_start();session_destroy();
 session_start();
if($_GET["regusername"] && $_GET["regemail"] && $_GET["regnama"]&& $_GET["regalamat"]&& $_GET["regtelepon"]&& $_GET["regpass1"] && $_GET["regpass2"] )
{
	if($_GET["regpass1"]==$_GET["regpass2"])
	{
	$servername="localhost";
    $username="root";
    $password="root";
    $conn=  mysql_connect($servername,$username)or die(mysql_error());
    mysql_select_db("sumuhun",$conn);
    $sql="insert into users (username,password,email,nama,alamat,telepon)
	values('$_GET[regusername]','$_GET[regpass1]','$_GET[regemail]','$_GET[regnama]','$_GET[regalamat]','$_GET[regtelepon]')";
    $result=mysql_query($sql,$conn) or die(mysql_error());		
    print "<h1>you have registered sucessfully</h1>";
   
    print "<a href='login.html'>go to login page</a>";
	header('Location: login.html' );
	}
	else print "passwords doesnt match";
}
else print"invalid input data";

?>