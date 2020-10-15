<?php


class Post
{
    private string $title;
    private DateTimeImmutable $date;
    private string $content;
    private string $author;


    public function __construct(string $title, DateTimeImmutable $date, string $content, string $author)
    {
        $this->title = $title;
        $this->date = $date;
        $this->content = $content;
        $this->author = $author;
    }


    public function getTitle(): string
    {
        return $this->title;
    }


    public function getDate(): DateTimeImmutable
    {
        return $this->date;
    }


    public function getContent(): string
    {
        return $this->content;
    }


    public function getAuthor(): string
    {
        return $this->author;
    }


}
