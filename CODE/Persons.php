<?php
include 'DBconnection.php';

session_start();
	
if(!isset($_SESSION['username'])){
    header("location:index.php");
    exit();
}

if(isset($_POST['search'])) { 
    
    $personID=$_POST['personID'];
	$query1 = "SELECT * FROM accused WHERE ID='$personID'";
	$statement1 = $conn->prepare($query1);
	$statement1->execute();
	
	if($statement1->rowCount()){
			 
		foreach($statement1 as  $r){
			$id=$r['ID'];
			$name=$r['name'];
			$gender=$r['gender'];
			$age=$r['age'];	   
		}
		header("location:info.php?id=$id & name=$name & age=$age & ge=$gender");
	}
	else {
		echo  " <script type=\"text/javascript\"> alert('not found')</script>";  
	}
}
?>

<!DOCTYPE html>
<style>
	*{
	margin: 0;
	padding: 0;
}


body{
	font-family: sans-serif;
}

.clear{
	clear: both;
}

.main{
	width: 100%;
	height: 100vh;
	background-color: #000000
}

.card{
	width: 400px;
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%,-50%);
}

.card-title{
	width: 100%;
}

.card-title h3{
	color: #c5560d;;
	text-align: center;
	padding: 20px 0;
	font-weight: 500;
}



.card-body{


	background-color: #121212;
	padding: 10px 0px;
	border-radius: 5px;
	width: 100%;
	height: 350px;
	overflow: hidden;
	
}



.card-body-top input{
	background-color: rgb(233, 233, 233);
	text-align: center;
	border: none;
	padding: 5px 15px;
	font-size: 15px;
	cursor: pointer;
	letter-spacing: 1px;
	margin-top: 60px;
	margin-bottom: 25px;
	
}
	

.card-body-ID{
	margin-top: 60px;
	margin-bottom: 25px;
	text-decoration: none;
  display: inline-block;
  font-size: 16px;
	
	
}

.card-body-ID input{
	background-color: #c5560d;;
	color: #000;
	border: none;
	padding: 10px 25px;
	font-size: 15px;
	cursor: pointer;
	letter-spacing: 1px;
	border-radius: 50px;
	
}
.card-body-ID input:hover {
	background:linear-gradient(to bottom, #c5560d, #b46f2f 100%);
	background-color:blanchedalmond;
}
.card-body-ID input:active {
	position:relative;
	top:4px;
}

	


	
	



.nevbar{
    display: flex;
    align-items: center;
    padding: 20px;
	color: #000;
}
.header{
	background-color:  #0A0A0A;
}

nav{
flex: 1 ;
text-align: left;
}
nav ul{
    display: inline-block;
    list-style-type: none;

}

nav ul li{
    display: inline-block;
    margin-right: 20px;
}
a{
    text-decoration:none ;
    color:#c5560d;;
}
p{
    color:#c5560d;;
    margin-bottom: 30px;
}

.container{
    max-width: 1300px;
    margin: auto;
    padding-left: 25px;
    padding-right: 25px;
	
}
.logo img{
position: absolute;
margin-left: 1150px;
height: 60px;
width: 60px;

}
.card-body-top label {
	color: #c5560d;
}

</style>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale:1.0">
	<title>Persone ID</title>


</head>

<body>
	
	   
    <div class="header">


		
        <div class="container">
        <div class="nevbar">
			<div class="logo"><a href="#"> <img src="logo.jpg"></a></div>
            <nav>
                <ul>
                   
                        <li><a href="index.php" >Home</a> </li>
                        <li><a href="Start.php" >Start</a> </li>
                        <li><a href="#" >Persons</a> </li>
                        <li><a href="Videos.html" >Videos</a> </li>
                       
         
                     
    
                </ul>
            </nav>
          
        </div>
        </div>
       
		



    </div>
	<div class="main">
		<div class="card">

			
			<div class="card-title">
				<h3><i class="fa fa-user-circle-o" aria-hidden="true"></i> Insert the person ID <span id="action_title"></span></h3>
			</div>
		
				

			<div class="card-body">
				<center>
		

				<form action="" method="post">
					<div>
				<div class="card-body-top">
					

						<label for="id" >Person ID:</label>
						<input type="text" id="id" name="personID" placeholder="Enter ID" required >
				
				</div>

	

				<div class="card-body-ID">

						<a href="info.html"><input type="submit" name="search" value="search" ></a>	

			
			</div>
			</center>
		

			
		
		
		</div>

		
		</div>
	</div>





</body>
</html>