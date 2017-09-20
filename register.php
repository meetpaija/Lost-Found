<?php
session_start();
if(isset($_SESSION['id'])){
	header('location:dash.php');
}
if(isset($_GET['msg'])){
    echo $_GET['msg'];
}
if(isset($_POST['add'])) {
    try {

        require 'connection.php';
        $username = $_POST['username'];
        $stmt = $conn->prepare("SELECT * FROM login");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $c=1;
        while($r=$stmt->fetch()){
        	if($r['username']==$username){
        		echo "<script>alert('Username already exists');</script>";
        		$c=0;
        	}
        }
        if($c==1){
        $password = $_POST['password'];
        $email = $_POST['email'];
        $number = $_POST['number'];
        $question = $_POST['question'];
        $answer = $_POST['answer'];
        $q = "INSERT INTO login (username,password,email,number,question,answer) VALUES (:username,:password,:email,:number,:question,:answer);";
        $result = $conn->prepare($q);
        $result->bindParam(':username', $username);
        $result->bindParam(':password', $password);
        $result->bindParam(':email', $email);
        $result->bindParam(':number', $number);
        $result->bindParam(':question', $question);
        $result->bindParam(':answer', $answer);
        $result->execute();
        }
    } catch (PDOException $exc) {
        echo $exc->getMessage();
        exit();
    }
}
?>
<html>
<head>
<link href="css/freelancer.css" rel="stylesheet">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/classie.js"></script>
    <script src="js/cbpAnimatedHeader.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/freelancer.js"></script>
    <title>Register</title>
     <body id="page-top" class="index">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#page-top">Register</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                        <a href="aboutus.php">About</a>
                    </li>
                    <li class="page-scroll">
                        <a href="login.php">Login</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav><br></br>
</head>
<body>
<h1>Register</h1>
<form action="" method="post">
			
	<p><div class='row'>
                <div class='col-lg-8 col-lg-offset-2'>
                    <form name='sentMessage' id='contactForm' novalidate>
                        <div class='row control-group'>
                            <div class='form-group col-xs-12 floating-label-form-group controls'>
                                <label>Username</label>
                                <input type='text' class='form-control' placeholder='Username' name='username' id='name' required data-validation-required-message='Please Enter appropriat Username.'>  
                                	<p class='help-block text-danger'></p>
                            </div>
						</div>
					
						<div class='row control-group'>
                            <div class='form-group col-xs-12 floating-label-form-group controls'>
                                <label>Password</label>
                                <input type='Password' class='form-control' placeholder='Password' name='password' id='name' required data-validation-required-message='Please Enter Password.'>  
                                	<p class='help-block text-danger'></p>
                            </div>
						</div>
						
						
						<div class='row control-group'>
                            <div class='form-group col-xs-12 floating-label-form-group controls'>
                                <label>Email</label>
                                <input type='Email' class='form-control' placeholder='Email' name='email' id='name' required data-validation-required-message='Please Enter Email.'>  
                                	<p class='help-block text-danger'></p>
                            </div>
						</div>
						<div class='row control-group'>
                            <div class='form-group col-xs-12 floating-label-form-group controls'>
                                <label>ContactNo</label>
                                <input type='text' class='form-control' placeholder='ContactNo' name='number' id='name' required data-validation-required-message='Please Enter ContactNo.'>  
                                	<p class='help-block text-danger'></p>
                            </div>
						</div>
						
						<div class='row control-group'>
                            <div class='form-group col-xs-12 floating-label-form-group controls'>
                                <label></label>
                                <input type='text' class='form-control' placeholder='Question' id='name' required readonly data-validation-required-message='Please select security question.'>  
                                	<p class='help-block text-danger'></p>
                            
									<select id="question" name='question' class='form-control' onchange="change(this.value)" required placeholder='Security Question' required data-validation-required-message="Please Enter Security Question.">
										<option>Street where you grew up</option>
										<option>Name of first pet</option>
										<option>Your mother's maiden name</option>
										<option value="custom">Custom</option>
										<option id="customvalue" value="cvalue"></option>
									</select>
								<br>
                                 
									<p class='help-block text-danger'></p>
                            </div>
						</div>
						<div class='row control-group'>
                            <div class='form-group col-xs-12 floating-label-form-group controls'>
                                <label>Answer</label>
                                <input type='text' class='form-control' placeholder='Answer' name='answer' id='name' required data-validation-required-message="Please Enter Answer.">  
                                	<p class='help-block text-danger'></p>
                            </div>
						</div>
						
						<div class='row'>
							<div class='form-group col-xs-12'>
								<button type='submit' name='add' class='btn btn-success btn-lg'>
								Submit</button>
							</div>
						</div>
				</div>
		</div>		
    </p>
	
	
    <script>
    function change(value){
    if(value==="custom"){
    		var que=prompt("Please enter custom question","");
    		document.getElementById("customvalue").innerHTML=""+que;
    		document.getElementById("customvalue").value=""+que;
    		document.getElementById("question").options[4].selected=true;
    }
    return;
    //else if(){
    	//	document.getElementById("customvalue").innerHTML=" ";
    //}	
    }
    </script>
</form>
</body>
</html>
