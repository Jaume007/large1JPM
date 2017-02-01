<?PHP include_once "init.php";
include_once "model.php";
$id=$_REQUEST['id'];
if(isset($_REQUEST['like'])) addLike($id);
$story=searchStory($id);?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Story</title>
</head>
<body>
<h1><?php echo $story['title'];?></h1>
<p>Likes: <?php echo $story['likes']; ?>          <a href="story.php?like=1&id=<?php echo $id ?>">Add a like!</a></p>
<?php printContributions(getContributions($story['title']));?>
</body>
</html>