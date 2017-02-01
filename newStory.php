<?php
include_once "init.php";?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New Story</title>
</head>
<body>
<h1>Create a new Story</h1>
<br/>
<form action="controller.php" method="get">
    <label for="title">Title:</label>
    <input type="text" id="title" name="title"/><br/><br/>
    <label for="contribution">Write the first contribution:(max 140 characters)</label><br/><br/>
    <textarea maxlength="140" id="contribution" name="contribution"></textarea><br/><br/>
    <input type="hidden" name="page" value="newStory"/>
    <input type="submit" value="Create Story">
</form>
<form>
    <button formaction="welcome.php">Back</button>
</form>
</body>
</html>
