<?php


class Post
{
    private string $title;
    private DateTime $date;
    private string $content;
    private string $author;

    public function __construct(string $title, DateTime $date, string $content, string $author)
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


    public function setTitle(string $title): void
    {
        $this->title = $title;
    }
    

    public function getDate(): DateTime
    {
        return $this->date;
    }


    public function setDate(DateTime $date): void
    {
        $this->date = $date;
    }


    public function getContent(): string
    {
        return $this->content;
    }


    public function setContent(string $content): void
    {
        $this->content = $content;
    }


    public function getAuthor(): string
    {
        return $this->author;
    }


    public function setAuthor(string $author): void
    {
        $this->author = $author;
    }


}
