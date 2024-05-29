<?php
session_start();
include("includes/conn.php");


if (isset($_POST['submitt'])) {


	$type = $_POST['type'];
	$model = $_POST['model'];
	$color = $_POST['color'];
	$engine = $_POST['engine'];
	$plate = $_POST['plate'];
	$price = $_POST[' service price'];
	$img = $_FILES['pic']['name'];
	$location = $_FILES['pic']['tmp_name'];
	$status = "available";
	
	

	function checkempty(){

		global $pdo,$type,$model,$color,$engine,$plate,$price;
 
		if (empty($type) || empty($model) || empty($color) || empty($engine) || empty($plate) || empty($price)) {
			
			echo "<script>window.alert('Please Fill All Fields');</script>";

		}else{

			save();
		}


	}

	function save(){

		global $pdo,$type,$model,$color,$engine,$plate,$price,$img,$status;

		try {

			$save = $pdo->prepare("INSERT INTO vehicles(status,type,model,color,engine,plate,price,img) VALUES(?,?,?,?,?,?,?,?)");
			$save -> bindValue(1,$status);
			$save -> bindValue(2,$type);
			$save -> bindValue(3,$model);
			$save -> bindValue(4,$color);
			$save -> bindValue(5,$engine);
			$save -> bindValue(6,$plate);
			$save -> bindValue(7,$price);
			$save -> bindValue(8,$img);
			$save -> execute();
			uploadpic();

			
		} catch (PDOException $e) {

			echo $e->getMessage();
			
		}

		

	}

	function uploadpic(){

        global $img,$location;

        $newLocation = 'img/';
        move_uploaded_file($location,$newLocation.$img);

         echo "<script>window.alert('Record Added Successfully!!');


            window.location.href = 'admin_home.php';

                </script>";


    }
	
}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Car Wash Management  System | Services </title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">


<!--Icons-->
<script src="js/lumino.glyphs.js"></script>
<script src="js/jquery-3.1.1.min.js"></script>



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
			<li class=""><a href="admin_home.php"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>			<li class="parent ">
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
			<li class="active"><a href="add_service.php"><i class="glyphicon glyphicon-tags"></i>&nbsp;&nbsp;&nbsp;  New Service</a></li>
			<li class=""><a href="payment.php"><i class="glyphicon glyphicon-credit-card"></i>&nbsp;&nbsp;&nbsp;  Payment</a></li>
			

		</ul>
		
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">		
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><i class="glyphicon glyphicon-tags"></i>&nbsp;&nbsp; Vehicle Registration</a> </li>
				
			</ol>
		</div><!--/.row-->
		
	<!--/.row-->
									
		<div class="row">
			
		</div><!--/.row-->
		
		<br/>

			<div class="row">
			<div class="col-md-6">
			<div class="panel panel-default">
					<div class="panel-heading"><i class="glyphicon glyphicon-tags"></i> Add  Vehicle service</div>
					<div class="panel-body">

					 <form role="form" action="<?php $_SERVER['PHP_SELF']?>" method="POST" enctype="multipart/form-data">

					 	
				      <div class="form-group has-feedback">
				      <label>Vehicle Type </label>
				        <select class="form-control" name="type">
				        	<option value=""></option>
				        	<option value="wagon">Wagon</option>
				        	<option value="saloon">Saloon</option>
				        	<option value="truck">Truck</option>
				        	<option value="van">Van</option>
				        	<option value="mini van">Mini Van</option>
				        	<option value="suv">SUV</option>
				        	<option value="mini suv">Mini SUV</option>
				        </select>
				        
				      </div>
				      <div class="form-group has-feedback">
				      <label>Vehicle Model </label>
				        <input type="text" class="form-control" name="model" required>
				        
				      </div>
				      
				      <div class="form-group has-feedback">
				      <label>Color </label>
				        <input type="text" class="form-control" name="color" required>
				        
				      </div>
				       <div class="form-group has-feedback">
				      <label>Engine/Horse Power </label>
				        <input type="text" class="form-control" name="engine" required>
				        </div>
				       <div class="form-group has-feedback">
				      <label>Location </label>
				        <input type="text" class="form-control" name="plate" required>
				        
				        
				      </div>
				       <div class="form-group has-feedback">
				      <label>Vehicle Plate # </label>
				        <input type="text" class="form-control" name="plate" required>
				        
				      </div>
				      <div class="form-group has-feedback">
				      <label>Service  Price </label>
				        <input type="number" class="form-control" name="price" required>
				        
				      </div>

				      
                      <div class="form-group has-feedback">

                        <label>Upload Picture</label>
                          <input type="file" name="pic" required>

                          </div>

                    
                     <div class="form-group has-feedback">

          				<button type="submit" name="submitt" class="btn btn-primary btn-block btn-flat">Save Record</button>
        			</div>
				      		     
    			</form>
    			<?php if (isset($_POST['submitt'])) {checkempty();}?>
				
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
