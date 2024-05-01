<?php
//to create question to be shown in questions.php
//useful for only once at the beginning
$conn = new  mysqli("localhost", "id13739660_arunvignesh","7871567385_Arun","id13739660_sweet_heart");
//db created from phpmyadmin
if ($conn->connect_error) {
   die("<br>Connection failed: "  . $conn->connect_error);
}
if($_SERVER["REQUEST_METHOD"] == "GET"){
//to show full details
$sql = "SELECT * FROM together";
$result = $conn->query($sql);
if ($result ===FALSE) {
 echo "<br>Select-Error : " .$conn->error;
  }
if ($result->num_rows > 0) {
echo '<table class="table table-striped table-responsible table-hover ">
<thead class="thead">
<tr>
<th>ID</th>
<th>Name</th>';
for($i=1;$i<31;$i++) {
echo'<th>q'.$i.'</th>';
}
echo'</thead>
</tr>
<tbody>';
while($row = $result->fetch_array()){
echo '<tr>
<td>'.$row[0].'</td>';
for($i=1;$i<52;$i++) {
echo' <td>'.$row[$i].'</td>' ;
}
echo'</tr>';
}
echo '</tbody></table><br>'; 
}
//to show hearts of all
$sql = "SELECT name,hearts,luv FROM together";
$result = $conn->query($sql);
if ($result ===FALSE) {
 echo "<br>Select-Error : " .$conn->error;
  }
if ($result->num_rows > 0) {
echo '<table class="table table-sm table-striped table-responsible">
<thead>
<tr>
<th>Name</th>
<th>hearts</th>
<th>luv</th>
</thead>
</tr>
<tbody>';
while($row = $result->fetch_assoc()){
echo '<tr><td>'.$row["name"].'</td> <td> '.$row["hearts"].'</td> <td> '.$row["luv"].'</td> </tr>';
}
echo '</tbody></table><br>'; 
}
}//get if
if($_SERVER["REQUEST_METHOD"] == "POST"){
//table consists of columns id,name,30questions,hearts-likes for their answers,luv-likes for developer
$sql = "CREATE TABLE IF NOT EXISTS  together (id INT(4) NOT NULL AUTO_INCREMENT PRIMARY KEY, name VARCHAR(30) UNIQUE NOT NULL, q1 VARCHAR(255) NULL,q2 VARCHAR(255) NULL,q3 VARCHAR(255) NULL,q4 VARCHAR(255) NULL,q5 VARCHAR(255) NULL,q6 VARCHAR(255) NULL,q7 VARCHAR(255) NULL,q8 VARCHAR(255) NULL,q9 VARCHAR(255) NULL,q10 VARCHAR(255) NULL,q11 VARCHAR(255) NULL,q12 VARCHAR(255) NULL,q13 VARCHAR(255) NULL,q14 VARCHAR(255) NULL,q15 VARCHAR(255) NULL,q16 VARCHAR(255) NULL,q17 VARCHAR(255) NULL,q18 VARCHAR(255) NULL,q19 VARCHAR(255) NULL,q20 VARCHAR(255) NULL,q21 VARCHAR(255) NULL,q22 VARCHAR(255) NULL,q23 VARCHAR(255) NULL,q24 VARCHAR(255) NULL,q25 VARCHAR(255) NULL,q26 VARCHAR(255) NULL,q27 VARCHAR(255) NULL,q28 VARCHAR(255) NULL,q29 VARCHAR(255) NULL,q30 VARCHAR(255) NULL,q31 VARCHAR(255) NULL,q32 VARCHAR(255) NULL,q33 VARCHAR(255) NULL,q34 VARCHAR(255) NULL,q35 VARCHAR(255) NULL,q36 VARCHAR(255) NULL,q37 VARCHAR(255) NULL,q38 VARCHAR(255) NULL,q39 VARCHAR(255) NULL,q40 VARCHAR(255) NULL,q41 VARCHAR(255) NULL,q42 VARCHAR(255) NULL,q43 VARCHAR(255) NULL,q44 VARCHAR(255) NULL,q45 VARCHAR(255) NULL,q46 VARCHAR(255) NULL,q47 VARCHAR(255) NULL,q48 VARCHAR(255) NULL,q49 VARCHAR(255) NULL,q50 VARCHAR(255) NULL,hearts INT(3) NULL,luv INT(3) NULL )";
if ($conn->query($sql) ===FALSE) {
   echo "\nError creating table: " . $conn->error;
}

$sql= $conn->prepare("INSERT INTO together (name,q1,q2,q3,q4,q5,q6,q7,q8,q9,q10,q11,q12,q13,q14,q15,q16,q17,q18,q19,q20,q21,q22,q23,q24,q25,q26,q27,q28,q29,q30,q31,q32,q33,q34,q35,q36,q37,q38,q39,q40,q41,q42,q43,q44,q45,q46,q47,q48,q49,q50) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

//delete
/*
 $_POST['nm']="Arun";
$_POST['q1']="What’s the dream you had last/liked ?";
$_POST['q2']="What’s one thing you would do if you waked up tomorrow as the opposite sex ?";
$_POST['q3']="If you could change one law of our country,what would it be ?";
$_POST['q4']="If you could change one thing in the world ,what it would be ?";
$_POST['q5']="What scene from a movie scarred you in life ?";
$_POST['q6']="Can you think of a movie/movie title that best explains your life currently ?";
$_POST['q7']="If you could have three wishes from god, what would you wish for ?";
$_POST['q8']="What would you do with a million dollars ?";
$_POST['q9']="If you could have one superpower, what it would be ?";
$_POST['q10']="What if you get invisible for one day ?";
$_POST['q11']="As the only human left on Earth, what would you do ?";
$_POST['q12']="If you could be remembered for 3 things after you die, what would they be ?";
$_POST['q13']="If you had a time machine, would you go back in time or visit the future ?";
$_POST['q14']="If you could travel to one past experience, what would it be ?";
$_POST['q15']="If you could ask your future self one question what would it be ?";
$_POST['q16']="If you were going to bury a time capsule (you can put something into it and you get it in future as it is),what would you put in it ?";
$_POST['q17']="What do you think are the 5 most beautiful things in the world ?";
$_POST['q18']="Describe your favourite weather.";
$_POST['q19']="Who is your hero ?";
$_POST['q20']="What's a Favorite Childhood Memory of Yours ?";
$_POST['q21']="What’s the most childish thing you’ve ever done ?";
$_POST['q22']="What did you love to do as a child ?";
$_POST['q23']="What cartoon do you still like to watch ?";
$_POST['q24']="What's your all-time favorite memory ?";
$_POST['q25']="List 5 things that make you instantly happy.";
$_POST['q26']="Who do you wish you could get back into contact with ?";
$_POST['q27']="Which of your friends are you proudest of ?";
$_POST['q28']="What would your friends say about you ?";
$_POST['q29']="What can you talk about for hours that when you talk about it, you light up ?";
$_POST['q30']="Who do you look up to the most, and what qualities do you love about that person ?";
$_POST['q31']="Have you ever done something extremely weird and stupid for someone ?";
$_POST['q32']="What’s the funniest thing you’ve done to get a crush’s attention ?";
$_POST['q33']="What’s the most awkward experience you’ve had with a crush ?";
$_POST['q34']="What do you find attractive in a women(if man)/men(if woman) ?";
$_POST['q35']="What is the sweetest thing someone has ever done for you ?";
$_POST['q36']="What's your first thought when you wake up ?";
$_POST['q37']="What is your favourite breakfast food ?";
$_POST['q38']="What’s one thing you like, and one thing you dislike about yourself ?";
$_POST['q39']="What kinds of things really make you laugh ?";
$_POST['q40']="What really makes you angry ?";
$_POST['q41']="What’s one thing you can’t live without and why ?";
$_POST['q42']="What makes you forget to eat ?";
$_POST['q43']="What memory do you replay the most in your mind ?";
$_POST['q44']="What is the silliest thing you have heard people say about you ?";
$_POST['q45']="What is the first thing you notice about people ?";
$_POST['q46']="What's one thing that's happened to you that has made you a stronger person ?";
$_POST['q47']="What's one thing that helps you decide you can trust someone ?";
$_POST['q48']="What's one thing you've learned that most people don't ?";
$_POST['q49']="Describe your life using one word.";
$_POST['q50']="Any questions/feedback from you ?";

*/
//delete

$sql->bind_param("sssssssssssssssssssssssssssssssssssssssssssssssssss",$_POST['nm'],$_POST['q1'],$_POST['q2'],$_POST['q3'],$_POST['q4'],$_POST['q5'],$_POST['q6'],$_POST['q7'],$_POST['q8'],$_POST['q9'],$_POST['q10'],$_POST['q11'],$_POST['q12'],$_POST['q13'],$_POST['q14'],$_POST['q15'],$_POST['q16'],$_POST['q17'],$_POST['q18'],$_POST['q19'],$_POST['q20'],$_POST['q21'],$_POST['q22'],$_POST['q23'],$_POST['q24'],$_POST['q25'],$_POST['q26'],$_POST['q27'],$_POST['q28'],$_POST['q29'],$_POST['q30'],$_POST['q31'],$_POST['q32'],$_POST['q33'],$_POST['q34'],$_POST['q35'],$_POST['q36'],$_POST['q37'],$_POST['q38'],$_POST['q39'],$_POST['q40'],$_POST['q41'],$_POST['q42'],$_POST['q43'],$_POST['q44'],$_POST['q45'],$_POST['q46'],$_POST['q47'],$_POST['q48'],$_POST['q49'],$_POST['q50']);
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