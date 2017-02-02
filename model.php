<?php
include_once "db.php";
include_once "user.php";
function login($user, $pwd){
    $db=new db();
    $sql="Select * from users where username='".$user."' and pwd='".$pwd."'";
    $res=$db->select($sql);
    if ($res->num_rows==1) {
        session_start();
        $_SESSION['user']=$user;
        return true;
    }
    else return false;
}
function registerUser($user, $pwd, $name){
    $db=new db();
    $sql="INSERT INTO users(username, pwd, name) VALUES ('".$user."','".$pwd."','".$name."')";
    $res=$db->insUpDel($sql);
    return $res;
}
function sanitize($input){
    //TODO
    //This function would sanitize all user input
}
function getUser($user){
    $db=new db();
    $sql="Select * from users where username='".$user."'";
    $res=$db->select($sql);
    $res=$res->fetch_assoc();
    $user=new user($res["username"],$res["pwd"],$res["name"]);
    return $user;
}
function changeUsername($user,$username){
    $db=new db();
    $sql="update users set name='".$username."' where username='".$user."'";
    $res=$db->insUpDel($sql);
    return $res;
}
function printStories(){
    $db=new db();
    $sql="select title,id,likes from stories";
    $res=$db->select($sql);
    while (true){
        $story=$res->fetch_assoc();
        if($story===null) break;
        echo '<li><p><a href="story.php?id='.$story['id'].'">'.$story['title'].'</a> &nbsp;&nbsp;&nbsp;Likes: '.$story['likes'].'</p></li>';
    }

}
function searchStory($id){
    $db=new db();
    $sql="select * from stories where id='".$id."'";
    $res=$db->select($sql);
    $res=$res->fetch_assoc();
    return $res;

}
function addLike($id){
    $db=new db();
    $sql="update stories set likes=likes+1 WHERE id='".$id."'";
    $res=$db->insUpDel($sql);
    return $res;
}
function createStory($title){
    $db=new db();
    $sql="insert into stories(title, likes, status) values ('".$title."',0,0)";
    $res=$db->insUpDel($sql);
    $file=fopen("./files/".$title.".txt","w");
    fclose($file);
    return $res;
}
function addContribution($title,$contribution,$user){
    $db=new db();
    $id=searchId($title);
    $sql="insert into contributions(FK_Story,FK_User) values ('".$id."','".$user."')";
    $db->insUpDel($sql);
    $sql="select count(*) as idC from contributions where FK_Story='".$id."';";
    $idC=$db->select($sql);
    $idC=mysqli_fetch_assoc($idC);
    $idC=$idC['idC'];
    $file=file_get_contents("./files/".$title.".txt");
    $file.=PHP_EOL.'0|'.$user.'|'.date("j, n, Y").'|'.$contribution.'|'.$idC;
    $file=trim($file);
    $fil=fopen("./files/".$title.".txt","w");
    fwrite($fil,$file);
}
function searchId($title){
    $db=new db();
    $sql="select id from stories where title='".$title."'";
    $res=$db->select($sql);
    $res=$res->fetch_assoc();
    return $res['id'];
}
function getContributions($title){
    $file_lines=file("./files/".$title.".txt");
    $contributions=[];
    foreach ($file_lines as $line){
        $line=explode("|",$line);
        $contributions[]=array("likes"=>$line[0],"user"=>$line[1],"date"=>$line[2],"text"=>$line[3],"id"=>$line[4]);
    }
    return $contributions;
}
function printContributions($contributions,$id){
    foreach ($contributions as $contribution) {
        $html='<div style="width: 40%; float: left; margin-top: 50px;"><p>'.$contribution['text'].'</p></div>';
        $html.='<div style="width: 20%;margin-left: 10%;float: left;margin-top: 50px;"><ul><li>Likes: '.$contribution['likes'].'</li>';
        $html.='<li>Author: '.$contribution['user'].'</li>';
        $html.='<li>Date: '.$contribution['date'].'</li></ul>';
        $html.='<a href=controller.php?page=adlike&id='.$contribution['id'].'&story='.$id.'"> Like</a></div>';
        echo $html;
    }

}
function sumLike($id,$story){
    $title=searchStory($story);
    $file=file("./files/".$title['title'].".txt");
    $outputFile="";
    foreach ($file as $contribution){
        $contribution=explode("|",$contribution);
        if($contribution[4]==$id)$contribution[0]++;
        $outputFile.=PHP_EOL.''.$contribution[0].'|'.$contribution[1].'|'.$contribution[2].'|'.$contribution[3].'|'.$contribution[4];
    }
    $outputFile=trim($outputFile);
    $file1=fopen("./files/".$title['title'].".txt","w+");
    fwrite($file1,$outputFile);
    fclose($file1);
}