<?php

/**
 * Class Post stores user post
 */
class Post implements JsonSerializable  //use implements JsonSerializable to be able to use private properties, because otherwise getting error
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

    public function __toString()      //The __toString() method allows a class to decide how it will react when it is treated like a string. For example, what echo $obj; will print.
    {                                //This method must return a string, as otherwise a fatal E_RECOVERABLE_ERROR level error is emitted.
        return json_encode($this);
    }

    public function jsonSerialize()  //Objects implementing JsonSerializable can customize their JSON representation when encoded with json_encode().
    {
        return
            [
                'title' => $this->getTitle(),
                'content' => $this->getContent(),
                'date' => $this->getDate()->format(DateTimeInterface::ISO8601),
                'author' => $this->getAuthor()
            ];
    }


}
