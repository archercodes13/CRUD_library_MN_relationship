<?php
require "db.php";
require "functions.php";
$book_id = $_GET["book_id"];
$genre_id = $_GET["genre_id"];
deleteBookGenre($sql, $book_id, $genre_id);
header("Location: book_genres.php?id=" . $book_id);
?>
