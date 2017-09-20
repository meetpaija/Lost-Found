<?php

session_start();
if(!isset($_SESSION['id'])){
	header('location:index.php');
}
require_once 'connection.php';
$hostname="localhost";
$db="php";
$user ="root";
$pass="";
try {
    $conn = new PDO("mysql:host=$hostname;dbname=$db", $username, $password);
    $x=$_SESSION['id'];
    $sql = 'SELECT * FROM login where id=:id';
    $q = $conn->prepare($sql);
    $q->bindParam(':id',$x);
    $q->execute();
} catch (PDOException $pe) {
    die("Could not connect to the database $dbname :" . $pe->getMessage());
}
?>
<!DOCTYPE html>
<html>
<head>
    <link href="css/freelancer.css" rel="stylesheet">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/materialize/css/materialize.css" rel="stylesheet">
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
    <title>User Info</title>
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
                <a class="navbar-brand" href="#page-top">INFO</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                        <a href="dash.php">Back to dashboard</a>
                    </li>
                    <li class="page-scroll">
                        <a href="aboutus.php">About</a>
                    </li>
                    <li class="page-scroll">
                        <a href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav><br></br>
</head>
<body>
<br>
<br>
<br>
<br>
<br>
<div class='row'>
                <div class='col-lg-8 col-lg-offset-2'>
                    <form name='sentMessage' id='contactForm' novalidate>
                        <div class='row control-group'>
                            <div class='form-group col-xs-12 floating-label-form-group controls'>
                                <label>Info</label>
                                


        <?php $q->setFetchMode(PDO::FETCH_ASSOC);  $r = $q->fetch(); ?>
            
            <h4>   Username : <?php echo ($r['username']);?></h4>
            
            <h4>   Email:     <?php echo ($r['email']); ?></h4>
            <h4>   Number:    <?php echo ($r['number']); ?></h4>
		  <h4>   Question : <?php echo ($r['question']); ?></h4>
		  <h4>   Answer:   <?php echo ($r['answer']); ?>	</h4>								
                                	<p class='help-block text-danger'></p>
                            </div>
						</div>
    
</body>
</div>
</html>
