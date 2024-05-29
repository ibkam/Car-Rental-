
<?php
session_start();
include("includes/conn.php");

	$id = $_GET['id'];

  	 	global $pdo,$id;
		$addcust = $pdo->prepare("DELETE FROM users WHERE id = ? ");	
		$addcust -> bindValue(1,$id);		
		$addcust -> execute();

							echo "<script>window.alert('Record Deleted Successfully');

									window.location.href = 'admin_home.php';
									</script>";



?>
