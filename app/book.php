<?php
session_start();
include("includes/conn.php");

$id = $_GET['id'];
$price = $_GET['price'];
$descr = $_GET['descr'];

if (isset($_POST['evaluate'])) {

	$service = $_POST['service'];
	$price = $_POST['price'];
	$time = $_POST['time'];
	$date = $_POST['date'];
	$tdate = date('Y-m-d');
	$newDate = date("Y-m-d", strtotime($date)); 
	$stat = "new";


	function saverec(){

		global $pdo,$service,$price,$time,$newDate,$tdate,$stat;

		try {

		 			 $save = $pdo->prepare("INSERT INTO bookings(order_stat,date,client,service_ref,s_date,s_time,price) VALUES(?,?,?,?,?,?,?)");
		 			 $save -> bindValue(1,$stat);
		 			 $save -> bindValue(2,$tdate);
		 			 $save -> bindValue(3,$_SESSION['sess_id']);
		 			 $save -> bindValue(4,$service);
		 			 $save -> bindValue(5,$newDate);
		 			 $save -> bindValue(6,$time);
		 			 $save -> bindValue(7,$price);
		 			 $save -> execute();

		 			 echo "<script>window.alert('Record Saved Successfully!!')

		 			 		window.location.href = 'client_bookings.php';

		 			 	</script>";

		 		}catch (PDOException $e) {

			echo $e->getMessage();
			
		}
	}
	
}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Car Hire Management System | Book</title>

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
				<a class="navbar-brand" href="#"><span>Car Hire</span>Booking System</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>  
						<?php 
                                global $pdo;$curr_user = $pdo->prepare("SELECT * FROM clients WHERE phone = ?");
                                    $curr_user->bindValue(1,$_SESSION['sess_id']);
                                    $curr_user->execute();
                                         while($loggeduser = $curr_user->fetch(PDO::FETCH_OBJ)) {
  
                                        echo ucfirst($loggeduser->fname);
                  }
                  ?> 
                  <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="driver_profile.php"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Profile</a></li>
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
			<li class=""><a href="client_main.php"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
			<li class=""><a href="client_bookings.php"><svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg> My Bookings</a></li>
			<li class=""><a href="client_profile.php"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Profile Settings</a></li>

		</ul>
		
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">		
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><i class="glyphicon glyphicon-shopping-cart"></i> Book Service</a> </li>
				
			</ol>
		</div><!--/.row-->
		
	<!--/.row-->
									
		<div class="row">
			
		</div><!--/.row-->
		
		<br/>

			<div class="row">
			<div class="col-md-6">
			<div class="panel panel-default">
					<div class="panel-heading"><i class="glyphicon glyphicon-shopping-cart"></i> Place Your Booking </div>
					<div class="panel-body">

					 <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">

				      <div class="form-group has-feedback">
				      <label>Service Ref </label>
				        <input type="text" class="form-control" name="service" value="<?php echo $descr;?>" readonly >
				        
				      </div>
				       <div class="form-group has-feedback">
				      <label>Price</label>
				        <input type="text" class="form-control" name="price" value="<?php echo $price;?>" readonly >
				        
				      </div>

				      <div class="form-group has-feedback">
				      <label>Date</label>
				     <input type="date" name="date" class="form-control" pattern="\d{1,2}-\d{1,2}-\d{4}" required>
                    </div>

                      <div class="form-group has-feedback">
				      <label>Time</label>
				      <input type="time" data-mode="12h" class="form-control" name="time" required>
                    </div>
                    
                     <div class="form-group has-feedback">

          				<button type="submit" name="evaluate" class="btn btn-primary btn-block btn-flat">Save Record</button>
        			</div>
				      		     
    			</form>
    			<?php if (isset($_POST['evaluate'])) {saverec();}?>
				
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
