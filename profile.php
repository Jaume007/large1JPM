<?php
if(isset($_COOKIE['PHPSESSID'])) session_start();
include_once "model.php";
if(isset($_REQUEST['username']))changeUsername($_SESSION['user'],$_REQUEST['username']);
$user = getUser($_SESSION['user']);

?>
<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Storyteller tavern</title>
</head>
<body>



<h1><?php echo $user->getUser() ?> Profile</h1>
<br/>
<br/>
<p>Username: <?php echo $user->getUser() ?></p>
<p>Name: <?php echo $user->getName() ?></p>
<form method="get" action="profile.php">
    <label for="username">New username: </label>
    <input type="text" name="username" id="username" required/>
    <input type="submit" value="Change Username"/>
</form>
<form>
    <button formaction="welcome.php">Back</button>
</form>

</body>
</html>