<?php //19 -20 21 22
if(!isset($_POST['myself']) & !isset($_POST['ans1']) ){
exit(header("location:index.php"));
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Questions</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="icon" type="image/png" href="vendor/favicon.ico"/>

	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="vendor/fonts/font-awesome-4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="vendor/fonts/iconic/css/material-design-iconic-font.min.css">

<link rel="stylesheet" type="text/css" href="vendor/fonts/iconic/css/material-design-iconic-font.css">

	<link rel="stylesheet" type="text/css" href="vendor/main.css">

<style>
/*for background color*/
html,body{
height: 100%;
background-image: linear-gradient(to bottom right,dodgerblue, magenta);
}
/*for cards*/
.each{
min-height: 380px;
width:88%;
border: 2px solid white;
background-color:#fff;
border-radius:6px;
margin-top:15%;
box-shadow: 0 7px 30px 0px #222;
}
 /*for questions*/
.ques{
font-family: SourceSansPro-Bold;
margin-top:15%;
color:grey;
min-height: 50px;;
}
 /*for answering input field*/
textarea{
width:95%;
font-family: SourceSansPro-SemiBold;
margin-top:25%;
}
 /*for next button*/
section{
font-family: SourceSansPro-SemiBold;
font-size:13px;
margin-top:20%;
margin-bottom:5px;
padding-top:5px;
padding-bottom:5px;
background-color:#f1f1f1;
border: 1px solid grey;
border-radius:50px;
width:40%;
letter-spacing:2px;
transition: all 0.2s;
}
section:hover{
box-shadow: 3px 7px 20px 0px silver;
letter-spacing:4px;
}
 /*for likes count*/
#luv{
margin-top:20%;
}
 /*for big heart*/
#hrt{color: #fdfdfd;
font-size:33px;
transition: color 45s ;
min-height:70px;
width:28%;
font-family: Material-Design-Iconic-Font;
}
#hrt:hover{
color:red;
}
 /*for small hearts*/
.hrts{
display:none;
font-family: Material-Design-Iconic-Font;
color: red;
}
.zmdi-favorite-after:after {
 content: '\f15f'; 
}
.hrts:nth-child(odd){
animation: fly-lt 1.5s infinite linear;
}
.hrts:nth-child(even){
animation: fly-rb 1.5s infinite linear;
}
/*for small hearts animation*/
@keyframes fly-lt {
  0% {
   top:35%;
   left:20%;
   font-size:14px;
   position: absolute;
  }
  45%{ visibility:hidden;}
  65%{ visibility:hidden;} 100% {
   top:5%;
   left:22%;
   font-size:24px;
   position: absolute;
  }
}
@keyframes fly-rb {
  0% {
   top:50%;
   right:20%;
   font-size:14px;
   position: absolute;
  }
  45%{ visibility:hidden;}
  65%{ visibility:hidden;} 100% {
   top:20%;
   right:18%;
   font-size:24px;
   position: absolute;
  }
}
/*for box has small hearts*/
.box{
width:35px;
height:120px;
overflow:scroll;
}

</style>
<script>
function show(nx){
$(nx).prev().fadeOut(30);
$(nx).fadeIn(200);
}
</script>
</head>
<body>

<div class="container mt-3">
<center><form  method="post" class="login100-form validate-form" action="questions.php" >
<?php 		
//phase2
  $conn = new  mysqli("localhost", "id13739660_arunvignesh","7871567385_Arun","id13739660_sweet_heart");
//db created from phpmyadmin
if ($conn->connect_error) {
   die("<br>Connection failed: "  . $conn->connect_error);
}
//if visiter already answered
$l=preg_replace('/[^A-z.\s]/', '', $_POST['myself']);
 $sql = "SELECT name,hearts,luv FROM together where name='{$l}' ";
 $result = $conn->query($sql);
if ($result->num_rows >0) {
 $row = $result->fetch_assoc();
echo "<p>Lovely! </p>";
echo "Welcome back ".$row["name"];
if($row["luv"]>49){
//others likes to visiters answer is shown if rating is greater than 49
if($row["hearts"]>0){
echo '<div class="mt-3">You\'ve gifted of '.$row["hearts"].' loves</div>';
}
//link to answers.php  if rating is greater than 49
echo'<section id="view"> Answers</section>';
}
// to hide questions
$hy="hy";
 }
// insert if first answer is posted
if(isset($_POST['ans1'])){
$sql= $conn->prepare("INSERT INTO together (name,q1,q2,q3,q4,q5,q6,q7,q8,q9,q10,q11,q12,q13,q14,q15,q16,q17,q18,q19,q20,q21,q22,q23,q24,q25,q26,q27,q28,q29,q30,q31,q32,q33,q34,q35,q36,q37,q38,q39,q40,q41,q42,q43,q44,q45,q46,q47,q48,q49,q50) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

$sql->bind_param("sssssssssssssssssssssssssssssssssssssssssssssssssss",$_POST['myself'],$_POST['ans1'],$_POST['ans2'],$_POST['ans3'],$_POST['ans4'],$_POST['ans5'],$_POST['ans6'],$_POST['ans7'],$_POST['ans8'],$_POST['ans9'],$_POST['ans10'],$_POST['ans11'],$_POST['ans12'],$_POST['ans13'],$_POST['ans14'],$_POST['ans15'],$_POST['ans16'],$_POST['ans17'],$_POST['ans18'],$_POST['ans19'],$_POST['ans20'],$_POST['ans21'],$_POST['ans22'],$_POST['ans23'],$_POST['ans24'],$_POST['ans25'],$_POST['ans26'],$_POST['ans27'],$_POST['ans28'],$_POST['ans29'],$_POST['ans30'],$_POST['ans31'],$_POST['ans32'],$_POST['ans33'],$_POST['ans34'],$_POST['ans35'],$_POST['ans36'],$_POST['ans37'],$_POST['ans38'],$_POST['ans39'],$_POST['ans40'],$_POST['ans41'],$_POST['ans42'],$_POST['ans43'],$_POST['ans44'],$_POST['ans45'],$_POST['ans46'],$_POST['ans47'],$_POST['ans48'],$_POST['ans49'],$_POST['ans50']);
if($sql->execute()){
echo "<h5>Delightful! Thanks for sharing</h5>";
//after inserted show for rating
echo '<h6 id="luv">Loved this?</h6>
<div class="box">
<span class="hrts zmdi-favorite-after">  <sub class="zmdi-favorite"> </sub> </span>
<span class="hrts zmdi-favorite-after">  <sub class="zmdi-favorite"> </sub> </span>
</div><div id="hrt" class="zmdi-favorite" ></div>';
//link to answers.php
echo'<section id="view"> Answers</section>';
//to hide questions after inserted 
$hy="hy";
}
}//post if  
//phase1

 // fetching questions
$sql = "SELECT * FROM together where id='1'";
$result = $conn->query($sql);
if ($result ===FALSE) {
 echo "<br>Select-Error : " .$conn->error;
  }
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
 //display everything in a card 
 //card id as q1,q2,q3...
  for($i=1;$i<count($row)-3;$i++) {
 echo ' <div id="q'.$i.'" class="container each">
 <div class="ques">'.$row["q".$i].'</div>
 <div class="mx-2"><textarea type="text" name="ans'.$i.'" rows="5" class="form-control" placeholder="Share your thoughts" ></textarea></div>
<section onclick="show(\'#q'.($i+1).'\')">NEXT</section> <br></div> ';
    }
//thus click on next button it sends next card's id as parameter to show func for display next card 
  } else { echo "Empty"; }
$conn->close();
     ?>
			</form></center>
    </div>

	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>

	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

	<script src="vendor/main.js"></script>
<script>
$(document).ready(function() { 
//hide all cards
$(".each").hide();
//show only first card
$("#q1").show();
//after answers are inserted or visited already answered hide questions
<?php if(isset($hy)){ 
echo '$(".each").hide();'; } ?>
//getting visitor name from index.php
var my="<?php echo $_POST['myself']; ?>";
//change last card button to submit button with visitor name as value 
//if special character is in name and posted, this line fails so no complete button is added
$(".each:last section").html("<button type="+"submit "+" name="+"myself"+"  value=\""+my+"\" >COMPLETE</button>");
//if first and last question is not answered then submit will not work
$("[type=submit]").click(function(e){
if( $('textarea:first').val()=="" | $('textarea:last').val()=="" ){
e.preventDefault();
}
});
var i=0;
 $(".hrts").fadeTo(0,0);
$("#hrt").click(function(){
 //if big hearts is clicked it increase the likes count
 $('#luv').text(++i);
//every click on big heart append 2 different small hearts into box on even and odd click 
 if(i%2==0){
  $(".hrts:nth-child(even)").fadeTo(250,0.5);
  $(".hrts:nth-child(odd)").fadeTo(0,0);
//show source code download link on i=100 
if(i==100){$("h5").html("<a style="+"\"color:white;text-decoration:none;  font-family: Material-Design-Iconic-Font;\"" +"class="+"\"zmdi-download\""+" href="+"\"Sweet_heart.zip\""+"> Source code</a>"); }
 }else{
  $(".hrts:nth-child(odd)").fadeTo(250,0.5);
  $(".hrts:nth-child(even)").fadeTo(0,0);
  //$(".box").append("<span class="+"hrts" +"> ♥<sup> ♥ </sup> </span>");
 }
//hide all small hearts on clicks
 $(".hrts").fadeTo(50,0);
 });//clk
//if view is clicked then rating value and visitor name is sent to answers.php
 $("#view").click(function(){
window.location="answers.php?luv="+i+"&myself="+my;
 });//clk
});//doc
</script>
</body>
</html>
