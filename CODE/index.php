<?php
include 'DBconnection.php';

session_start();


if(isset($_POST['create'])) { 
    
    $name=$_POST['name'];
    $email=$_POST['email'];
    $pass=$_POST['password'];

        
        $query1 = "SELECT * FROM investigatoruser WHERE email='$email'";
        $statement1 = $conn->prepare($query1);
        $statement1->execute();
        
        if($statement1->rowCount()){
        
        echo  " <script type=\"text/javascript\"> alert('Email already exists')</script>"; 
        }
        else { 
            $query = "INSERT INTO investigatoruser(username,email,password) VALUES  ('$name','$email','$pass')";
        $statement = $conn->prepare($query);
        $statement->execute();
        echo  " <script type=\"text/javascript\"> alert('Account successfully created')</script>";
        }
	}

	
	elseif(isset($_POST['login'])){
    
		$loginEmail=$_POST['loginEmail'];
		$loginPassw=$_POST['loginPassw'];
		
		$query = "SELECT * FROM investigatoruser WHERE email='$loginEmail' AND password='$loginPassw'";
	   
		$statement = $conn->prepare($query);
		$statement->execute();
	   
		if($statement->rowCount()){
			 
			foreach($statement as  $r){
				$id=$r['id'];
		   
			}
			$_SESSION['username']=$id;
	 
		}

		else{
			echo  " <script type=\"text/javascript\"> alert('Please verify that your password or email is correct')</script>";  
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

.card-body-top{
	width: 100%;
	position: relative;
	border-bottom: 1px solid #262626;
}

.card-body-top > .btn{
	border: 0;
	background-color: transparent;
	color: #848484;
	font-size: 16px;
	letter-spacing: 1px;
	font-weight: 500;
	width: 180px;
	padding: 20px 0;
}

#login{
	color: #c5560d;;
}

#CreateProfile{
	color: #848484;
}
:active.btn{
	color: #c5560d;
	
}

#pointer-btn{
	position: absolute;
	bottom:-1px;
	left: 30px;
	width: 120px;
	height: 2px;
	background-color: #c5560d;
	transition: 0.1s all ease;
}



.card-body-login{
	width: 100%;
	padding: 15px 20px;
	position: relative;
}

.card-body-login > #login-form{
	position: absolute;
	top: 30px;
	left: 25px;
	text-align: center;
	transition: 0.5s all ease;
}

.card-body-login > #CreateProfile-form{
	position: absolute;
	top: 20px;
	left: 450px;
	text-align: center;
	transition: 0.5s all ease;
}

.input-form{
	border: none;
	background-color: transparent;
	color: #fff;
	border-bottom: 1px solid #c5560d;;
	width: 350px;
	padding: 15px 0px;
	font-size: 15px;
	letter-spacing: 1px;
	outline: none;
}

.submit-form{
	background-color: #c5560d;;
	color: #000;
	border: none;
	padding: 10px 25px;
	font-size: 15px;
	cursor: pointer;
	
	letter-spacing: 1px;
	border-radius: 50px;
	text-decoration: none;
  display: inline-block;
  font-size: 16px;
	
	
}
.submit-form input:hover {
	background:linear-gradient(to bottom, #c5560d, #b46f2f 100%);
	background-color:blanchedalmond;
}
.submit-form input:active {
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
</style>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale:1.0">
	<title>Login or CreateProfile</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
	<div class="logo"><a href="#"> <img src="logo.jpg"></a>
	</div>
	   
    <div class="header">


		
        <div class="container">
        <div class="nevbar">
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
				<h3><i class="fa fa-user-circle-o" aria-hidden="true"></i> User <span id="action_title">Login</span></h3>
			</div>
			<div class="card-body">
				<div class="card-body-top">
					<button id="login" class="btn" name="login" onclick="login()">login</button>
					<button id="CreateProfile" class="btn" name="CreateProfile" onclick="CreateProfile()">CreateProfile</button>
					<div id="pointer-btn"></div>
				</div>
				<div class="card-body-login">
					<form action="" method="post" id="login-form">
						<input class="input-form" type="email" name="loginEmail" placeholder="Enter your email" required><br><br>
						<input class="input-form" type="password" name="loginPassw" placeholder="Enter your password" required><br><br><br>
						<input class="submit-form" type="submit" value="Login" name="login" >
					</form>
					<form action="" method="post" id="CreateProfile-form">
						<input class="input-form" type="text" name="name" placeholder="Enter your full name" required><br><br>
						<input class="input-form" type="email" name="email" placeholder="Enter your email" required><br><br>
						<input class="input-form" type="password" name="password" placeholder="Enter your password" required pattern="(?=.*\d{7})(?=.*[a-z]{6})(?=.*[A-Z]{5}).{18,}"
						 title="Passwords must contain at least 18 characters, including 5 uppercase, 6 lowercase letters and 7 numbers."><br><br>
						<input class="submit-form" type="submit" value="Create" name="create">
					</form>
				</div>
			</div>
		</div>
	</div>

	<script>
		var x = document.getElementById("login-form");
		var y = document.getElementById("CreateProfile-form");
		var z = document.getElementById("pointer-btn");
		var l = document.getElementById("login");
		var r = document.getElementById("CreateProfile");
		var ac = document.getElementById("action_title");

		function CreateProfile(){
			x.style.left = "-450px";
			y.style.left = "25px";
			z.style.left = "215px";
			l.style.color = "#848484";
			r.style.color = "#c5560d";
			ac.textContent = "CreateProfile";
		}

		function login(){
			x.style.left = "25px";
			y.style.left = "450px";
			z.style.left = "30px";
			l.style.color = "#c5560d";
			r.style.color = "#848484";
			ac.textContent = "Login";
		}		
	</script>
</body>
</html>