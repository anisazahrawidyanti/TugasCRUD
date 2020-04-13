<?php

try {
    $con = new PDO("mysql:host = localhost;dbname=db_apkcrud","root","");
} catch (PDOException $e) {
    echo $e->getMessage();
}

?>
