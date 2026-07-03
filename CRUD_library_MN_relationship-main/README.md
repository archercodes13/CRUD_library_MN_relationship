# Library Admin

Complete library administration system made with PHP and MySQL.

## Description

This project is a simple library admin system with a many-to-many relationship between books and authors.
One book can have multiple authors and one author can belong to multiple books.

The project uses a join table to connect books and authors.

## Features

* Add books
* Edit books
* Delete books
* Show books in a table
* Add authors
* Edit authors
* Delete authors
* Assign multiple authors to one book
* Show authors for each book
* Many-to-many relationship
* CRUD functions in functions.php
* PDO database connection

## Database Tables

* books
* authors
* book_author

## Technologies

* PHP
* MySQL
* HTML
* CSS
* PDO
* MAMP

## Relationship

This project uses an M:N relationship.

Example:

* One book can have many authors
* One author can write many books

The connection is stored in the `book_author` table.
