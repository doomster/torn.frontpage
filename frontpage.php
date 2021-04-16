<?php 
session_start();
if(!isset($_SESSION['APIKEY']) && !isset($_COOKIE['torndoomstereu']))
  { 
  header('location:../index.php');
  }
elseif(!isset($_SESSION['APIKEY'])) {
 $key = base64_decode('JgHKzZ6ZFqkUVT8xFAJs5o7g/trRh0FJI3OpyaQRMW0=');;
 $decoded = base64_decode($_COOKIE['torndoomstereu']);
 $nonce = mb_substr($decoded, 0, SODIUM_CRYPTO_SECRETBOX_NONCEBYTES, '8bit');
 $cipher = mb_substr($decoded, SODIUM_CRYPTO_SECRETBOX_NONCEBYTES, null, '8bit');
 $_SESSION['APIKEY'] = sodium_crypto_secretbox_open($cipher, $nonce, $key);
 }
else
{

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
<div class=" mx-lg-2">
<a href="disconnect.php" class="btn-sm btn-success">Disconnect</a>
</div>
</nav>

<?php 
$statusrequest=file_get_contents('https://api.torn.com/user/?selections=&key='.$_SESSION['APIKEY']);
$status = json_decode($statusrequest); ?>
<div class="container">
  <div class="row">
          <div class="jumbotron text-center">
  <h1><span class="sitetitlefont11">TORN</span> <span class="sitetitlefont21">FrontPage</span></h1>
</div>
    <div class="col-sm-6">
      <p class="text-justify content">You are currently a <?php echo $status->level; ?> level <?php echo $status->rank; ?> working as a <?php echo $status->job->position." at ".$status->job->company_name; ?> . Your soul belongs to <?php echo $status->faction->faction_name." who currently use you as a ".$status->faction->position; ?> within their ranks. Your current status is <?php echo $status->status->state; ?> and you are feeling pretty good about it.</p>
    </div>
    <div class="col-sm-6">
      <p class="text-justify content">this will be a -newspaper like - two columns site and this is its second column of text,this will be a -newspaper like - two columns site and this is its second column of text,this will be a -newspaper like - two columns site and this is its second column of text,this will be a -newspaper like - two columns site and this is its second column of text,this will be a -newspaper like - two columns site and this is its second column of text,this will be a -newspaper like - two columns site and this is its second column of text,this will be a -newspaper like - two columns site and this is its second column of text,this will be a -newspaper like - two columns site and this is its second column of text,</p>
      <p class="text-justify content">this will be a -newspaper like - two columns site and this is its second column of text,this will be a -newspaper like - two columns site and this is its second column of text,this will be a -newspaper like - two columns site and this is its second column of text,this will be a -newspaper like - two columns site and this is its second column of text,this will be a -newspaper like - two columns site and this is its second column of text,this will be a -newspaper like - two columns site and this is its second column of text,this will be a -newspaper like - two columns site and this is its second column of text,this will be a -newspaper like - two columns site and this is its second column of text,</p>
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


<?php } ?>