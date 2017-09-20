<?php
session_start();
if(!isset($_SESSION['id'])){
	header('location:index.php');
}
require 'connection.php';
try{
	if(isset($_POST['delete'])){
		/*$stmt = $conn->prepare("SELECT * FROM data");
		//$stmt->bindParam(':id', $_SESSION['id']);
		$stmt->execute();
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$rows = $stmt->rowCount();
		while($rows>0){
			$r=$stmt->fetch();
			$x=$r['name'];
			if(isset($_POST[$x])){
				$a=$_POST[$x];
				echo $a;
				$q="DELETE FROM data WHERE name=':name'";
				//$conn->exec($q);
				$stmt=$conn->prepare($q);
				$stmt->bindParam(':name',$a);
				$stmt->execute();
			}
			$rows--;
		}*/
		$stmt = $conn->prepare("SELECT * FROM data");
		//$stmt->bindParam(':id', $_SESSION['id']);
		$stmt->execute();
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$rows = $stmt->rowCount();
		$i=1;
		while(isset($_POST[$i]) && $i<=$rows && ($r=$stmt->fetch())){
			
			$a=$r['name'];
			$q="DELETE FROM data WHERE name=:name and location=:location and colour=:colour";
			//$conn->exec($q);
			$stmt=$conn->prepare($q);
			$stmt->bindParam(':name',$a);
			$stmt->bindParam(':location',$r['location']);
			$stmt->bindParam(':colour',$r['colour']);
			$stmt->execute();
			$i++;
		}
		$conn->exec("SET @count = 0;
UPDATE data SET id = @count:= @count + 1;
");
$conn->exec("ALTER TABLE data AUTO_INCREMENT = 1;");
		header('location:dash.php');
	}
}
catch(PDOException $exc){
	echo $exc->getMessage();
	exit();
}
?>
<html>
<head>

<link href="css/freelancer.css" rel="stylesheet">
<link href="css/materialize1.css" rel="stylesheet">

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
    <title>Search Results</title>
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
                <a class="navbar-brand" href="dash.php">Lost And Found System</a>
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
                        <a href="#about">About</a>
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
    <section id="contact">
        <div class="container">
            <div class="row">
                <div clawss="col-lg-12 text-center">
                    <h2 style="text-align:center">Search results</h2>
                    <hr class="star-primary">
                </div>
            </div>
</body>
</html>
<?php
            try{
			$stmt = $conn->prepare("SELECT * FROM data");
			//$stmt->bindParam(':id', $_SESSION['id']);
			$stmt->execute();
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
			$rows = $stmt->rowCount();
			$i=0;
			echo "<form action='displaysearch.php' method='post'>";
			while($rows>0){
				
				$r=$stmt->fetch();
				if($_POST['location']==$r['location'] && $_POST['name']==$r['name'] && $_POST['colour']==$r['colour']){
					$i++;
					echo "(".$i.")Name of item: ".$r['name']."<br>";
					echo "(".$i.")Location where found: ".$r['location']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
					echo "<input type='checkbox' name='".$i."' value='".$r['name']."' class='filled-in' id='filled-in-box'/><label for='filled-in-box'></label>";
					echo "<br>";
				}
				$rows--;
			}
			echo "<div class='row'><div class='form-group col-xs-12'><input type='submit' name='delete' value='Found' class='btn btn-success btn-lg'></div></div></form>";
			if($i==0){
				echo "No items found corresponding to your search criteria";
			}
		}
		catch(PDOException $exc){
			echo $exc->getMessage();
	    		exit();
		}
?>
