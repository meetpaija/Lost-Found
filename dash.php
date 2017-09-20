<?php
session_start();
if(!isset($_SESSION['id'])){
	header('location:index.php');
}
	require 'connection.php';
	if(isset($_GET['msg'])){
		echo $_GET['msg'];
	}
    if(isset($_POST['add'])){
   	 try{
 		$name=$_POST['name'];
		$location=$_POST['location'];
		$date=$_POST['date'];
		$colour=$_POST['colour'];
		   $description=$_POST['description'];
		   $q="INSERT INTO data (name,location,date,colour,description) VALUES (:name,:location,:date,:colour,:description)";
		   $result=$conn->prepare($q);
		   $result->bindParam(':name',$name);
		   $result->bindParam(':location',$location);
		   $result->bindParam(':date',$date);
		   $result->bindParam(':colour',$colour);
		   $result->bindParam(':description',$description);
		   $result->execute();	
	    	}
		catch(PDOException $exc) {
	    		echo $exc->getMessage();
	    		exit();
		}
	}
	else if(isset($_POST['search'])){
		header('HTTP/1.1 307 Temporary Redirect');
		header('Location: displaysearch.php');
		/*try{
			$stmt = $conn->prepare("SELECT * FROM data");
			//$stmt->bindParam(':id', $_SESSION['id']);
			$stmt->execute();
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
			$rows = $stmt->rowCount();
			$i=0;
			while($rows>0){
				$i++;
				$r=$stmt->fetch();
				if($_POST['location']==$r['location'] && $_POST['name']==$r['name']){
					echo "(".$i.")Name of item: ".$r['name']."<br>";
					echo "(".$i.")Location where found: ".$r['location'];
				}
				$rows--;
			}
			
		}
		catch(PDOException $exc){
			echo $exc->getMessage();
	    		exit();
		}*/
	}
	else{
	}

?>




<html>
<head>

<link href="css/freelancer.css" rel="stylesheet">
<link href="css/lorenzodianni.css" rel="stylesheet">
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
    <title>Dashboard</title>
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
                <a class="navbar-brand" href="#page-top">Lost And Found System</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <?php if($_SESSION['id']==1){echo "<li class='page-scroll'><a href='database.php'>View all data</a></li>";}?>
                    <li class="page-scroll">
                        <a href="userinfo.php">User Info</a>
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
<section id="contact">
        <div class="container">
            <div class="row">
                <div clawss="col-lg-12 text-center">
                    <h2 style="text-align:center">Welcome <?php try{$stmt = $conn->prepare("SELECT * FROM login WHERE id=:id");$stmt->bindParam(':id', $_SESSION['id']);$stmt->execute();$stmt->setFetchMode(PDO::FETCH_ASSOC);$r=$stmt->fetch();echo $r['username'];}catch(PDOException $exc){echo $exc->getMessage();exit();}?></h2>
                    <hr class="star-primary">
                </div>
            </div>
<form  action='dash.php' method='post'>
<div class='row'>
                <div class='col-lg-8 col-lg-offset-2'>
                        <div class='row control-group'>
                        <form name='sentMessage' id='contactForm'>
                            <div class='form-group col-xs-12 floating-label-form-group controls'>
                                <label>Name</label>
                                <input type='text' class='form-control' placeholder='Name' id='name' name='name' required data-validation-required-message="Please enter item name">  
                                	<p class='help-block text-danger'></p>
                            </div>
                        </div>
<input class="radio-input" type="radio" id="radio1" name="radio-category" checked value="lost" onclick="display(this.value)" required/>
<label class="radio-label" for="radio1">Lost</label>
<input class="radio-input" type="radio" id="radio2" name="radio-category" value="found" onclick="display(this.value)" required/>
<label class="radio-label" for="radio2">Found</label>


    <!--Lost <input type="radio" name="type" value="lost" onclick="display(this.value)" required>&nbsp;
    Found <input type="radio" name="type" value="found" onclick="display(this.value)" required>-->

    <p id="para"></p>

</form>
<script>
    function display(type){
        if(type==="lost"){
            document.getElementById("para").innerHTML="<div class='row control-group'><div style='font-size:15px;' class='form-group col-xs-12 floating-label-form-group controls'><label>Location of loss</label><input type='text' class='form-control' placeholder='Location' id='name' name='location' required data-validation-required-message='Please enter location of loss.'><p class='help-block text-danger'></p></div></div><div class='row control-group'><div style='font-size:15px;' class='form-group col-xs-12 floating-label-form-group controls'><label>Colour</label><input type='text' class='form-control' placeholder='Colour' id='name' name='colour' required data-validation-required-message='Please enter colour of item'><p class='help-block text-danger'></p></div></div><div class='row control-group'><div style='font-size:15px;' class='form-group col-xs-12 floating-label-form-group controls'><label>Description</label><input type='text' class='form-control' placeholder='Description' id='name' name='description' required data-validation-required-message='Please enter description of found item.'><p class='help-block text-danger'></p></div></div><div class='row control-group'><div style='font-size:15px;' class='form-group col-xs-12 floating-label-form-group controls'><label>Date of loss</label><input type='date' class='form-control' placeholder='Date' id='name' required data-validation-required-message=''><p class='help-block text-danger'></p></div></div><div class='row'><div class='form-group col-xs-12'><input type='submit' name='search' value='Search' class='btn btn-success btn-lg'></div></div>" ;
        }
        else{
            document.getElementById("para").innerHTML="<div class='row control-group'><div style='font-size:15px;' class='form-group col-xs-12 floating-label-form-group controls'><label>Location of finding</label><input type='text' class='form-control' placeholder='Location' id='name' name='location' required data-validation-required-message='Please enter location of finding.'><p class='help-block text-danger'></p></div></div><div class='row control-group'><div style='font-size:15px;' class='form-group col-xs-12 floating-label-form-group controls'><label>Colour</label><input type='text' class='form-control' placeholder='Colour' id='name' name='colour' required data-validation-required-message='Please enter colour of item'><p class='help-block text-danger'></p></div></div><div class='row control-group'><div style='font-size:15px;' class='form-group col-xs-12 floating-label-form-group controls'><label>Description</label><input type='text' class='form-control' placeholder='Description' id='name' name='description' required data-validation-required-message='Please enter description of found item.'><p class='help-block text-danger'></p></div></div><div class='row control-group'><div style='font-size:15px;' class='form-group col-xs-12 floating-label-form-group controls'><label>Date of finding</label><input type='date' class='form-control' placeholder='Date' id='name' name='date' required data-validation-required-message=''><p class='help-block text-danger'></p></div></div><div class='row'><div class='form-group col-xs-12'><input type='submit' value='Add Item' name='add' class='btn btn-success btn-lg'></div></div>";
        }
    }
</script>

<!--<script>
    function display(type){
        if(type==="lost"){
            document.getElementById("para").innerHTML="Location of loss: <input type='text' name='location' value='location' ><br><br>Date of loss: <input type='date' name='date'><br><br><input type='submit' value='Search' required><a href='aaa.php' >" ;
        }
        else{
            document.getElementById("para").innerHTML="Location of finding: <input type='text' name='location' value='location' ><br><br>Date of finding: <input type='date' name='date'> <br><br> Color<input type='text' name='color'><br><br><input type='submit' value='Add Item' name='add' required>";
        }
    }
</script>-->

</body>
</html>
