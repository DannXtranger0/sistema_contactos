<?php
try {
  $conn = new PDO("mysql:host=localhost;dbname=sistema_contactos","root","");
  
} catch (PDOException $e) {
  die("PDO Connection Error: " . $e->getMessage());
}