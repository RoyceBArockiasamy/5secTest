<?php
if (isset($_GET['enSubmit']) && isset($_GET['uname']) && isset($_GET['rname'])){
	echo'<meta http-equiv="refresh" content="100000000000">';
	$room=$_GET['rname']; 
	$uname=$_GET['uname'];
	if (!is_dir($room)) mkdir($room);
	$files = scandir($room);  
	foreach ($files as $user){
		if ($user=='.' || $user=='..') continue;
		$handle=fopen("$room/$user",'r');
		$time = fread($handle, filesize("$room/$user"));
		fclose($handle);
		if ((time()-$time)>20) unlink("$room/$user"); 
	}
	$contents='';
	$filename="$room.html";
	if (file_exists($filename)){
		$handle = fopen($filename, "r");
		$contents = fread($handle, filesize($filename));
		fclose($handle);	
	}
	$handle = fopen("$room/$uname", "w");
	fwrite($handle, time());
	fclose($handle);
	
	$files = scandir($room);
	$users='';
	foreach ($files as $user) if ($user!='.' && $user!='..') $users.=$user."\n";
	
	if (isset($_POST['Send'])){
		$text=$_POST['txt'];
		$contents.="$text";
		$handle = fopen("$filename", "a");
		fwrite($handle, "$text\n");
		fclose($handle);
	}

if(isset($_POST["txt"])) { 
	$fp = fopen("$room.html", "r+");
ftruncate($fp, 0);
fclose($fp);

$text=$_POST['txt'];
		$contents.="$text";
		$handle = fopen("$filename", "a");
		fwrite($handle, "$text\n");
		fclose($handle);
}
?>
<!DOCTYPE html>
<html>
<link rel="manifest" href="/manifest.json">
<!--Another head and style thing...-->
<head>
<script src="/js/jquery-1.3.2.js"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<meta http-equiv="Content-Type" content="text/html; charset= utf-8">
<style>
.button {
  display: inline-block;
  padding: 15px 25px;
  font-size: 24px;
  cursor: pointer;
  text-align: center;
  text-decoration: none;
  outline: none;
  color: #fff;
  background-color: #4CAF50;
  border: none;
  border-radius: 15px;
  box-shadow: 0 9px #999;
}

.button:hover {background-color: #3e8e41}

.button:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}
.button21 {
  display: inline-block;
  border-radius: 4px;
  background-color: #f4511e;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 28px;
  padding: 20px;
  width: 200px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}

.button21 span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button21 span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button21:hover span {
  padding-right: 25px;
}

.button21:hover span:after {
  opacity: 1;
  right: 0;
}
</style>

</head>
<script>
function get() {
	document.getElementById("status").style.display= "block";
	}
	function cancel_get() {
	document.getElementById("status").style.display= "none";
	}
	function css() {
		document.getElementById("css_man").style.display= "block";
		document.getElementById("lip").style.display= "none";
	document.getElementById("dip1").style.display= "none";
	document.getElementById("dip2").style.display= "none";document.getElementById("dip3").style.display= "none";document.getElementById("dip4").style.display= "none";document.getElementById("dip5").style.display= "none";document.getElementById("dip6").style.display= "none";document.getElementById("dip7").style.display= "none";document.getElementById("dip8").style.display= "none";
	}
</script>
<body OnLoad="document.myform.txt.focus() typeWriter() fast()" style="font-family: sans-serif">
<div id="status" style="z-index: 8;background-color: lightyellow; height: 35%; width: 60%; position: fixed; display: none; top:30%; left: 30%;">
<!--File Creation-->
<center><u><h2>File Creation Service</h2></u></center><br>
<p id="lip">Please select programming language for the use of the file:</p><br>
<button onclick="css()" id="dip" class="button button1">CSS</button>
<button onclick="js()" id="dip1" class="button button2">Javascript</button>
<button onclick="php()" id="dip2" class="button button3">PHP</button>
<button onclick="json()" id="dip3" class="button button4">JSON</button>
<button onclick="python()" id="dip4" class="button button5">Python</button>
<button onclick="coldfusion()" id="dip5" class="button button1">Coldfusion</button>
<button onclick="javascript()" id="dip6" class="button button2">Javascript</button>
<button onclick="flash()" id="dip7" class="button button3">Flash</button>
<button onclick="xml()" id="dip8"  class="button button4">XML</button><br>
<div style="position: absolute; top:0; right:0; background-color: white; color: red;"><button onclick="cancel_get()" style="background-color: white; border: none; color: red;">X</button></div>
<p id="css_man" style="display: none;"> Name your css file: </p>
</div>
<div style="z-index: 2;background-color: navy; color: white; position: fixed; bottom:0; height: 80%; width: 3%; left: 50%;"> </div>
<div style="background-color: lightblue; color: white; position: fixed; bottom:0; height: 80%; width: 100%; left: 50%;"> <p style="font-size: 22px; color: black;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Files &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button onclick="get()" style="font-size:39px; color: green; background-color; lightblue; border: none; background-color: lightblue;"><i class="material-icons">add_circle_outline</i></button>
<hr>
<div style="background-color: white; color: black; width: 17%; height: 8%;"> <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class='fas fa-file-code' style='font-size:24px'></i> <?php echo "$room" ?></div>



</p></div>

<!--Change height to 100 later-->
<iframe id="love" src="https://codee--roycea.repl.co/<?php echo $room ?>" style="background-color: white;position: static; width: 50%;border: 9px ridge lightgrey;"  contenteditable="true" name="iframe" id="iframe" height="100%" ></iframe>

<form action="" method="post" name="myform" style="position: fixed; width:100%; height: 100%;">


<center>


</center>

</article>
<div class="wrapper">

	<textarea cols="73.8" rows="83" class="form-control rounded-0" wrap="off"  contentEditable="true" autocomplete="off" id="txt" name="txt" name="txt" height="500px;" width="100%;" style="padding: 4%; color: black; background-color: white; font-family: Inconsolata; font-size: 12pt; position: static; right:0;"></textarea>
</div>


<div class="nav123" style="background-color: grey; position: fixed; top:0; width: 50%; height:20%; right:0;"><button  onclick=" window.open('https://codee--roycea.repl.co/<?php echo $room ?>.html', '_blank'); return false;" style='font-size:24px; background-color: white; position: static; top: 2;'><i class='fas fa-external-link-alt'></i></button>

<br>
<button style='font-size:24px; background-color: white;'><i class='fas fa-redo-alt'></i></button><br>

 <button style='font-size:24px; background-color: white;'><i class='fas fa-rss'></i></button><br><br>

<input type="submit" onclick="fiona()" name="Send"  class="button" value="Start >>>"></input></div>

</form>

<?php
}else {
?>
<form method="get" action="">

<div class="pizza">

<table style="border: none;background-color: #31A4E1; width: 100%; height: 100%;" align="center">
<thead>
<center><h1 style="color: white;background-color: #31A4E1;">Codee Editor</h1> </center>
</thead>
<tbody>
	<tr>
		<td style="font-family: sans-serif;font-size: 17pt;text-align: left; width: 502px; color: white;"><center>Name:</center></td>
		<td style="font-family: sans-serif; font-size: 17pt; text-align: left; color: white; width: 500px;">
		<center><input id="name" maxlength="15" id="nickname" name="uname" style="font-size: medium; width: 100px; color: #31A4E1;" required></center></td>
	</tr>
	<tr>
		<td style="font-family: sans-serif;font-size: 17pt;text-align: left; width: 432px; color: white;"><center>Project name (initial .html file - no index.html):</center></td>
		<td style="font-family: sans-serif; font-size: 17pt; text-align: left; color: #31A4E1; width: 100px;">
		<center><input  maxlength="15"  name="rname" style="font-size: medium; width: 100px; color: #31A4E1;" required>
		</center></td>
	</tr>
	<tr>
		<td style="font-family: sans-serif;font-size: 17pt;text-align: center; color: #31A4E1; padding-top:10px;padding-bottom:10px" colspan="2">
		<input name="enSubmit" style="width: 118px;border: none;background-color: white; height: 63px; font-size: 30pt; font-family: sans-serif; color: #31A4E1" type="submit" onclick="store()" value="Enter" ></td>
	</tr>
	</tbody>
</table>
</form>

</div>

<?php
}
?>


<head>
<title> <?php echo "$room" ?>.html</title>
<style>
body{
	background: linear-gradient(white, lightgrey);
	zoom: 80%;
}
nav123 {
	background-color: lightblue;
	width: 100%;
	height: 20%;
	position: fixed;
	top:0; 

}
article {
	background-color: lightgrey;
}
//media screen//



//media screen//
textarea > span{
    font-style: italic;
}

.fa-plus {
	position: fixed;
	top: 5;
	right:5;

	z-index: 2
}
.pizza {
  position: fixed;
  top: 200;
    width: 100%
}
.wrapper {
  width: 300px;
  margin-left: auto;
  margin-right: auto;
  margin-top: 20vh;
  text-align:center;
  font-size: 1.5rem;
  position: fixed;top: 0; 
  right:400px;
  height: 1550px;
}
textarea {
	border: 1px dashed black;
	height: 50%;
	top: 0;
	right: 0;
}
textarea::-webkit-scrollbar {
  width: 12px;
  background-color: lightgrey; }

textarea::-webkit-scrollbar-thumb {
  border-radius: 10px;
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: grey; }
</style>
</head>
<script>
var i = 0;
var txt = 'Guest Chat';
var speed = 80;

function typeWriter() {
  if (i < txt.length) {
    document.getElementById("demo").innerHTML += txt.charAt(i);
    i++;
    setTimeout(typeWriter, speed);
  }
}
</script>
<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>






<script>
var inputElement = document.getElementById("nickname");

persistInput(inputElement);
 
function persistInput(input)
{
  var key = "input-" + input.id;

  var storedValue = localStorage.getItem(key);

  if (storedValue)
      input.value = storedValue;

  input.addEventListener('input', function ()
  {
      localStorage.setItem(key, input.value);
  });
}
</script>




</body>
<head>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
<style>
.dot {
  height: 25px;
  width: 25px;
  background-color: white;
  border-radius: 50%;
  display: inline-block;
  position: absolute;
  top:0;
  right:0;
  z-index: 0.1;
}

.pizza {
  position: fixed;
  top: 200;
    width: 100%
}

</style>
</head>
<script>
// When the user clicks on div, open the popup
function myFunction() {
  var popup = document.getElementById("myPopup");
  popup.classList.toggle("show");
}
</script>
<script>
// When the user clicks on div, open the popup
function myFunction1() {
  var popup = document.getElementById("myPopup1");
  popup.classList.toggle("show1");
}
</script>


<script>
window.onload = big1;
function big1() {
var frameElement = document.getElementById("iframe");
var doc = frameElement.contentDocument;
doc.body.contentEditable = true;
}
</script>
<!-- WORKING
<script>
function fiona() {
  var copyText = document.getElementById("txt");
  copyText.select();
  document.execCommand("copy");
alert(copyText.value)
 
}


function reload() {
	alert(copyText.value);
}
window.onload=reload;




if (typeof(Storage) !== "undefined") {
  localStorage.setItem("lastname", copyText.value);
  document.getElementById("txt").innerHTML = localStorage.getItem("lastname");
} else {
  document.getElementById("txt").innerHTML = "Sorry, your browser does not support Web Storage...";
}
</script>
-->

<script type="text/javascript">
function fiona() {
var source = document.getElementById("txt");
     localStorage.setItem("txt", source.value);
	 var storedValue = localStorage.getItem("txt");

}

var <?php echo $room ?> = localStorage.getItem("txt");
window.onload=dum;
function dum() {
 document.getElementById('txt').value = <?php echo $room ?>;
}
</script>

</html>
