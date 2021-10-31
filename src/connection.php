<?php
global $pdo;

try {
  $pdo = new PDO("mysql:dbname=consumo_energia;host=localhost", "root", "");
} catch (PDOException $ex) {
  print $ex->getMessage();
}