<?php

define("DBHOST", "localhost");
define("ACCESSNAME","root");
define("DBPASS", "");
define('DBNAME', 'votlink_db');


 $conn=new mysqli(DBHOST,ACCESSNAME,DBPASS,DBNAME);

 if ($conn->connect_error) {
   die('Invalid'.$conn->connection_error);
 }


?>