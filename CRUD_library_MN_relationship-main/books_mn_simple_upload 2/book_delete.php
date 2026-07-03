<?php
require "db.php";
require "functions.php";
$id = $_GET["id"];
deleteBook($sql, $id);
header("Location: index.php");
?>
