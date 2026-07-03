<?php
require "db.php";
require "functions.php";
$id = $_GET["id"];
deleteAuthor($sql, $id);
header("Location: authors.php");
?>
