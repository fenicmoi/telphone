<?php

include "./header.php";
session_start(); 
$u_id = $_SESSION['u_user'];

if(!$_SESSION['u_user']){
//	echo "<script> window.location.replace('../index.php')</script>";
echo "มาตรงนี้";
}else{ 

     $u_id = $_SESSION['u_user'];
	 $dep_id = $_SESSION['dep_id'];
	 
	 include ("../code/show_dep_no_minis.php");
	 include './footer.php';
}
?>