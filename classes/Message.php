<?php
class Message implements JsonSerializable {
    // Properties
    private $body;
    private $author;
    private $date;
  
    function __construct($author, $body, $date) {
      $this->author = $author;
      $this->body = $body;
      $this->date = $date;
    }

    // Methods
    public function getAuthor() {
      return $this->author;
    }

    public function getBody() {
      return $this->body;
    }

    public function getDate() {
      return $this->date;
    }

    public function jsonSerialize()
    {
        return 
        [
            'author'   => $this->getAuthor(),
            'body' => $this->getBody(),
            'date' => $this->getDate()
        ];
    }
}
?>