<?php
class Message {
    // Properties
    private $body;
    private $author;
    private $date;
  
    // Methods
    function set_name($name) {
      $this->name = $name;
    }
    function get_name() {
      return $this->name;
    }
}
?>