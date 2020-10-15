<?php

//handles multiple posts at the same time, saves them to a file

class PostLoader
{
    /** @var Post[] */
    private array $posts = [];

    public function newPost(string $title, string $content, string $author)
    {
        /*array_push($this->posts, new Post($title, $content, $author));  //push post with all its properties tot array

            if(count($this->posts) > 20){       //if array is higher than 20
                array_shift($this->posts);  //remove posts past 20
            }*/
    }

    public function printPost()
    {                                                   //The messages are sorted from new (top) to old (bottom)
        /*for($i = count($this->posts); $i >= 0; $i--){   //that's why -- instead of ++

            echo $this->posts[$i]->getTitle();
        }*/
    }

    public function loadAllPosts()
    {
        //open a file
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