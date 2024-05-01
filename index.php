<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sweet heart</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" type="image/png" href="vendor/favicon.ico"/>

	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="vendor/fonts/font-awesome-4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="vendor/fonts/iconic/css/material-design-iconic-font.min.css">

<link rel="stylesheet" type="text/css" href="vendor/fonts/iconic/css/material-design-iconic-font.css">

	<link rel="stylesheet" type="text/css" href="vendor/main.css">
<style>
/*for website name animation*/
@keyframes zmdi-fade {
  0% {
  letter-spacing:8px;
   color:white;
  } 35% {
  letter-spacing:2px;color:white;
  }
}
/*for website name*/
.swht{
font-family: SourceSansPro-SemiBold;
 margin-top:15%; 
text-align:center;
 height:60px;
 width:70%; 
color:#999; 
animation: zmdi-fade 8s 1 linear;
}
  /*for little heart*/
@keyframes zmdi-wind {
  0% {
   top:10%;
   left:0%;
   font-size:8px;
   position: absolute;
   color:magenta;
  }
  20%{ top:3%; left:10%; }
  45%{ top:8%; left:24%; color:magenta; }
  50%{color:grey; }
  60%{ top:4%; left:40%; }
  70%{ top:12%; left:45%; }
  80%{ top:14%; left:43%; }
  90%{ top:15%; left:48%; }
  95%{ top:19%; left:44%; } 100% {
   left:45%;
   font-size:24px;
  position: absolute; 
  }
}
/*for little heart animation*/
.heart{
font-family: Material-Design-Iconic-Font;
animation: zmdi-wind 8s 1 linear;
}
</style>
</head>
<body> 
	<div class="container mt-3">
<!-- product/website name-->
<center><h4 class="swht">Sweet heart's<p style=" font-family: SourceSansPro-Regular; animation: zmdi-fade 8s 1 linear;">heartly welcome</p><span class="zmdi-favorite-outline heart"></span></h4></center><br>
		

<?php

//to create question to be shown in questions.php
//useful for only once at the beginning
$conn = new  mysqli("localhost", "id13739660_arunvignesh","7871567385_Arun","id13739660_sweet_heart");
//db created from phpmyadmin
if ($conn->connect_error) {
   die("<br>Connection failed: "  . $conn->connect_error);
}
if(isset($_POST['name'])){
$n=preg_replace('/[^A-z.\s]/', '', $_POST['name']);
$sql = "CREATE TABLE IF NOT EXISTS {$n} (id INT(4) NOT NULL AUTO_INCREMENT PRIMARY KEY, name VARCHAR(30) UNIQUE NOT NULL, a1 VARCHAR(255) NULL,a2 VARCHAR(255) NULL,a3 VARCHAR(255) NULL,a4 VARCHAR(255) NULL,a5 VARCHAR(255) NULL,a6 VARCHAR(255) NULL,a7 VARCHAR(255) NULL,a8 VARCHAR(255) NULL,a9 VARCHAR(255) NULL,a10 VARCHAR(255) NULL,a11 VARCHAR(255) NULL,a12 VARCHAR(255) NULL,a13 VARCHAR(255) NULL,a14 VARCHAR(255) NULL,a15 VARCHAR(255) NULL,a16 VARCHAR(255) NULL,a17 VARCHAR(255) NULL,a18 VARCHAR(255) NULL,a19 VARCHAR(255) NULL,a20 VARCHAR(255) NULL,a21 VARCHAR(255) NULL,a22 VARCHAR(255) NULL,a23 VARCHAR(255) NULL,a24 VARCHAR(255) NULL,a25 VARCHAR(255) NULL)";
if ($conn->query($sql) ===TRUE){
echo '<br><br><p>Successfully created ,save first link to view answers and copy second link - share to your friends</p>';
echo '<br><span class="row">
<input class="col-9 disabled" style="border: 0.5px solid grey;
border-radius:5px;" placeholder="Enter Name" value="https://selfanalysis.000webhostapp.com/answers.php?myself='.$n.'">
<span class="col-2"><a style="text-decoration:none;" href="answers.php?myself='.$n.'">View</a></span>
</span>	';
echo '<br><span class="row">
<input class="col-9 disabled" style="border: 0.5px solid grey;
border-radius:5px;" placeholder="Enter Name" value="https://selfanalysis.000webhostapp.com/index.php?for='.$n.'">
<span class="col-2"><a style="text-decoration:none;" href="index.php?for='.$n.'">Share</a></span>
</span>	';
}else{
   echo "\nError creating table: " . $conn->error;
}

}//post if
$conn->close();


if(isset($_GET["for"])){
echo '<form  method="post" class="login100-form validate-form" action="questions.php?for='.$_GET["for"].'" >
<div class="wrap-input100 validate-input my-5 " data-validate="Enter Name">
	<input class="input100" type="text" name="myself" placeholder="Name">
<span class="focus-input100"></span>
				</div>
				<div class="container-login100-form-btn mt-5 pt-2">
		<button id="submit" type="submit" value="submit" style="letter-spacing:4px;" class="login100-form-btn">ENTER</button>
	</div> </form> ';
 }elseif(!isset($_POST["name"])){
echo ' <form  method="POST" class="login100-form validate-form" action="index.php" >
<span class="col-10">
<div class="wrap-input100 validate-input" data-validate="Enter your Name">
<input class="input100" type="text" name="name" placeholder="Enter your Name" >
<span class="focus-input100"></span>
		</div></span>	
<div class="container-login100-form-btn">
	<button id="submit" type="submit" value="submit" class="login100-form-btn">Create</button>
</div>  </form> ';
 }
 
?>
			
    </div>
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>

	<script src="vendor/bootstrap/js/popper.js"></script>
			
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	
<script src="vendor/main.js"> </script>
<script>
//cant submit if length of name less than 3 or any special character except /[^]/ is injected
$("[type=submit]").click(function(e){
if($('input').val() !== $('input').val().trim().replace(/[^A-z.\s]/) | $('input').val().trim().length <4){
e.preventDefault();
}
});
</script>
</body>
<!-- --> 
<div  class="m-5 p-3 text-center" style=" font-size:10px; "><span class="zmdi-label-heart " style="font-family: Material-Design-Iconic-Font;"> </span>Talking to your best friend is sometimes all the therapy you need
</div> 
</html>
