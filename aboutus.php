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
    <title>About</title>
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
                <a class="navbar-brand" href="#page-top">About</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <?php session_start();if(isset($_SESSION['id'])){echo "<li class='page-scroll'><a href='dash.php'>Back to dashboard</a></li><li class='page-scroll'><a href='userinfo.php'>User info</a></li><li class='page-scroll'><a href='logout.php'>Logout</a></li>";}else{echo "<li class='page-scroll'><a href='index.php'>Login/Register</a></li>";}?>
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
                                <label></label><h3>Made by:</h3><br>
									<h4>1)&nbsp;MEET&nbsp;ODEDRA&nbsp;&nbsp;&nbsp;&nbsp;CE-082  <br></h4>
									<h4>2)&nbsp;MEET&nbsp;PAIJA&nbsp;&nbsp;&nbsp;&nbsp;CE-083  <br></h4>
									<h4>3)&nbsp;JAIMIN&nbsp;PANDYA&nbsp;&nbsp;&nbsp;&nbsp;CE-084  <br></h4>
									<h4>4)&nbsp;MEET&nbsp;PARIKH&nbsp;&nbsp;&nbsp;&nbsp;CE-085  <br></h4>								
                                	<p class='help-block text-danger'></p>
                            </div>
						</div>
						<div class='row control-group'>
                            <div class='form-group col-xs-12 floating-label-form-group controls'>
                                <label>credits</label>
								<h3>credits</h3><br>
								   <h4>Freelancer&nbsp;(Bootstrap)&nbsp;-&nbsp;Main&nbsp;Theme<br></h4>
								   <h4>Materialize&nbsp;(Checkbox&nbsp;and&nbsp;table)</h4>
								   <h4>Radio&nbsp;Button&nbsp;CSS&nbsp;by&nbsp;lorenzodianni</h4>
                                	<p class='help-block text-danger'></p>
                            </div>
						</div>

</body>
</html>
