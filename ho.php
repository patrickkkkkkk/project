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
  .padding{
  padding:20px 60px 60px 60px;
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
  .error{
  text-align:center;
  padding: 170px; 50px; 50px 50px;
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
<?php
$con = mysqli_connect("localhost", "root", "", "task");
$results = mysqli_query($con, "SELECT * FROM note");

while($row = mysqli_fetch_assoc($results)){
  $ti=$row;
  foreach($ti as $items){
  echo '&nbsp; &nbsp; &nbsp; &nbsp;';
  echo '<button class="call_modal" style="cursor:pointer;">'. $items['title'] . '</button>';
  ?>
  <div class="note" data-id="<?= $items['id'] ?>">
    <div class="modal">
      <div class="modal_close close"></div>
        <div class="modal_main">
          <?php
          echo '<br /><br />';
          echo '<div class="padding">' . $items['title'];
          echo '<br /><br /><br /><br />';
          echo $items['note'];
           echo '<img src="i783wQYjrKQ.png" class="close" style="line-height: 12px;
		         margin-top: 1px;
		         margin-right: 2px;
		         position:absolute;
		         top:0;
       right:0;"> ';
          echo '</div>';
          ?>
        </div>
      </div>
    </div>
  </div>
<?php
}
}
?>

<?php
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>


</body>
</html>
