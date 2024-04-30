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
<center><h4 class="swht">Sweet heart's<p style=" font-family: SourceSansPro-Regular; animation: zmdi-fade 8s 1 linear;">heartly welcome</p><span class="zmdi-favorite-outline heart"></span></h4></center>
		<form  method="post" class="login100-form validate-form" action="questions.php" >
<!-- Get name and post to questions.php-->
	<div class="wrap-input100 validate-input my-5 " data-validate="Enter your Name">
	<input class="input100" type="text" name="myself" placeholder="Enter your Name">
<span class="focus-input100"></span>
				</div>
				<div class="container-login100-form-btn mt-5 pt-2">
		<button id="submit" type="submit" value="submit" style="letter-spacing:4px;" class="login100-form-btn">ENTER</button>
				</div>
			</form>
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
<!-- information -->
<div  class="m-5 p-3 text-center" style=" font-size:8px; "><span class="zmdi-label-heart " style="font-family: Material-Design-Iconic-Font;"> </span>Remember<p style="font-size:8px;">Answers can be seen by your friends</p>
<p style="font-size:8px;">Can view after Rating 50 and get source code after 100 </p>
</div>
</html>
