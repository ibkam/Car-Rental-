<?php
include("includes/conn.php");
session_start();

$id = $_GET['id'];

		global $pdo,$id;
		$addcust = $pdo->prepare("SELECT * FROM vehicles WHERE id = ? AND status = 'available'");	
		$addcust -> bindValue(1,$id);		
		$addcust -> execute();
		
   			$rows=$Login->rowCount();
    		
    			if ($rows==1)) {

			 			header("location:view_property_detail.php");

			 		}else{

			 				echo "<script>window.alert('Vehicled Is Already Hired...Please Select Another Vehicle');

									window.location.href = 'index.php';

									</script>";

					 }

							
?>