<?php
session_start();
require_once('index.php');

include("includes/conn.php");

$id = $_GET['id'];
$plate = $_GET['plate'];


if (isset($_POST['save'])) {

    $name = $_POST['name'];
    $id_pass = $_POST['id_pass'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $order_stat = "new";
    $veh_id = $_POST['id'];
	$day =  $_POST['day'];
	$end =  $_POST['end'];
	$start =  $_POST['start'];

    function saveclient(){

        global $pdo,$name,$id_pass,$email,$mobile,$start,$end,$day;

        try {

          $saveclient = $pdo->prepare("INSERT INTO ondemand(fname,id_no,email,phone) VALUES(?,?,?,?)");
		  
          $saveclient -> bindValue(1,$name);
          $saveclient -> bindValue(2,$id_pass);
          $saveclient -> bindValue(3,$email);
          $saveclient -> bindValue(4,$mobile);
		  
		  
          $saveclient -> execute();

          saveorder();


        } catch (PDOException $e) {

            echo $e->getMessage();
            
        }
    }

    function saveorder(){

        global $pdo,$id_pass,$order_stat,$veh_id,$start, $end,$day;

        try {

            $saveorder = $pdo->prepare("INSERT INTO bookings(order_stat,veh_id,client,time,date,days) VALUES(?,?,?,?,?,?)");
            $saveorder -> bindValue(1,$order_stat);
            $saveorder -> bindValue(2,$veh_id);
            $saveorder -> bindValue(3,$id_pass);
			$saveorder -> bindValue(4,$time);
		 	$saveorder -> bindValue(5,$date);
			$saveorder -> bindValue(6,$day);
            $saveorder -> execute();

             echo "<script>window.alert('Your Order Has Been Received Successfull & Waits For Approval');

                    window.location.href = 'index.php';

                    </script>";
		
            
        } catch (PDOException $e) {

            echo $e->getMessage();
            
        }
    }

   
      
        
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Car Wash System ::. Vehicle Details</title>

    <!-- Bootstrap Core CSS -->
    <link href="index files/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="index files/css/shop-item.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


    <!-- Start WOWSlider.com HEAD section --> <!-- add to the <head> of your page -->
    <link rel="stylesheet" type="text/css" href="engine0/style.css" />
    <script type="text/javascript" src="engine0/jquery.js"></script>
    <script src="src/facebox.js" type="text/javascript"></script>
    <!-- End WOWSlider.com HEAD section --></head>
<style type="text/css">
    


</style>
<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <b><a class="navbar-brand" href="index.php"> Car Hire System</a></b>
            </div>
            
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">

                     <li>
                        <a href="app/register.php">About Us</a>
                    </li>
                    <li>
                        <a href="">Contact Us</a>
                    </li>
                    <li>
                        <a href="app/login.php">Log In</a>
                    </li>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
<br/>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            
            <div class="col-md-5">
                 <div class="list-group">

                <div class="panel panel-default">
                    
                    <div class="panel-body">
                    <div class="row no-padding">
                        
                        <div class="col-sm-9 col-lg-7 widget-right">
                            <div class="img-responsive"><img height="300" width="350" src="app/img/<?php 
                                global $id,$pdo;$curr_user = $pdo->prepare("SELECT * FROM vehicles WHERE id = ?");
                                    $curr_user->bindValue(1,$id);
                                    $curr_user->execute();
                                         while($loggeduser = $curr_user->fetch(PDO::FETCH_OBJ)) {
  
                                        echo ucfirst($loggeduser->img);
                  }
                  ?>." >
                            </div>
                    </div>
                </div>
                    
                </div>

                 </div>
                    
                </div>
        </div>

        <div class="col-md-6" style="margin-left:73px;">
                 <div class="list-group">
                <div class="list-group">
                    <a href="" class="list-group-item active"><i class="glyphicon glyphicon-user"></i> Customer Details</a>
                     <form role="form" action="<?php $_SERVER['PHP_SELF']?>" method="POST" >

                            <div class="form-group">
                                
                                <input class="form-control" type="hidden" name="id" value="<?php echo $id; ?>">

                         
                            </div>

                            <div class="form-group">
                                <label>Full Name</label>
                                <input class="form-control"  type="text" name="name" required>
								
								
                                
                            </div>
                            <div class="form-group">
                                <label>ID/Passport Number</label>
                                <input class="form-control"  type="number" minlength="8" name="id_pass" required>
                                
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control"  type="email" name="email" required>
                                
                            </div>

                             <div class="form-group">
                                <label>Phone Number</label>
                                <input class="form-control"  type="number" minlength="10" name="mobile" required>

                            </div>
                             <div class="form-group">
                                <label>Registration Number</label>
                                <input type="Reg No" class="form-control"   minlength="10" name="Reg No">
                                  
                            </div>

                             <div class="form-group">
                                <label>time</label>
                                <input type="time" class="form-control"   minlength="5" name="time">
								  
                            </div>

                             <div class="form-group">
                                <label>date</label>
                                 <input type="date" class="form-control"   minlength="5" name="date">
								  
                            </div>

                             <div class="form-group">
                                <label>Days</label>
                                <input class="form-control"  type="number" minlength="10" name="day">
                                
                                
                                
                         
                            <button type="submit" name="save" class="btn-block btn-primary"><i class="glyphicon glyphicon-shopping-cart"></i> &nbsp; Book Service</button>
                           

                        </form>
						
                         <?php if (isset($_POST['save'])) { saveclient();}?>
                    
                </div>
                </div>
                    
                </div>

        <div class="col-md-5">

        <div class="list-group">

        <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">

                <div class="list-group">
                      
                    <a href="" class="list-group-item"><b>Add Ref # :</b> &nbsp; &nbsp;<?php 
                                global $pdo,$id;

                                    $curr_user = $pdo->prepare("SELECT * FROM vehicles WHERE id = ?");
                                    $curr_user->bindValue(1,$id);
                                    $curr_user->execute();

                                         while($loggeduser = $curr_user->fetch(PDO::FETCH_OBJ)) {
  
                                        echo ucfirst($loggeduser->id);
                  }
                  ?></a>
                    <a href="" class="list-group-item"><b>Vehicle Type :</b> &nbsp; &nbsp;<?php 
                                global $pdo,$id;

                                    $curr_user = $pdo->prepare("SELECT * FROM vehicles WHERE id = ?");
                                    $curr_user->bindValue(1,$id);
                                    $curr_user->execute();

                                         while($loggeduser = $curr_user->fetch(PDO::FETCH_OBJ)) {
  
                                        echo ucfirst($loggeduser->type);
                  }
                  ?></a>
                    <a href="" class="list-group-item"><b>Vehicle Model : </b>&nbsp; &nbsp;<?php 
                                global $pdo,$id;

                                    $curr_user = $pdo->prepare("SELECT * FROM vehicles WHERE id = ?");
                                    $curr_user->bindValue(1,$id);
                                    $curr_user->execute();

                                         while($loggeduser = $curr_user->fetch(PDO::FETCH_OBJ)) {
  
                                        echo ucfirst($loggeduser->model);
                  }
                  ?></a>
                    <a href="" class="list-group-item"><b>Colour :</b> &nbsp; &nbsp;<?php 
                                global $pdo,$id;

                                    $curr_user = $pdo->prepare("SELECT * FROM vehicles WHERE id = ?");
                                    $curr_user->bindValue(1,$id);
                                    $curr_user->execute();

                                         while($loggeduser = $curr_user->fetch(PDO::FETCH_OBJ)) {
  
                                        echo ucfirst($loggeduser->color);
                  }
                  ?></a>
                    <a href="" class="list-group-item"><b>Engine / Horse Power :</b> &nbsp; &nbsp;<?php 
                                global $pdo,$id;

                                    $curr_user = $pdo->prepare("SELECT * FROM vehicles WHERE id = ?");
                                    $curr_user->bindValue(1,$id);
                                    $curr_user->execute();

                                         while($loggeduser = $curr_user->fetch(PDO::FETCH_OBJ)) {
  
                                        echo ucfirst($loggeduser->engine);
                  }
                  ?></a>
                    <a href="" class="list-group-item"><b>Plate # : </b>&nbsp; &nbsp;<?php 
                                global $pdo,$id;

                                    $curr_user = $pdo->prepare("SELECT * FROM vehicles WHERE id = ?");
                                    $curr_user->bindValue(1,$id);
                                    $curr_user->execute();

                                         while($loggeduser = $curr_user->fetch(PDO::FETCH_OBJ)) {
  
                                        echo ucfirst($loggeduser->plate);
                  }
                  ?></a>
                  
                   <a href="" class="list-group-item"><b>Service Price :</b> &nbsp; &nbsp;<?php 
                                global $pdo,$id;

                                    $curr_user = $pdo->prepare("SELECT * FROM vehicles WHERE id = ?");
                                    $curr_user->bindValue(1,$id);
                                    $curr_user->execute();

                                         while($loggeduser = $curr_user->fetch(PDO::FETCH_OBJ)) {
  
                                        echo ucfirst($loggeduser->price);
                  }
                  ?> </a>
                  
                   <a href="" class="list-group-item"><b>Any other Service:</b> &nbsp; &nbsp;<?php 
                                global $pdo,$id;

                                    $curr_user = $pdo->prepare("SELECT * FROM vehicles WHERE id = ?");
                                    $curr_user->bindValue(1,$id);
                                    $curr_user->execute();

                                         while($loggeduser = $curr_user->fetch(PDO::FETCH_OBJ)) {
  
                                        echo ucfirst($loggeduser->Any);
                  }
                  ?> </a>
                    </form>
                </div>
                </div>

                 
        </div>

        

                 </div>
                    
     </div>
       
<br/>
    <!-- /.container -->
      

    <div class="container">

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; <?php echo date('Y');?> Car Wash Management  System &nbsp;&nbsp; | &nbsp;&nbsp; Designed & Developed By <a href="">DAVID NGINYO</a>&nbsp;&nbsp; | &nbsp;&nbsp; <a href="">Site</a> </p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
