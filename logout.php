<?php
session_start();
if(!isset($_SESSION['id'])){
	header('location:index.php');
}
session_unset();
header('location:index.php?msg=Successfully logged out');
?>
