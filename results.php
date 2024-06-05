
<?php

include("includes/conn.php");

$id = $_GET['id'];

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Home ::. Car Hire </title>

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
                <b><a class="navbar-brand" href="index.php">Car Hire System</a></b>
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

            <br/> <br/>
            <div class="col-md-12">
                <b>Search Results</b><br/><br/>
                <div class="list-group">

                <div class="">
                    
                    <div class="">
                    <?php
                    global $pdo,$user;
                    $order=$pdo->prepare("SELECT * FROM  vehicles WHERE type  LIKE '%".$id."%' OR model LIKE '%".$id."%' OR color LIKE '%".$id."%' OR price LIKE '%".$id."%' ORDER BY id DESC");
                            
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
                        <br />
                        <br />
                                   
        

        </div>
       

    </div>
     </div>

    <!-- /.container -->

    <div class="container">

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; <?php echo date('Y');?> Real Estate &nbsp;&nbsp; | &nbsp;&nbsp; Designed & Developed By <a href="">Imperial Wizard Systems</a>&nbsp;&nbsp; | &nbsp;&nbsp; <a href="">Site Admin</a> </p>
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
