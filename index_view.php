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
    <ul>
    <?php foreach ($posts_loader->getLatestPosts() AS $post){ ?>
        <li><?php echo  formatString($post->getAuthor()); ?> said: <?php echo formatString($post->getTitle()); ?><br/>
            <?php echo  formatString($post->getContent()); ?><br/>
            <?php echo $post->getDate()->format('Y-m-d H:i:s'); ?></li>
    <?php } ?>
    </ul>
</div>
</body>
</html>
