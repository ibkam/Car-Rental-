<?php
session_start();
include("includes/conn.php");
if (isset($_POST['update'])) {
	$order_ref = $_POST['id'];
	$method = $_POST['method'];
	$trans_ref = $_POST['trans_ref'];
	$amnt = $_POST['amnt'];
	$processed_by = $_SESSION['sess_id'];
	$order_stat = "settled";
	


	function saverec(){

		global $pdo,$order_ref,$s_price,$method,$trans_ref,$amnt,$trans_date,$processed_by,$balance;

		try {

		 			 $save = $pdo->prepare("INSERT INTO payments(trans_date,order_ref,amnt_paid,payment_method,processed_by) VALUES(?,?,?,?,?)");
		 			 $save -> bindValue(1,$trans_date);
		 			 $save -> bindValue(2,$order_ref);
		 			 $save -> bindValue(3,$amnt);
		 			 $save -> bindValue(4,$method);	
		 			 $save -> bindValue(5,$processed_by);
		 				
		 			 $save -> execute();

		 			 updateveh();

		 		}catch (PDOException $e) {

			echo $e->getMessage();
			
		}
	}


	function checkmethod(){


		if ($_POST['method'] == "mpesa") {

			echo "<script>window.alert('Please Enter Transaction Ref #');</script>";

		}elseif ($_POST['method'] == "cheque") {

			echo "<script>window.alert('Please Enter Transaction Ref #');</script>";
			
		}else{

			updateorder();
		}
	}

	function updateorder(){

		global $pdo,$order_ref,$s_price,$method,$trans_ref,$amnt,$trans_date,$processed_by,$balance,$order_stat;

		try {

				$updateorder = $pdo->prepare("UPDATE bookings SET order_stat = ? WHERE id = ?");
				$updateorder -> bindValue(1,$order_stat);
				$updateorder -> bindValue(2,$order_ref);
				$updateorder -> execute();

				saverec();
			
			} catch (PDOException $e) {
			
					echo $e->getMessage();
			}


	}

	 function updateveh(){

        global $pdo,$veh_id;

        try {

          $updateveh = $pdo->prepare("UPDATE vehicles SET status = 'hired' WHERE id = ?");
          $updateveh -> bindValue(1,$veh_id);
          $updateveh -> execute();
            
            echo "<script>window.alert('Payment Settled & Vehicle Has Been Serviced Successfull...Click OK To Continue');

                    window.location.href = 'payments.php';

                    </script>";

        } catch (PDOException $e) {

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
  <title>Car Wash System | Payments </title>

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
			<li class=""><a href="admin_home.php"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Client Dashboard</a></li>
			<li class="parent ">
				<a href="#">
					<span data-toggle="collapse" href="#sub-item-1"><svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg> Orders</span></a>
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
			<li class=""><a href="add_service.php"><i class="glyphicon glyphicon-tags"></i>&nbsp;&nbsp;&nbsp;  New Service</a></li>
			<li class="active"><a href="payments.php"><i class="glyphicon glyphicon-credit-card"></i>&nbsp;&nbsp;&nbsp;  Payments</a></li>
			

		</ul>
		
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">		
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><i class="glyphicon glyphicon-credit-card"></i>&nbsp; Payment</a> </li>
				
			</ol>
		</div><!--/.row-->
		
	<!--/.row-->
									
		<div class="row">
			
		</div><!--/.row-->
		
		<br/>

			<div class="row">
			<div class="col-md-6">
			<div class="panel panel-default">
					<div class="panel-heading"><i class="glyphicon glyphicon-credit-card"></i> Settle Payment </div>
					<div class="panel-body">

					 <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
					  <div class="form-group has-feedback">
				      <label>Order Ref # </label>
				        <input type="text" class="form-control" name="id" value="<?php echo $id;?>" readonly >
				        
				      </div>	
				      <div class="form-group has-feedback">
				      
				       <div class="form-group has-feedback">
				     
				     
				      <div class="form-group has-feedback">
				      <label>Payment Method</label>
				     	<select name="method" class="form-control">
				     		<option value=""></option>
				     		<option value="cash">CASH</option>
				     		<option value="mpesa">MPESA</option>
							<option value="cheque">CHEQUE</option>
				     	</select>
                    </div>
                     <div class="form-group has-feedback">
				      <label>Transaction Ref # / Cheque Serial</label>
				      <input type="text" class="form-control" name="trans_ref">
                    </div>
                      <div class="form-group has-feedback">
				      <label>Amount Paid</label>
				      <input type="number" class="form-control" name="amnt" required>
                    </div>
                    
                     <div class="form-group has-feedback">

          				<button type="submit" name="update" class="btn btn-primary btn-block btn-flat">Update Record</button>
        			</div>
				      		     
    			</form>
    			<?php if (isset($_POST['update'])) {checkmethod();}?>
				
					</div>
				</div>
			
			
				
			</div><!--/.col-->
			
			<!--/.col-->
		</div><!--/.row-->
	</div>	<!--/.main-->
		  <p>Click the button to print the Reports.</p>

<button onclick="myFunction()">Print Reports Here</button>

<script>
function myFunction() {
  window.print();
				

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
