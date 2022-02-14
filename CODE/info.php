<?php
include 'DBconnection.php';

session_start();

if(!isset($_SESSION['username'])){
    header("location:index.php");
    exit();
}
$id =$_GET['id']; 
$name=$_GET['name'];
$gender=$_GET['ge'];
$age=$_GET['age'];	  
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
	background-color: #000000;
}

.card{
	width: 700px;
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

 

.content-table {
  border-collapse: collapse;
  background: #323535;
  margin: 25px 0;
  font-size: 0.9em;
  min-width: 400px;
  border-radius: 5px 5px 0 0;
  overflow: hidden;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);

  border-bottom: 1px solid #1a1616;

  padding: 5px 15px;
	font-size: 15px;
	cursor: pointer;
	letter-spacing: 1px;
	margin-top: 60px;
	margin-bottom: 25px;
}

.content-table thead tr {
  background-color: #0d0e0e;
  color: #c5560d;
  text-align: left;
  font-weight: bold;
}

.content-table th,
.content-table td {
  padding: 12px 15px;
}

.content-table tbody tr {
  border-bottom: 3px solid #0f0e0e;
}



.content-table tbody tr:last-of-type {
  border-bottom: 3px solid #110f0f;
}



</style>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale:1.0">
	<title>Login or CreateProfile</title>

	

</head>
<body>
	
	   
    <div class="header">


		
        <div class="container">
        <div class="nevbar">
			<div class="logo"><a href="#"> <img src="logo.jpg"></a>
			</div>
            <nav>
                <ul>
                   
                        <li><a href="index.php" >Home</a> </li>
                        <li><a href="Start.php" >Start</a> </li>
                        <li><a href="Persons.php" >Persons</a> </li>
                        <li><a href="Videos.html" >Videos</a> </li>
                       
         
                     
    
                </ul>
            </nav>
          
        </div>
        </div>
        
    </div>
	<div class="main">
		<div class="card">


			<div class="card-title">
				<h3><i class="fa fa-user-circle-o" aria-hidden="true"></i> Persone information <span id="action_title"></span></h3>
			</div>


			<div class="card-body">
				<center>
					<table class="content-table">
						<thead>
						  <tr>
							<th>Name</th>
							<th>Age</th>
							<th>ID Number</th>
							<th>Gender</th>
						  </tr>
						</thead>
						<tbody>
						  
							
						  <tr class="active-row">
							<td><?php echo $name ?></td>
							<td><?php echo $age ?></td>
							<td><?php echo $id ?></td>
							<td><?php echo $gender ?></td>
						  </tr>
						  <tr>

						</tbody>
					  </table>
					
				</div>
			</center>

				


			</div>
		</div>
	</div>

</body>
</html>