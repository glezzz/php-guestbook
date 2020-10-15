<?php
declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);


//image this code could be a complex query
$users = ['John Doe', 'Joe Doe', 'John Smith', 'An Onymous'];
$articles = ['Terror over london', 'Football: a useless hobby?', 'Economic crisis ahead, says expert', 'Fortis is Fortwas'];
//end controller
//start view
require 'Post.php';
require 'PostLoader.php';
session_start();

function whatIsHappening(){

    echo '<h2>$_GET</h2>';
    var_dump($_GET);
    echo '<h2>$_POST</h2>';
    var_dump($_POST);
    echo '<h2>$_COOKIE</h2>';
    var_dump($_COOKIE);
    echo '<h2>$_SESSION</h2>';
    var_dump($_SESSION);
}

if(isset($_SESSION['posts'])) {
    $posts = $_SESSION['posts'];

}else{
    $posts = new PostLoader();
}


$title = $content = $author = "";

if(isset($_SESSION['title'])){
    $title = $_SESSION['title'];
}

if(isset($_SESSION['message'])){
    $title = $_SESSION['message'];
}

if(isset($_SESSION['author'])){
    $title = $_SESSION['author'];
}




$file = 'posts.json';
$message = $_POST['content'];

file_put_contents($file, $message);



whatIsHappening();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My site</title>
</head>
<body>
    <form method="post">
        <input type="text" name="title" placeholder="title"><br>
        <input type="text" name="message" placeholder="message"><br>
        <input type="text" name="author" placeholder="author"><br>
        <input type="submit" value="Submit">

    </form>
    <div>
        <?php $posts->printPosts(); ?>
    </div>
</body>
</html>
