<!DOCTYPE html>
<html lang="en">
<head>
	<title>Friend's Thoughts</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="icon" type="image/png" href="vendor/favicon.ico"/>

	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="vendor/fonts/font-awesome-4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="vendor/fonts/iconic/css/material-design-iconic-font.min.css">
	
<link rel="stylesheet" type="text/css" href="vendor/fonts/iconic/css/material-design-iconic-font.css">
	
<link rel="stylesheet" type="text/css" href="vendor/main.css">
	
<style>
/*for cards*/
.each{
min-height: 350px;
width:85%;
border-radius:6px;
margin-top:15%;
background-color:#fff;
position:relative;
border: 1px solid white;
box-shadow: 0 7px 30px 0px silver;
word-break:wrap-all;
}
 /*for questions*/
.ques{
  font-family: SourceSansPro-Bold;
margin-top:32px;
font-size:13px;
}
/*for questions*/
.ans{ font-family: SourceSansPro-SemiBold;
color:grey;
 }
/*for name in cards*/
.by{
font-family: SourceSansPro-SemiBold;
position:absolute;
 bottom:6px;
width:88%;
font-size:10px;
color:dodgerblue;
}
/*for outlined buttons with names*/
button{
font-family: SourceSansPro-SemiBold;
width:88%;
margin:5px;
border-radius:3px;
}
/*for hearts count*/
#hearts{
font-family: SourceSansPro-SemiBold;
top:15%;
width: 100%;
z-index:1;
position:sticky;
}
/*for hearts in card*/
.hrts{
color:red;
font-family: Material-Design-Iconic-Font;
}
.zmdi-favorite-after:after {
 content: '\f15f'; 
}
/*for link save likes*/
a{
font-family: SourceSansPro-SemiBold;
font-size:13px;
}
</style>
</head>
<body>
	<div class=" container mt-3"><center>
<div id="info" style="font-size:8px;"></div> <!-- to show double tap info -->
<p id="hearts"></p><!--to show likes count-->
<?php 		
   $conn = new  mysqli("localhost", "id13739660_arunvignesh","7871567385_Arun","id13739660_sweet_heart");
//db created from phpmyadmin
if ($conn->connect_error) {
   die("<br>Connection failed: "  . $conn->connect_error);
}
//visitors name is got from questions.php
//checking for visiter name in db 
$l=preg_replace('/[^A-z.\s]/', '', $_GET['myself']);
 $sql = "SELECT name FROM together where name='{$l}' ";
 $result = $conn->query($sql);
//if visiter directly approach this page or name modified in URL is present in db page will redirect
if (!isset($_GET['myself']) | $result->num_rows ==0) {
 $row = $result->fetch_assoc();
exit(header("location:index.php"));
//thus the one who filled answers will enter the page
  }
  //likes for developer is posted from questions.php 
if(isset($_GET['luv'])){
 //only numbers are accepted/filtered
 $l=preg_replace('/[^0-9]/', '', $_GET['luv']);
$upd="UPDATE together SET luv= '{$l}' WHERE name ='{$_GET['myself']}' ";
 $conn->query($upd);
}
//if likes of friends answer is got update hearts column of friend row in db
if(isset($_GET['hearts'])){
//only numbers are accepted
 $l=preg_replace('/[^0-9]/', '', $_GET['hearts']);
$upd="UPDATE together SET hearts= '{$l}' WHERE name ='{$_GET['friend']}' ";
 if($conn->query($upd)===TRUE){ 
//after updated go back to see friends name 
 exit(header("location:answers.php?myself={$_GET['myself']} "));
 }
}
//phase2
//after friend name button is clicked getting name display their answers
if(isset($_GET['friend'])){
//fetching the answer by name and question(first row) by id
$l=preg_replace('/[^A-z.\s]/', '', $_GET['friend']);
$sql ="select * from together where  name='{$l}' or id='1' ";
 $res = $conn->query($sql);
if ($res ===FALSE) {
 echo "<br>Select-Error : " .$conn->error;
  }
if ($res->num_rows > 0 ) {
//splitting rows by fetching in separate variable to display simultaneously
   $q = $res->fetch_assoc();
   $a= $res->fetch_assoc();
  for($i=1;$i<count($q)-3;$i++) {
 echo ' <div id="q'.$i.'" class="container each" >
 <div class="ques ">'.$q["q".$i].'</div>
 <div class="ans mx-2 mt-4">'.htmlentities($a["q".$i]).'</div>
<br><p class="by">'.$_GET['friend'].'</p></div>  ';
    }
  } else {
    echo "0 results";
     }
}//get if  
//phase1
//to show friends name in buttons
$sql = "SELECT name FROM together where id!='1' ";
$res = $conn->query($sql);
if ($res->num_rows > 0) {
//visiters name as hidden and friend name as button to send the visiters name along with friend name 
echo '<form  method="get" class="" action="answers.php">
<input hidden class="btn" type="text" name="myself"  value="'.$_GET['myself'].'" />
';
while($row = $res->fetch_assoc()){
 echo '<button type="submit" name="friend" value="'.$row["name"].'" class="btn btn-outline-info">'.$row["name"].'</button>' ;
}
echo '</form>';
}
$conn->close();
     ?>
  </center>  </div>

	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>

	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

	<script src="vendor/main.js"></script>
<script>
$(document).ready(function() { 
<?php 
//visiter name and friend name is store in js variable
echo 'var m="'.$_GET["myself"].'";'."\n".' var f="'.$_GET["friend"].'";';
?>
//compare name in the button to hide own profile
$("button").map(function(){
if($(this).text()==m){
$(this).hide();}
});
<?php
//after entering phase2 hide phase1
//and display info
if(isset($_GET['friend'])){
echo '$("button").hide();'."\n".'$("#info").text("Touch twice to show love");';
}
?>;
//in phase2 add link which save hearts
$(".each:last").append("<div><a href="+"answers.php"+">Gift your love</a></div>");
var i=0; 
//when card is dblclked 
$(".each").dblclick(function(){
// dblclk will not work after once
$(this).unbind("dblclick");
// count of hearts is increased
$("#hearts").text(++i);
// count of hearts is shown and hide
$("#hearts").fadeIn(100).fadeOut(550);
$(this).append("<span class="+"\"hrts zmdi-favorite-after \""+"> <sub class="+" \"zmdi-favorite\""+">  </sub> </span>");
//each time count increases hearts value to be posted is increased 
$(".each:last div a").attr("href","answers.php?hearts="+i+"&myself="+m+"&friend="+f);
});
});//doc
</script>
</body>
</html>