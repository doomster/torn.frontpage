<?php
// Start the session
session_start();
include('encryptionkey.php');
include('functions.php');
if(isset($_SESSION['APIKEY']) || isset($_COOKIE['tornfrontpage'])) {
	 header("location:frontpage.php");
}
if(isset($_POST['APIKEY'])) {
	$statusrequest=file_get_contents('https://api.torn.com/user/?selections=&key='.$_POST['APIKEY']);
  if ($statusrequest != '{"error":{"code":2,"error":"Incorrect key"}}') {  
  	if (isset($_POST['REMEMBERME'])) {
  		$key = base64_decode($key);
  		$nonce = random_bytes(SODIUM_CRYPTO_SECRETBOX_NONCEBYTES);
  		$cipher = sodium_crypto_secretbox('test', $nonce, $key);
  		$encodedapikey = base64_encode($nonce . $cipher);
		setcookie('tornfrontpage', $encodedapikey , time()+86000, '/');
  	}
  	$_SESSION['APIKEY'] = $_POST['APIKEY']; 
  	header("location:frontpage.php"); }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Torn OPT - by doomster.eu</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Lily+Script+One&family=Nanum+Brush+Script&family=Open+Sans&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-dark bg-dark">
<div class=" mx-lg-2"><form action="index.php" method="post">
    <input class="form-inline" type="textbox" placeholder="API key" id="APIKEY" name="APIKEY" pattern="[A-Za-z0-9]{16}" required>
    <button class="btn-sm btn-success" type="submit">Connect to API</button>
    <input type="checkbox" id="rememberme" name="REMEMBERME" value="sessioncookie"><label class="text-light" data-toggle="tooltip" data-placement="right" title="save APIkey on a cookie on your pc! We dont save your API key">Remember me</label></form></div>
</nav>
<div class="jumbotron text-center">
  <h1><span class="sitetitlefont1 test">TORN</span> <span class="sitetitlefont2">FrontPage</span></h1>
  <p>Got bored of excels so i made this singe page setup of whatever i need from api.</p> 
  <p>Now on <a href="https://github.com/doomster/torn.frontpage">github for code-review!</a></p>
</div>
<div class="container">
  <div class="row">
    <div class="col-sm-6">
      <p class="text-justify content">During my gaming time in Torn, i noticed that in order to calculate the next steps of my carreer, i would have to visit several excel files that users provided. Just to get a glimpse of some basic info, i had to run around more than few different pages around the web, and eventually do calculations manually.</p> 
      <p class="text-justify content">The main platform is setup, a basic page, that communicates with the torn API and pulls data. In order to do so, it needs to supply your API key.</p>
      <p class="text-justify content">This idea poped up, of a single page, that would pull information from the API and do all the maths for me. Then present the data in the form of a newspaper. So when waking up in the morning, i would read my torn-paper and know what i had to do.</p>
      <p class="text-justify content">this project has just started. Feel free to contact me ingame at hexxeded [2428617] for any ideas on how to make this better, or maby bugs you might have found </p>
      <p class="text-justify content">Happy gaming!</p>
    </div>
    <div class="col-sm-6">
      <p class="text-justify content text-danger">Q: ...wait what? give you my api key ?! NO WAY how do i know you dont save it Somewhare and hack my torn life to the grounds?</p>
      <P class="text-justify content text-info">A: Well this is why this project is opensource and provided in GitHub. This way, everyone can check what it does, and how it uses your API KEY. My number one Rule: I DONT SAVE YOUR API KEY :P let me explain a bit... </P>
      <p class="text-justify content text-info">When you visit a site on your browser, a temporary "memory" that saves variables is created. This is called a session. Sessions dissapear (along with all the data it has saved) either when you close your browser, or when 20 minutes have passed. My tool uses Session to store your apikey, which means that if 20 minutes pass, or if you close your browser, you will have to reprovide your API key.</p>
      <p class="text-justify content text-danger">Q: Yeah but, are you stupid or something? i dont wanna log in every time i Visit!  and for sure i dont want you to save my API key on your server!</p>
      <p class="text-justify content text-info">A: Well the solution to this is that "remember me" option next to the login button. This will enrypt the API key with a pretty strong encryption and put it in your computer in the form of a cookie. This way, unless you actually press the "logout" button , you will remain logged in, and still i will not have any record of your key. This cookie is saved directly into your pc/tablet/laptop/mobile phone, and the key in it is encrypted. When you revisit the page i just check for the cookie, and if it is there i store the APIKEY again in the SESSION so that you can continue.</p>
      <p class="text-justify content text-danger">Q: Well thats mumble jumble to me, i dont understand it so i find it hard to believe you</p>
      <p class="text-justify content text-info">A: This is the actual reason i have the whole project on github. you (or any of your techy friends) can review the code, and check for what i am stating.</p>
    </div>     
  </div>
</div>  
<div class="container">
  <div class="row">
    <div class="col-sm-4 align-text-center">
      <h3 class="text-center">EULA</h3>
      <p class="text-justify">This page does not store any personal data, or your API key!</p>
      <p class="text-justify">You just close your browser and all your data disappears, just like that...</p>
    </div>
    <div class="col-sm-4">
      <h3 class="text-center">HOW does it work</h3>
      <p class="text-justify">What i do here, is use the api to pull data from your character and do calculations</p>
      <p class="text-justify">Then i present those calculations so that you have a better general idea of what you are doing</p>
    </div>
    <div class="col-sm-4">
      <h3 class="text-center">why did i get into trouble</h3>        
      <p class="text-justify">This page was made for personal usage to begine with..i was thinking of hardcoding my API and keeping it on a personal server</p>
      <p class="text-justify">But then, i imagine everyone gets frustrated once in a while, and maby this type of presenting data is easier for some.. so why not share it with my faction and/or everyone else? Thats why i implemented the API box on the top, so everyone can get their detailed Singlepage tool!</p>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>
<script type="text/javascript">

$(function () { $('[data-toggle="tooltip"]').tooltip() })

</script>