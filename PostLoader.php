<?php


class PostLoader
{
    /** @var Post[] */
    private array $posts = [];

    public function newPost(string $title, string $content, string $author)
    {
        array_push($this->posts, $this->newPost($title, $content, $author));  //push post with all its properties tot array
            if(count($this->posts) > 20){       //if array is higher than 20
                array_shift($this->posts);  //remove posts past 20
            }
    }

    public function loadAllPosts()
    {
        //open a file
        file_put_contents("", /*data*/);
        //json_decode
        //loop over the data from the file
        //assign each entry to a Post class
    //$data is array
        $data = json_encode('');
        foreach ($data AS $post){
            $this ->posts[] = new Post(['title']);
        }

    }

}