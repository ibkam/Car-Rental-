<?php
session_start();
include("includes/conn.php");

$user = $_SESSION['sess_id'];

    try {
        
    $Login = $pdo->prepare("SELECT * FROM users WHERE username = ? ");
    $Login -> bindValue(1,$user);
   
    $Login -> execute();

    $rows=$Login->rowCount();
   		
   		while($rows = $Login->fetch(PDO::FETCH_ASSOC)) {

      		$id = $rows['id'];


    		}
	 } catch (PDOException $e) {

        echo $e->getMessage();
        
    }

 if (isset($_POST['update'])) {

  $id = $_POST['id'];
  $password = $_POST['password'];
  $pass = md5($_POST['password']);
 
  

 function checkempty(){

     global $password;

     if (empty($password)) {

       echo "<script>window.alert('Please Enter Password');</script>";

     }else{
       
       savedata();
     }


  }

  function savedata(){

    global $pdo,$id,$pass;

    try {

      $registerdriver = $pdo->prepare("UPDATE users SET password = ? WHERE id = ?");
      $registerdriver -> bindValue(1,$pass);
      $registerdriver -> bindValue(2,$id);
     
      $registerdriver -> execute();

     echo "<script>window.alert('Profile Updated Successfully');

            window.location.href='admin_home.php';

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
 <title>Car Hire System| Client Profile</title>

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
							<li><a href="#"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Profile</a></li>
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
			<li class=""><a href="admin_home.php"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
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
			<li class=""><a href="add_service.php"><i class="glyphicon glyphicon-tags"></i>&nbsp;&nbsp;&nbsp;  New Service</a></li>
			<li class=""><a href="payments.php"><i class="glyphicon glyphicon-credit-card"></i>&nbsp;&nbsp;&nbsp;  Payments</a></li>
			<li class=""><a href="new_admin.php"><i class="glyphicon glyphicon-user"></i>&nbsp;&nbsp;&nbsp;  New Admin</a></li>
			

		</ul>
		
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">		
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>  User Profile</a></li>
				
			</ol>
		</div><!--/.row-->
		
									
		<div class="row">
			
			<div class="col-xs-12 col-md-6 col-lg-6">
			
			<div class="panel-heading"><strong><center>Update My Profile</center></strong></div>
				 <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">

				      
				      <div class="form-group has-feedback">
				     
				        <label>User ID</label>
				        <input type="text" class="form-control"  name="id" value="<?php echo $id;?>" readonly>
				       
				      </div>
				       <div class="form-group has-feedback">
				       <label>Enter New Password</label>
				     
				        <input type="password" class="form-control" minlength="8" name="password" placeholder="Enter New Password" autofocus >
				       
				      </div>
				       <div class="form-group has-feedback">
          				<button type="submit" name="update" class="btn btn-primary btn-block btn-flat">Update Profile</button>
        			</div>
				      
				     
    			</form>
    			<?php if (isset($_POST['update'])) { checkempty();}?>
			</div>
		
			</div>
		</div><!--/.row-->
		<!--/.row-->
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
