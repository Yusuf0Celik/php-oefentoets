<?php

try {
  $dbhost = 'localhost';
  $dbname = 'school';
  $db_username = 'root';
  $db_password = '';

  $db = new PDO("mysql:host=$dbhost;dbname=$dbname", "$db_username", "$db_password");
} catch (PDOException $e) {
  die ("Error!: " . $e->getMessage());
}