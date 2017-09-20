<?php
session_start();

if(isset($_GET['msg'])){
	echo $_GET['msg'];
}
require 'connection.php';
$username=$_POST['username'];
$q="select * from login where username=:username";
$stmt=$conn->prepare($q);
$stmt->bindParam(':username',$username);
$stmt->execute();
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$r=$stmt->fetch();
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
    <title>Change Password</title>
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
                <a class="navbar-brand" href="#page-top">change password</a>
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
<body style="text-align=center">
<br>
<br>
<br>
<br><br>
<form action="newpassword.php" method="post">
<p><div class='row'>
                <div class='col-lg-8 col-lg-offset-2'>
                    <form name='sentMessage' id='contactForm' novalidate>

<div class='row'>
                <div class='col-lg-8 col-lg-offset-2'>
                    <form name='sentMessage' id='contactForm' novalidate>
                        <div class='row control-group'>
                            <div class='form-group col-xs-12 floating-label-form-group controls'>
                                <label></label><?php 
echo "Question: ".$r['question']."<br>";
?>						
                               	<p class='help-block text-danger'></p>
                            </div>
						</div>
					
					<div class='row control-group'>
                            <div class='form-group col-xs-12 floating-label-form-group controls'>
                          

						<div class='row control-group'>
                            <div class='form-group col-xs-12 floating-label-form-group controls'>
                                <label>Answer</label>
                                <input type='text' class='form-control' placeholder='Answer' name='answer' id='name' required data-validation-required-message='Please Enter Answer.'>  
                                	<p class='help-block text-danger'></p>
                            </div>
						</div>
				
						
					<div class='row'>
							<div class='form-group col-xs-12'>
								<button type='submit' name='change' class='btn btn-success btn-lg'>
								Submit</button>
							</div>
						</div>
	</div>
	</div>					
				
<input type='hidden' name='username' value="<?php echo $_POST['username'];?>">
</form>
</body>
</html>
