<?php
session_start();
include("includes/conn.php");

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
 <title>Car wash Management System | Client Dashboard</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">
<link href="index files/css/bootstrap.min.css" rel="stylesheet">

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
				<a class="navbar-brand" href="#"><span>Car Wash </span> Management System</a>
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
							<li><a href="client_profile.php"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Profile</a></li>
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
			<li class="active"><a href="client_main.php"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg>  Client Dashboard</a></li>
			<li class=""><a href="client_profile.php"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Profile Settings</a></li>
			<li class=""><a href="payment.php"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Make  Payments</a></li>
		
			

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
					<svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"></use></svg> Howdy 	<?php 
                                global $pdo;$curr_user = $pdo->prepare("SELECT * FROM clients WHERE phone = ?");
                                    $curr_user->bindValue(1,$_SESSION['sess_id']);
                                    $curr_user->execute();
                                         while($loggeduser = $curr_user->fetch(PDO::FETCH_OBJ)) {
  
                                        echo ucfirst($loggeduser->fname);
                  }
                  ?>, Welcome to the  dashboard <a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
				</div>
				
			</div>
		</div><!--/.row-->
									
	 <li>
                        <a href="app/view_property_detail">Log In</a>
                    </li>
		
		 <div class="container">
         <div class="row">
         <div class="col-md-12">
              

                <div class="panel panel-default">
					
					<div class="panel-body">
					<?php
                    global $pdo,$user;
                    $order=$pdo->prepare("SELECT * FROM vehicles ORDER BY id DESC");
                            
                    $order->execute();
                    $rows=$order->rowCount();
                    
                    $i = 1;
                    

                    while($rows = $order->fetch(PDO::FETCH_ASSOC)){?>


                <div class='col-md-3 portfolio-item'>
                <a href='view_property_detail.php?id=<?php echo $rows['id']?>&plate=<?php echo $rows['plate']?>'>
                    <img class='' width="246" height="150" src='app/img/<?php echo $rows['img']; ?>' alt=''>
                </a>
                <div class="panel panel-default">
                    <div class='panel-body'>
                        <p><b>Type : </b><?php echo $rows['type']; ?></p>
                        <p><b>Model : </b><?php echo $rows['model']; ?></p>
                        <b>Hire Price : </b> Ksh <?php echo $rows['price']; ?>
                    </div>
                </div>    
                 

            </div>

                               
            <?php 
            if($i % 4 === 0) echo "</div><div class='img-responsive'>"; // close and open a div with class row

            $i++; // increment
        } 
        ?> 

					</div>
				</div>
                    
                </div>
            </div>

    

            

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
