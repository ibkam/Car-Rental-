<?php
session_start();

include("includes/conn.php");

if (isset($_POST['search'])) {

	$id = $_POST['id'];

	header("location:client_result.php?id=".$id."");
}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
 <title>Car Wash System | Dashboard </title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">

<!--Icons-->
<script src="js/lumino.glyphs.js"></script>

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>  
						<?php 
                                global $pdo;$curr_user = $pdo->prepare("SELECT * FROM users WHERE username = ?");
                                    $curr_user->bindValue(1,$_SESSION['sess_id']);
                                    $curr_user->execute();
                                         while($loggeduser = $curr_user->fetch(PDO::FETCH_OBJ)) {
  
                                        echo ucfirst($loggeduser->user_type);
                  }
                  ?> 
                  <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="admin_profile.php"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Profile</a></li>
							<li role="presentation" class="divider"></li>
							<li><a href="logout.php"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
			<div class="form-group">
			
				<input type="text" class="form-control" value="<?php $date = new DateTime('now', new DateTimeZone('Africa/Nairobi'));
				$dayDate = $date->format("d F Y"); echo $dayDate; ?>" readonly>
			</div>
		</form>
		<ul class="nav menu">
			<li class="active"><a href="admin_home.php"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
			<li class="parent ">
				<a href="#">
					<span data-toggle="collapse" href="#sub-item-1"><svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg> Customer Orders</span></a>
				<ul class="children collapse" id="sub-item-1">
					<li>
						<a class="" href="customer_orders.php">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> New Orders
						</a>
					</li>
					<li>
						<a class="" href="completed_orders.php">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Completed Orders
						</a>
					</li>
					
				</ul>
			</li>
			<li class=""><a href="add_service.php"><i class="glyphicon glyphicon-tags"></i>&nbsp;&nbsp;&nbsp;  New Vehicle</a></li>
			<li class=""><a href="payments.php"><i class="glyphicon glyphicon-credit-card"></i>&nbsp;&nbsp;&nbsp;  Payments</a></li>
			<li class=""><a href="new_admin.php"><i class="glyphicon glyphicon-user"></i>&nbsp;&nbsp;&nbsp;  New Admin</a></li>
			<li class=""><a href="new_admin.php"><i class="glyphicon glyphicon-user"></i>&nbsp;&nbsp;&nbsp;  Reports</a></li>
			
			

		</ul>
		
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">		
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a> </li>
				
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
			<br/>
			<div class="alert bg-warning" role="alert">
					<svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"></use></svg><?php 
                                global $pdo;$curr_user = $pdo->prepare("SELECT * FROM users WHERE username = ?");
                                  //  $curr_user->bindValue(1,$_SESSION['sess_id']);
                                    $curr_user->execute();
                                         while($loggeduser = $curr_user->fetch(PDO::FETCH_OBJ)) {
  
                                        echo ucfirst($loggeduser->user_type);
                  }
                  ?>, Welcome to the administrator's dashboard <a href="" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
				</div>
				
			</div>
		</div>
									
		<div class="row">
			
		</div><!--/.row-->


		 <div class="row top_tiles">
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="glyphicon glyphicon-user"></i></div>
                  <div class="count"><?php 
                                global $pdo;$curr_user = $pdo->prepare("SELECT * FROM clients");
                                    //$curr_user->bindValue(1,$_SESSION['sess_id']);
                                    $curr_user->execute();
                                    $rows = $curr_user->rowCount();
                                         
                                         echo $rows;
                  ?></div>
                  <h3>Registered Clients</h3>
                  
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="glyphicon glyphicon-shopping-cart"></i></div>
                  <div class="count"><?php 
                                global $pdo;$curr_user = $pdo->prepare("SELECT * FROM bookings WHERE order_stat = 'new'");
                                    //$curr_user->bindValue(1,$_SESSION['sess_id']);
                                    $curr_user->execute();
                                    $rows = $curr_user->rowCount();
                                         
                                         echo $rows;
                  ?></div>
                  <h3>New Orders</h3>
                  
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="glyphicon glyphicon-shopping-cart"></i></div>
                  <div class="count"><?php 
                                global $pdo;$curr_user = $pdo->prepare("SELECT * FROM bookings WHERE order_stat = 'settled'");
                                   // $curr_user->bindValue(1,$_SESSION['sess_id']);
                                    $curr_user->execute();
                                    $rows = $curr_user->rowCount();
                                         
                                         echo $rows;
                  ?></div>
                  <h3>Completed Orders</h3>
                  
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="glyphicon glyphicon-tags"></i></div>
                  <div class="count"><?php 
                                global $pdo;$curr_user = $pdo->prepare("SELECT * FROM vehicles");
                                 //   $curr_user->bindValue(1,$_SESSION['sess_id']);
                                    $curr_user->execute();
                                    $rows = $curr_user->rowCount();
                                         
                                         echo $rows;
                  ?></div>
                  <h3>Registered Vehicles</h3>
                  
                </div>
              </div>
              
            </div>
		<br/>
		<div class="row">
			<div class="col-md-12">
			<div class="panel panel-default">
					<div class="panel-body">
					<div class="col-md-4">
					<br/>
					<form role="search" action="<?php $_SERVER['PHP_SELF']?>" method="POST">
							<div class="form-group">
								<input type="text" name="id" class="form-control" placeholder="Search customers" autofocus>
							</div>	
					</div>
						<div class="col-md-2">
						<br/>
							<button type="submit" name="search" class="btn btn-primary btn-block btn-flat">Go</button>
							</div>
					</form>
					</div>	
					</div>
				</div>
			
			
				
			</div>

			<div class="row">
			<div class="col-md-12">
			<div class="panel panel-default">
					<div class="panel-heading"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>Registered Customers</div>
					<div class="panel-body">
					<?php
					global $pdo,$user;
			$order=$pdo->prepare("SELECT * FROM clients ORDER BY id DESC");
			$order->bindValue(1,$user);		
			$order->execute();
			$rows=$order->rowCount();
		 	
			echo "<table cellpadding='0' cellspacing='0' border='0' class='table table-striped table-bordered'><thead><tr><th>#</th><th>Name</th><th>ID No</th><th>Email </th><th>Phone No</th><th></th></tr></thead>";

		 	 while($rows = $order->fetch(PDO::FETCH_ASSOC)){

		 			 $ref =  $rows['id'];
					 $name = $rows['fname'];
					// $gender=$rows['gender'];
		 			 $id_no = $rows['id_no'];
		 			 $email = $rows['email'];
		 			 $phone = $rows['phone'];
           
		 			
					
		 			
echo "<tbody><tr><td>".$ref."</td><td>".$name."</td><td>".$id_no."</td><td>".$email."</td><td>".$phone."</td></td><td><a href='client_book.php?id=".$id_no."' data-rel='collapse'><i class='glyphicon glyphicon-shopping-cart'></i> view orders</a></td></tr></tbody>";

		 	 	}
					echo "</table>";
					
					?>
					</div>
				</div>
			
			
				
			</div>

			<div class="col-md-12">
			<div class="panel panel-default">
					<div class="panel-heading"><i class=""></i> Registered Vehicles</div>
					<div class="panel-body">
					<?php
					global $pdo,$user;
			$order=$pdo->prepare("SELECT * FROM vehicles ORDER BY id ASC");
			$order->bindValue(1,$user);		
			$order->execute();
			$rows=$order->rowCount();
		 	
			echo "<table cellpadding='0' cellspacing='0' border='0' class='table table-striped table-bordered'><thead><tr><th>#</th><th>Type</th><th>Model</th><th>Color</th><th>Engine/Horse Power</th><th>Plate #</th><th>Service Price</th></tr></thead>";

		 	 while($rows = $order->fetch(PDO::FETCH_ASSOC)){

		 			 $ref =  $rows['id'];
					 $type =  $rows['type'];
					 $model =  $rows['model'];
					 $color =  $rows['color'];
					 $engine =  $rows['engine'];
					 $plate =  $rows['plate'];
					 $price =  $rows['price'];
		 			 
           
		 			
					
		 			
echo "<tbody><tr><td>".$ref."</td><td>".$type."</td><td>".$model."</td><td>".$color."</td><td>".$engine."</td><td>".$plate."</td><td>".$price."</td><td><a href='edit_service.php?id=".$ref."&price=".$price."&descr=".$plate."' data-rel='collapse'><i class='glyphicon glyphicon-edit'></i></a></td><td><a href='remove_service.php?id=".$ref."' data-rel='collapse'><i class='glyphicon glyphicon-trash'></i></a></td></tr></tbody>";

		 	 	}
					echo "</table>";
					
					?>
					<!DOCTYPE html>
<html>
<body>

<p>Click the button to print the Reports.</p>

<button onclick="myFunction()">Print Reports Here</button>

<script>
function myFunction() {
  window.print();
}
</script>

</body>
</html>

					</div>
				</div>
			
			
				
			</div>
			
					<div class="col-md-12">
			<div class="panel panel-default">
					<div class="panel-heading"><i class="glyphicon glyphicon-user"></i> Administrators</div>
					<div class="panel-body">
					<?php
					global $pdo,$user;
			$order=$pdo->prepare("SELECT * FROM users WHERE user_type = 'admin' ORDER BY id ASC");
			$order->bindValue(1,$user);		
			$order->execute();
			$rows=$order->rowCount();
		 	
			echo "<table cellpadding='0' cellspacing='0' border='0' class='table table-striped table-bordered'><thead><tr><th>#</th><th>Mobile Phone</th><th></th><th></th></tr></thead>";

		 	 while($rows = $order->fetch(PDO::FETCH_ASSOC)){

		 			 $ref =  $rows['id'];
					 $descr = $rows['username'];
		 			 
		 			 
           
		 			
					
		 			
echo "<tbody><tr><td>".$ref."</td><td>".$descr."</td><td><a href='edit_admin.php?id=".$ref."&user=".$descr."' data-rel='collapse'><i class='glyphicon glyphicon-edit'></i></a></td><td><a href='remove_admin.php?id=".$ref."' data-rel='collapse'><i class='glyphicon glyphicon-trash'></i></a></td></tr></tbody>";

		 	 	}
					echo "</table>";
					
					?>
					
					</div>
				</div>
			
			
				
			</div><!--/.col-->
			
			<!--/.col-->
		</div><!--/.row-->
	</div>	<!--/.main-->

	
		  

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script>
		$('#calendar').datepicker({
		});

		!function ($) {
		    $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
		        $(this).find('em:first').toggleClass("glyphicon-minus");      
		    }); 
		    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	
</body>

</html>
