<?php
    
try{
    $bdd = new PDO('mysql:host='.(getenv('MYSQL_HOST') ?: 'localhost').';dbname=mini_chat_arnaud;charset=utf8', 'root', '');
}
catch (PDOException $e) {
        die('Error' . $e->getMessage());
}

?>