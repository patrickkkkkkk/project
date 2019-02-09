<html>
<head>
<script src="jquery-1.10.2.min.js"></script>
<style>
body
{
	margin:0;
}
.submitted{
margin:0px;
}
.modal
{
	width:100%;
	height:100%;
	position:fixed;
	top:0;
	display:none;
}
.modal_close
{
	width:100%;
	height:100%;
	background:rgba(0,0,0,.8);
	position:fixed;
	top:0;
}
.close
{
	cursor:pointer;
}
.note{
text-align:center;
}
#note{
font-family: Javanese text;
}
.call_modal{
 font-family: myFirstFont;
}
.modal_main
{
	width:50%;
	height:400px;
	background:#fff;
	z-index:4;
	position:fixed;
	top:16%;
	border-radius:4px;
	left:24%;
	display:none;
 -webkit-animation-duration: .5s;
    -webkit-animation-delay: .0s;
    -webkit-animation-fill-mode: both;
    -moz-animation-fill-mode: both;
    -o-animation-fill-mode: both;
	    -webkit-backface-visibility: visible!important;
    -webkit-animation-name: fadeInRight;
}
@-webkit-keyframes fadeInRight{0%{opacity:0;-webkit-transform:translateX(20px)}100%{opacity:1;-webkit-transform:translateX(0)}}
::-webkit-input-placeholder{
  font-size: 13.4px;
}
button
{
padding:20px;
border-radius:5px;
background:#808080;
border:none;
font-size:18px;
color:#fff;
margin:8%;
}
</style>
<script>
$(document).ready(function(){
  $(".call_modal").click(function(){
	$(".modal").fadeIn();
	$(".modal_main").show();
	  });
});
$(document).ready(function(){
  $(".close").click(function(){
	$(".modal").fadeOut();
	$(".modal_main").fadeOut();
	  });
});
$(document).ready(function(){
  $(".submitted").click(function(){
	$(".modal").fadeOut();
	$(".modal_main").fadeOut();
	  });
});
</script>
</head>
<body>
<button class="call_modal" style="cursor:pointer;">Add Task </button>
<div class="modal">
<div class="modal_close close"></div>
<div class="modal_main">
<div class="note"> <?php
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<div id="name">Task Name:<textarea name="title" rows="1.8" cols="20" style="margin-top: 50px"></textarea></div>
<textarea name="note" rows="15" cols="90" style="margin-top: 20px" placeholder="Note"></textarea>
  <br><br>

  <input type="submit" name="submit" class="submitted" value="Submit">
  <?php
   $con=mysqli_connect("localhost","root","","task");
   if(isset($_POST['submit'])){
  	$message=$_POST['note'];
  	$title=$_POST['title'];
  	$qw='INSERT INTO `note`(`id`,`title`,`note`,`date`)VALUES("","'.$title.'","'.$message.'","")';
  	mysqli_query($con,$qw);
  	$r="SELECT $title FROM note";
  	$result = mysqli_query($con, $r);
	$row = mysqli_fetch_assoc($result);

    if($row<1){
    header("location:ho.php");
    }
    else{
    echo 'Title already exist!';
    }
}
?>

</form>




<img src="i783wQYjrKQ.png" class="close" style="line-height: 12px;
     margin-top: 1px;
     margin-right: 2px;
     position:absolute;
     top:0;
     right:0;">
</div>
</div>
</body>
</html>

