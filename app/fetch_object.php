<?php
include("includes/conn.php");

if (isset($_POST['mistake'])) {

	$mistake = $_POST['mistake'];

	$object = $pdo->prepare("SELECT * FROM mistakes WHERE mistake_descr = ?");
	$object -> bindValue(1,$mistake);
	$object -> execute();

	while($obj = $object->fetch(PDO::FETCH_OBJ)) {
  
                     echo ucfirst($obj->pnts);
                  }
		}
?>