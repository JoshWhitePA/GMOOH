<?php

    // Create connection
    class SQLConnection{
      public function connect($servername, $username, $password){
        $conn = new mysqli($servername, $username, $password);
      }
      
    }

 ?>
