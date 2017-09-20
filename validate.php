<?php
if (isset($_POST['username']) && isset($_POST['password'])) {
    require 'connection.php';
    $username = $_POST['username'];
    $password = $_POST['password'];
    $stmt = $conn->prepare("SELECT * FROM login WHERE username=(:username) and password=(:password)");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
    //check for duplicate usernames 
    // set the resulting array to associative
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $rows = $stmt->rowCount();
    if ($rows > 0) {
    		$r=$stmt->fetch();
        	session_start();
       	$_SESSION['id']=$r['id'];
        	header('location:dash.php');
    } else {
        header('location:login.php?msg=Wrong Credentials');
    }
}

