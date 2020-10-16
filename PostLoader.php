<?php

/**
 * Handles multiple posts at the same time, saves them to a file
 */
class PostLoader
{
    /** @var Post[] */
    private array $posts = [];
    private string $file_name = 'posts.json';

    public function __construct()
    {
        //echo "new post loader <br/>";
    }

    public function createPost(string $title, string $content, string $author)
    {
        $post = new Post($title, new DateTimeImmutable(), $content, $author);
        //echo $post . "<br/>";
        //echo count($this->posts) . "<br/>";
        array_unshift($this->posts, $post);     //array_unshift — Prepend one or more elements to the beginning of an array
        //echo count($this->posts) . "<br/>";
        $this->saveAllPosts();
    }

    /**
     * return all loaded posts
     * @return Post[]
     */
    public function getPosts()
    {
        return $this->posts;
    }

    public function getLatestPosts()
    {
        //echo "getLatestPosts() ${count($this->posts)}";
        if (count($this->posts) == 0) {
            $this->loadAllPosts();
        }

        return array_slice($this->posts, 0, 20); //array_slice — Extract a slice of the array to get the 20 we want

    }

    /**
     * Load all old content from a file and return json array with objects
     */
    public function loadAllPosts()
    {
        //echo 'loadAllPosts()<br/>';
        if (file_exists($this->file_name)) {
            //open a file
            $content = file_get_contents($this->file_name);
            //json_decode                               //always store in vars
            $content_json = json_decode($content);
            //loop over the data from the file
            //assign each entry to a Post class
            $this->posts = [];      //empties posts array to avoid duplication
            foreach ($content_json as $post) {
                $this->posts[] = new Post(
                    $post->title,
                    new DateTimeImmutable($post->date), //convert json string to post
                    $post->content,
                    $post->author);
            }

        }
    }

    public function saveAllPosts()
    {
        $content = json_encode($this->posts);
        file_put_contents($this->file_name, $content);


    }

}