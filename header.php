<!DOCTYPE html>
<html lang="it">
  <head>
    <meta charset=utf-8>
    <title> DEV gestiolus</title>
    <style>
      <?php include("style.css"); ?>
    </style>
  </head>
<body>
<?php
class MyDB extends SQLite3{
  function __construct()
  {
    $this->open('gestiolus.sqlite');
  }
}
$db = new MyDB();  
?>