<?php
//to create question to be shown in questions.php
//useful for only once at the beginning
$conn = new  mysqli("localhost", "id13739660_arunvignesh","7871567385_Arun","id13739660_sweet_heart");
//db created from phpmyadmin
if ($conn->connect_error) {
   die("<br>Connection failed: "  . $conn->connect_error);
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
//table consists of columns id,name,30questions,hearts-likes for their answers,luv-likes for developer
$sql = "CREATE TABLE IF NOT EXISTS  questions (id INT(4) NOT NULL AUTO_INCREMENT PRIMARY KEY, name VARCHAR(30) UNIQUE NOT NULL, q1 VARCHAR(255) NULL,q2 VARCHAR(255) NULL,q3 VARCHAR(255) NULL,q4 VARCHAR(255) NULL,q5 VARCHAR(255) NULL,q6 VARCHAR(255) NULL,q7 VARCHAR(255) NULL,q8 VARCHAR(255) NULL,q9 VARCHAR(255) NULL,q10 VARCHAR(255) NULL,q11 VARCHAR(255) NULL,q12 VARCHAR(255) NULL,q13 VARCHAR(255) NULL,q14 VARCHAR(255) NULL,q15 VARCHAR(255) NULL,q16 VARCHAR(255) NULL,q17 VARCHAR(255) NULL,q18 VARCHAR(255) NULL,q19 VARCHAR(255) NULL,q20 VARCHAR(255) NULL,q21 VARCHAR(255) NULL,q22 VARCHAR(255) NULL,q23 VARCHAR(255) NULL,q24 VARCHAR(255) NULL,q25 VARCHAR(255) NULL)";
if ($conn->query($sql) ===FALSE) {
   echo "\nError creating table: " . $conn->error;
}

$sql= $conn->prepare("INSERT INTO questions (name,q1,q2,q3,q4,q5,q6,q7,q8,q9,q10,q11,q12,q13,q14,q15,q16,q17,q18,q19,q20,q21,q22,q23,q24,q25) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

//delete
/*
 $_POST['nm']="Arun";
$_POST['q1']="What did you think when you first met me ?";
$_POST['q2']="What was your first impression of me ?";
$_POST['q3']="Who is my celebrity crush ?";
$_POST['q4']="What time does I get up in the morning ?";
$_POST['q5']="What are three strengths/weaknesses of me ?";
$_POST['q6']="What kinds of things really make me laugh ?";
$_POST['q7']="What really makes me angry ?";
$_POST['q8']="What one thing I fear about ?";
$_POST['q9']="What's something that you find attractive in me ?";
$_POST['q10']="What movie character that closely resembles me ?";
$_POST['q11']="Your favourite thing about me.";
$_POST['q12']="What is my favorite song ?";
$_POST['q13']="What is my favorite movie ?";
$_POST['q14']="What is my favorite food ?";
$_POST['q15']="What I am addicted to ?";
$_POST['q16']="What is my eye color ?";
$_POST['q17']="What is my daily routine ?";
$_POST['q18']="Something I've never told to anyone before.";
$_POST['q19']="What can I talk about for hours that when I talk about it, I light up ?";
$_POST['q20']="Tell me a random fact about myself.";
$_POST['q21']="What's your favorite memory of us ?";
$_POST['q22']="What's one difference between us that you absolutely love ?";
$_POST['q23']="Describe me in 3 words.";
$_POST['q24']="What is my name in your phone ?";
$_POST['q25']="Do you hear my voice in this ?";
*/
//delete

$sql->bind_param("ssssssssssssssssssssssssss",$_POST['nm'],$_POST['q1'],$_POST['q2'],$_POST['q3'],$_POST['q4'],$_POST['q5'],$_POST['q6'],$_POST['q7'],$_POST['q8'],$_POST['q9'],$_POST['q10'],$_POST['q11'],$_POST['q12'],$_POST['q13'],$_POST['q14'],$_POST['q15'],$_POST['q16'],$_POST['q17'],$_POST['q18'],$_POST['q19'],$_POST['q20'],$_POST['q21'],$_POST['q22'],$_POST['q23'],$_POST['q24'],$_POST['q25']);
if($sql->execute()){
echo "Completed successfully";
}else{
echo "Something Went Wrong , Please Try Again/Later \n";
echo $sql->error;}
//thus the questions posted are inserted in first row
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Create | View</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="icon" type="image/png" href="vendor/favicon.ico"/>

	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="vendor/fonts/font-awesome-4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="vendor/fonts/iconic/css/material-design-iconic-font.min.css">

	<link rel="stylesheet" type="text/css" href="vendor/main.css">

</head>
<body>
	<div class="container mt-3">
			<form  method="POST" class="login100-form validate-form" action="for_admin.php" >
<!-- name in the first row of the db-->
<div class="wrap-input100 validate-input " data-validate="Enter question">
<input class="input100" type="text" name="nm" placeholder="name" value="Arun">
<span class="focus-input100"></span>
		</div>
<?php
//input for 30questions
for($i=1;$i<31;$i++){
//nameing ,the input as q1,q2,q3.. for posting
echo'<span class="col-10">
<div class="wrap-input100 validate-input" data-validate="Enter question">
<input class="input100" type="text" name="q'.$i.'" placeholder="Question'.$i.'" >
<span class="focus-input100"></span>
		</div></span>	';
}
?>
<div class="container-login100-form-btn">
					<button id="submit" type="submit" value="submit" class="login100-form-btn">Create</button>
				</div>
			</form>
    </div>

	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>

	<script src="vendor/bootstrap/js/popper.js"></script>
   
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

	<script src="vendor/main.js"></script>
	</body>
</html>