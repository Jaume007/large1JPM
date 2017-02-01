<?php include_once "init.php";
include_once "model.php"?>
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
<h1>Welcome <?php echo $_SESSION['user'] ?></h1>
<a href="profile.php">My profile</a>
<div>
    <h1>Stories on the tavern</h1>
    <ul>
        <?php printStories();?>

    </ul>
    <form>
        <button formaction="newStory.php">Start a new Story</button>
    </form>
</div>





</body>
</html>