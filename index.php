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

$title = $content = $author = "";
$titleErr = $contentErr = $authorErr = null;

$posts_loader = null;
$posts = [];

function whatIsHappening()
{

    echo '<h2>$_GET</h2>';
    var_dump($_GET);
    echo '<h2>$_POST</h2>';
    var_dump($_POST);
    echo '<h2>$_COOKIE</h2>';
    var_dump($_COOKIE);
    echo '<h2>$_SESSION</h2>';
    var_dump($_SESSION);
}


/**
 * Sets up session values and restore post content from previous session
 */
function loadSessionData()
{
    global $posts_loader, $author, $title, $content;

    if (isset($_SESSION['posts'])) {
        $posts_loader = $_SESSION['posts'];

    } else {
        $posts_loader = new PostLoader();
    }

    $title = $content = $author = "";

    if (isset($_SESSION['title'])) {
        $title = $_SESSION['title'];
    }

    if (isset($_SESSION['message'])) {
        $content = $_SESSION['message'];
    }

    if (isset($_SESSION['author'])) {
        $author = $_SESSION['author'];
    }
}

function saveSessionData()
{
    global $posts_loader, $author, $title, $content;

    $_SESSION['posts'] = $posts_loader;
    $_SESSION['title'] = $title;
    $_SESSION['message'] = $content;
    $_SESSION['author'] = $author;
}

/**
 * Returns true when all values are right,
 * false otherwise
 */
function validatePost()
{
    global $author, $title, $content;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {     //check if coming from form post

        $content = $_POST['message'];
        $title = $_POST['title'];
        $author = $_POST['author'];
        return true;
    }
    return false;
}

/**
 * Creates new post using content coming from user
 */
function createNewPost()
{
    global $posts_loader, $title, $author, $content;

    $posts_loader->createPost($title, $content, $author);
//clear the input values
    $title = $content = $content = "";
}

/**
 * Replaces special characters for smileys
 */
function formatString($txt)
{
    $txt2 = htmlspecialchars($txt);
    $txt2 = str_replace(":-)", '&#x1F642', $txt2);
    return $txt2;
}


loadSessionData();
if (validatePost()) {
    createNewPost();
}
saveSessionData();

//whatIsHappening();

require_once 'index_view.php';

