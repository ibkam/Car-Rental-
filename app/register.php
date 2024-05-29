<?php

include("includes/conn.php");

if (isset($_POST['register'])) {

  $name = $_POST['name'];
  $id_pass = $_POST['id_pass'];
  $email = $_POST['email'];
  $mobile = $_POST['mobile'];
  $password = $_POST['password'];
  $pass = md5($_POST['password']);
  $user_type = "client";
  
  

  function checkempty(){

    global $name,$id_pass,$email,$mobile;

      if(empty($name) || empty($id_pass) || empty($email) || empty($mobile)){

        echo "<script>window.alert('Please Fill All Fields!!');</script>";

      }else{

       checkpass();

      }  
  }

  function checkpass(){

     global $password;

     if (empty($password)) {

       echo "<script>window.alert('Please Enter Password');</script>";

     }else{
       
       savedata();
     }



  }

  function savedata(){

    global $pdo,$name,$id_pass,$email,$mobile;

    try {

      $registerdriver = $pdo->prepare("INSERT INTO clients(fname,id_no,email,phone) VALUES(?,?,?,?)");
      $registerdriver -> bindValue(1,$name);
      $registerdriver -> bindValue(2,$id_pass);
      $registerdriver -> bindValue(3,$email);
      $registerdriver -> bindValue(4,$mobile);
      $registerdriver -> execute();

      savecredentials();


      
    } catch (PDOException $e) {

      echo $e->getMessage();
      
    }
  }

  function savecredentials(){

     global $pdo,$user_type,$pass,$email,$mobile, $name;

    try {

      $registerdriver = $pdo->prepare("INSERT INTO users(user_type,username,password) VALUES(?,?,?)");
      $registerdriver -> bindValue(1,$user_type);
      $registerdriver -> bindValue(2,$name);
      $registerdriver -> bindValue(3,$pass);
      $registerdriver -> execute();

        pnts();

    } catch (PDOException $e) {

      echo $e->getMessage();
      
    }


  }

  function pnts(){

    global $pdo,$drlicense,$pnts;
	//global $pdo, $drlicense,$pntts


    try {

      $registerdriver = $pdo->prepare("INSERT performance (dr_license,pnts) VALUES(?,?)");
      $registerdriver -> bindValue(1,$drlicense);
      $registerdriver -> bindValue(2,$pnts);      
      $registerdriver -> execute();

      echo "<script>window.alert('Account Created Successfully');

            window.location.href='login.php';

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
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Car Hire System | Register </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="">


  <div class="row">
    <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
      <div class="login-panel panel panel-default">
        <div class="panel-heading"><strong><center>Register New Account</center></strong></div>
      <div class="panel-body">

    <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">

      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="name" value="<?php if (isset($_POST['register'])){ echo $name;}?>" placeholder="Full name">
        
      </div>
      <div class="form-group has-feedback">
     
        <input type="text" class="form-control" maxlenght="8" name="id_pass" value="<?php if (isset($_POST['register'])){ echo $id_pass;}?>" placeholder="ID/Passport Number">
       
      </div>
       <div class="form-group has-feedback">
     
        <input type="email" class="form-control"  name="email" value="<?php if (isset($_POST['register'])){ echo $email;}?>" placeholder="Email Address">
       
      </div>
      <div class="form-group has-feedback">
     
        <input type="text" class="form-control" maxlenght="10" name="mobile" value="<?php if (isset($_POST['register'])){ echo $mobile;}?>" placeholder="Mobile Phone Number">
       
      </div>
      <div class="form-group has-feedback">

        <input type="password" name="password" class="form-control"  placeholder="Password">
       
      </div>
      
      
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> I agree to the <a href="#">terms</a>
            </label>
          </div>
        </div>

        <div class="col-xs-12">
          <button type="submit" name="register" class="btn btn-primary btn-block btn-flat">Create Account</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <?php if (isset($_POST['register'])) { checkempty();}?>

    <br/>

    <a href="login.php" class="text-center">I already have an account</a>
  </div>
  <!-- /.form-box -->
</div>
</div></div>
<!-- /.register-box -->

<!-- jQuery 2.2.3 -->
<script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../../plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
