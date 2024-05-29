<?php

try{ 

$pdo = New PDO("mysql:dbhost=127.0.0.1;dbname=car_hire","root","");	

} catch (PDOException $e) {

	echo $e->getMessage();
	
}
?>