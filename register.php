<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Storyteller tavern</title>
</head>
<body>
<h1>Welcome to the storyteller tavern</h1>
<h4>Register</h4>
<?php if (isset($_GET['error'])) echo '<h3 style="color:red">Registration failed, try again</h3>';?>
<form id="form1" method="get" action="controller.php">
    <label for="user">Username</label>
    <input type="text" name="user" id="user" required />
    <label for="pwd">Password</label>
    <input type="password" name="pwd" id="pwd" required />
    <label for="name">Name</label>
    <input type="text" name="name" id="name" required/>
    <input type="hidden" name="page" value="register";/>
    <input type="submit" value="Register">
</form>

</body>
</html>