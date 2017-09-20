<?php
session_start();
if(!isset($_SESSION['id'])){
	header('location:index.php');
}
$hostname="localhost";
$db="php";
$user ="root";
$pass="";

$conn = new PDO("mysql:host=$hostname;dbname=$db",$user,$pass);
$sql = "SELECT * FROM login where id=:id";
$stmt  = $conn->prepare($sql);
$stmt->bindParam(':id',$_SESSION['id']);
$stmt->execute();
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$r=$stmt->fetch();
echo $r['username'];
if(isset($_POST['Add Item'])){
    $hostname="localhost";
    $db="php";
    $user ="root";
    $pass="";

    try{
        $conn = new PDO("mysql:host=$hostname;dbname=$db",$user,$pass);
        $name=$_POST['name'];
        $location=$_POST['location'];
        $date=$_POST['date'];
        $color=$_POST['color'];
        $q="INSERT INTO data (name,location,date,color) VALUES (:name,:location,:date,:color)";
        $result=$conn->prepare($q);
        $result->bindParam(':name',$name);
        $result->bindParam(':location',$location);
        $result->bindParam(':date',$date);
        $result->bindParam(':color',$color);
        $result->execute();
    }
    catch(PDOException $exc) {
        echo $exc->getMessage();
        exit();
    }
}
?>


<html>
<head>
    <style>
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color:whitesmoke;
        }

        li {
            float: left;
            border-right:1px solid ;
        }

        li:last-child {
            border-right: none
        }

        li a {
            display: block;
            color: black;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        li a:hover:not(.active) {
            background-color: #4CAF50
        }

        .active {
            background-color: #4CAF50;
        }
    </style>
</head>
<body>

<ul>
    <li><a class="active" href="#home">Home</a></li>
    <li><a href="">WELCOME  <?php echo $r['username'];?> </a></li>

    <li style="float:right"><a href="">Logout<li>
    <li style="float:right"><a href="logput.php">About</a></li>
    <li style="float:right"><a href="">ChangeUserDetail</a></li>
</ul>
<center>
<form action="" method="post">
   Name of item: <input type="text" name="name" required><br><br>
   Lost <input type="radio" name="type" value="lost" onclick="display(this.value)" required>&nbsp;
      Found <input type="radio" name="type" value="found" onclick="display(this.value)" required>

    <p id="para"></p>

</form>
<script>
    function display(type){
        if(type==="lost"){
            document.getElementById("para").innerHTML="Location of loss: <input type='text' name='location' value='location' ><br><br>Date of loss: <input type='date' name='date'><br><br><input type='submit' value='Search' required><a href='aaa.php' >" ;
        }
        else{
            document.getElementById("para").innerHTML="Location of finding: <input type='text' name='location' value='location' ><br><br>Date of finding: <input type='date' name='date'> <br><br> Color<input type='text' name='color'><br><br><input type='submit' value='Add Item' required>";
        }
    }
</script>
</center>
</body>
</html>
