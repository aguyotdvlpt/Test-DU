<?php


define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DB', 'document_unique');


try {
$db = new PDO('mysql:host='.HOST.';dbname='.DB.';charset=utf8', USER, PASS , [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, //Active les erreurs SQL
]);

} catch (Exception $e) {
    echo $e->getMessage(); // On récupère le message de l'exception
    echo '<img src="img/confused-travolta-50.gif" />';
}