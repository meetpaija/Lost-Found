<?php

//session_start();

//if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')) {
//
  //  header ("Location: login.php?msg=you need to login");
//}

require_once 'connection.php';
$hostname="localhost";
$db="php";
$user ="root";
$pass="";
try {
    $conn = new PDO("mysql:host=$hostname;dbname=$db", $username, $password);

    $sql = 'SELECT * FROM data ';

    $q = $conn->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);

} catch (PDOException $pe) {
    die("Could not connect to the database $dbname :" . $pe->getMessage());
}
?>
<!DOCTYPE html>
<html>
<head>
<link href="css/freelancer.css" rel="stylesheet">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/materialize1.css" rel="stylesheet">
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
    <title>Database</title>
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
                <a class="navbar-brand" href="#page-top">All items in database</a>
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
                        <a href="userinfo.php">User Info</a>
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
<br><br><br><br><br>
<body style="text-align:middle" >
<div id="container">
    
    <table  class="stripped"  align="center">
        <thead>
        <tr>
            <th>Name</th>
            <th>Location</th>
            <th>Date</th>
            <th>Color</th>
        </tr>
        </thead>
        <tbody>
        <?php while ($r = $q->fetch()): ?>
            <tr>
                <td><?php echo htmlspecialchars($r['name'])?></td>
                <td><?php echo htmlspecialchars($r['location']); ?></td>
                <td><?php echo htmlspecialchars($r['date']); ?></td>
                <td><?php echo htmlspecialchars($r['colour']); ?></td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
	
</body>
</div>
</html>
