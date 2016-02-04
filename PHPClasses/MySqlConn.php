<?php

    // Create connection
    class SQLConnection{
      $servername = "localhost";
      $username = "username";
      $password = "password";
      public function connect(){
        $conn = new mysqli($servername, $username, $password);
      }
      
    }

 ?>
