<?php
include 'DBconnection.php';//استدعاء ملف الاتصال بقاعدة البيانات

session_start();

if(!isset($_SESSION['username'])){
    header("location:index.php");
    exit();
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
	background-color: #000000;
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

.card-title h3 > span{
	color: #848484;
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
	color: rgb(0, 0, 0);
}
.header{
	background-color:  #000000;
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
    padding-left: 50px;
    padding-right: 50px;
	
}
.logo img{
	position: absolute;
margin-left: 1150px;
height: 60px;
width: 60px;

}

.cc img{
	
position: absolute;
margin-top: 50px;

margin-left: 550px;
height: 150px;
width: 150px;
}


.card-body-startV{
	margin-left: 430px;

	text-decoration: none;
  display: inline-block;
  font-size: 16px;
}

.card-body-startV input{
	background-color: #c5560d;;
	color: #000;
	border: none;
	border-radius: 15px;
	width: 130px;
	height: 30px;
	margin-top: 270px;
	margin-left: 130px;
	font-size: 15px;
	border-radius: 50px;
	
}
.card-body-startV input:hover {
	background:linear-gradient(to bottom, #c5560d, #b46f2f 100%);
	background-color:blanchedalmond;
}
.card-body-startV input:active {
	position:relative;
	top:4px;
}

</style>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale:1.0">
	<title>Start the Video</title>

	
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
				<h3><i class="fa fa-user-circle-o" aria-hidden="true"></i> Start the Video <span id="action_title"></span></h3>
                
			</div>


			<div class="card-body">
				
				<div class="card-body-top">
					<div class="cc"><a href="#"> <img src="Video-Camera1.jpg"></a>
					<div id="pointer-btn"></div>
				</div>


				<div class="card-body-startV">
					
					<input type="submit" value="Start the Video" onClick="myFunction()" />  -->
					<script>
					  function myFunction() {
						window.location.href="http://127.0.0.1:5500/VideoStream.html";  
					  }
					</script>
				
				</div>



		
		
	</div>




			</div>
		</div>
	</div>

</body>
</html>