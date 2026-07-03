<?php
$sql = new PDO("mysql:host=localhost;dbname=books_mn;charset=utf8", "root", "root");
$sql->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
?>
