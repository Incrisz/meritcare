<?php
$server = 'localhost';
$username = 'meritcar_formbuilder';
$password = '11NCrease@@';
$database = 'meritcar_formbuilder';

try{
	$conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch(PDOException $e){
	die( "Connection failed: " . $e->getMessage());
}