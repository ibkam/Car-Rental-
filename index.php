
<?php

include("includes/conn.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Car Wash Management System ::. Home </title>

    <!-- Bootstrap Core CSS -->
    <link href="index files/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="index files/css/shop-item.css" rel="stylesheet">

    <!-- Start WOWSlider.com HEAD section -->
<link rel="stylesheet" type="text/css" href="engine1/style.css" />
<script type="text/javascript" src="engine1/jquery.js"></script>
<!-- End WOWSlider.com HEAD section -->
    </head>
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
                <b><a class="navbar-brand" href="index.php"> Car Wash Management System</a></b>
            </div>
            
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">

                    <li>
                        <a href="">About Us</a>
                    </li>
                    <li>
                        <a href="">Contact Us</a>
                    </li>
                    <li>
                        <a href="app/login.php">Log In</a>
                    </li>
                     <li>
                        <a href="app/register.php">Sign Up</a>
                    </li>
                </ul>
                
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <div class="container">

        <div class="row">


            <div class="col-md-12">
                 
<!-- Start WOWSlider.com BODY section -->
<div id="wowslider-container1">
<div class="ws_images"><ul>
        <li><img src="data1/images/2012toyotavitzlk.jpg" alt="WE HAVE WIDE RANGE OF VEHICLES FROM :" title="WE HAVE WIDE RANGE OF VEHICLES FROM :" id="wows1_0"/></li>
        <li><img src="data1/images/2016toyotalandcruiserfaceliftfront.jpg" alt="HIGH-CLASS VEHICLES" title="HIGH-CLASS VEHICLES" id="wows1_1"/></li>
        <li><img src="data1/images/8789987.jpg" alt="" title="" id="wows1_2"/></li>
        <li><img src="data1/images/b17_zfrev_fl2_0202_b.png" alt="MIDDLES-CLASS VEHICLES" title="MIDDLES-CLASS VEHICLES" id="wows1_3"/></li>
        <li><img src="data1/images/b17_zfrev_rl1_0202_b.png" alt="" title="" id="wows1_4"/></li>
        <li><img src="data1/images/btinoffers.jpg" alt="SPORTS CARS" title="SPORTS CARS" id="wows1_5"/></li>
        <li><img src="data1/images/cq5dam.resized.img.1680.large.time1494498754824.jpg" alt="" title="" id="wows1_6"/></li>
        <li><img src="data1/images/cq5dam.resized.img.1680.large.time1494498755031.jpg" alt="" title="" id="wows1_7"/></li>
        <li><img src="data1/images/doubleeightlc2002016up.jpg" alt="" title="" id="wows1_8"/></li>
        <li><img src="data1/images/eclasscoupenavdropdown.jpg" alt="" title="" id="wows1_9"/></li>
        <li><img src="data1/images/emb_homepage_english_ewagon_1000x370.jpg" alt="" title="" id="wows1_10"/></li>
        <li><img src="data1/images/gle_coupe_model_overview_960x298.jpg" alt="" title="" id="wows1_11"/></li>
        <li><img src="data1/images/glecoupedropdown04012016.jpg" alt="" title="" id="wows1_12"/></li>
        <li><img src="data1/images/maxresdefault09.jpg" alt="VANS" title="VANS" id="wows1_13"/></li>
        <li><a href="http://wowslider.com/vi"><img src="data1/images/toyotalandcruiser1.jpg" alt="wordpress gallery plugin" title="" id="wows1_14"/></a></li>
        <li><img src="data1/images/toyotapremio.png" alt="SALON CARS" title="SALON CARS" id="wows1_15"/></li>
    </ul></div>
<div class="ws_script" style="position:absolute;left:-99%"><a href="http://wowslider.com">bootstrap carousel</a> by WOWSlider.com v7.9</div>
<div class="ws_shadow"></div>
</div>  
<script type="text/javascript" src="engine1/wowslider.js"></script>
<script type="text/javascript" src="engine1/script.js"></script>
<!-- End WOWSlider.com BODY section -->
                        <br />
                        <br />
                                   
        

        </div>
   

    </div>
     </div>
     <div class="container">
     <div class="row">

     <div class="col-md-12">
                
                <div class="list-group">
                <div class="panel panel-default">
                <div class="panel-default">
                <br/>
                <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">  
                    <div class="col-sm-10">
                        <input class="form-control" placeholder="Search Our Website" type="text" name="id" value="">
                    </div>
                    <button type="submit" name="search" class="btn btn-primary">
                    <i class="glyphicon glyphicon-search"></i> Search services
                    </button>

                 </form>
                 <?php if (isset($_POST['search'])) {

                    $id = $_POST['id'];

                    header("location:results.php?id=".$id."");

                    } 
                 ?>
                 <br/> 
                  
                </div>
                </div>
            </div>
         </div> 
         </div> 
         </div> 
         <div class="container">
         <div class="row">
         <div class="col-md-12">
              

                <div class="">
                    
                    <div class="">
                    <?php
                    global $pdo,$user;
                    $order=$pdo->prepare("SELECT * FROM vehicles WHERE status='available' ORDER BY id DESC");
                            
                    $order->execute();
                    $rows=$order->rowCount();
                    
                    $i = 1;
                    

                    while($rows = $order->fetch(PDO::FETCH_ASSOC)){?>


                <div class='col-md-3 portfolio-item'>
                <a href='view_property_detail.php?id=<?php echo $rows['id']?>&plate=<?php echo $rows['plate']?>'>
                    <img class='' width="254" height="150" src='app/img/<?php echo $rows['img']; ?>' alt=''>
                </a>
                <div class="panel panel-default">
                    <div class='panel-body'>
                        
                        <p><b>Model : </b><?php echo $rows['model']; ?></p>
                        <b>Sevice  Price : </b> Ksh <?php echo $rows['price']; ?>
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

    

            

     </div>
    </div> 
    <!-- /.container -->

    <div class="container">

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-10">
                    <p>Copyright &copy; <?php echo date('Y');?> Car Wash Management System &nbsp;&nbsp; | &nbsp;&nbsp; Designed & Developed By <a href="">Patrick </a>&nbsp;&nbsp; | &nbsp;&nbsp; <a href="app/login.php">Site Admin</a> </p>
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
