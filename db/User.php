<?php

    function write ($obj) {
        file_put_contents("../test.txt","Hello World. Testing!");
    }

    function read () {
        return file_get_contents('../test.txt');
    }

    function create ($user) {
       
    }

?>