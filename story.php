<?PHP include_once "init.php";
include_once "model.php";
$id=$_REQUEST['id'];
if(isset($_REQUEST['like'])) {
    addLike($id);
    $story=searchStory($id);
    if($story['status']==1) setStatus(0,$story['id']);
}
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
<?php printContributions(getContributions($story['title']),$id);?>
<?php if ($story['status']==0) {
    setStatus(1,$story['id']);
    $html='<div style="float: left;margin-top: 30px; margin-right: 80%;"> <form action="controller.php" method="get"> <label for="contribution">Write the new contribution:(max 140 characters)</label><br/><br/>
    <textarea maxlength="140" id="contribution" name="contribution"></textarea><br/><br/>
    <label for="end">Finished?</label>
    <input type="checkbox" id="end" name="end"/>
    <input type="hidden" name="id" value='.$story['id'].'>
    <input type="hidden" name="page" value="addCon"/>
    <input type="submit" value="Add Contribution"></form></div>
    <div style="float: left;margin-top: 30px;"><p><a href="controller.php?page=cancel&id='.$story['id'].'">Cancel Edition</a></p></div>';
    echo $html;
}else if($story['status']==2){
    echo '<div style="float: left;margin-top: 30px; margin-left: 30%"><h3> The end</h3>
<form>
    <button formaction="welcome.php">Back</button>
</form></div>';
}else {echo '<div style="float: left;margin-top: 30px; margin-left: 30%">
<form>
    <button formaction="welcome.php">Back</button>
</form></div>';
}
?>

</body>
</html>