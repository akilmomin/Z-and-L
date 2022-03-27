<?php session_start(); include 'model/db_conn.php'; include 'model/database.php'; ?>
<!doctype html>

<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sagar Dairy Farm</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="assets/scss/style.css">
    <link rel="stylesheet" href="assets/css/mystyle.css">
    <link href="assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>

<?php
    if(!empty($_POST)){
      $user_email=$_POST['username'];
      $query="SELECT password, user_id FROM user WHERE user_id=?";
      try{
        $result=$database->select($query,[$user_email]);
        if(sha1($_POST['pwd'])==$result[0]["password"] ){
          $location='../../zandl/myAdmin/dashboard.php';
          
          $_SESSION['user']=$user_email;
          $_SESSION['user_id']=$result[0]['user_id'];
          header("Location: $location");
          exit;
        }
        else
          echo "<script>alert('There was an error. Please retype your email and password')</script>";
      }
      catch(Exception $e){
        echo "<script>alert('There was an error. Please retype your email and password')</script>";
      }
    }
    ?>

           <div class="login">
           <br><br><br>
            <center>
            
            <br><br><br>
            <div class="row ">
            
              <div class="col-md-4"></div>
              <div class="col-md-4 login-detail">
              <img src="images/logo.png">
              <br><br>
                <form action="index.php" method="post">
                    <div class="form-group">
                      <label for="username">User Name:</label>
                      <input type="text" class="form-control" id="username" placeholder="Enter username" name="username">
                    </div>
                    <div class="form-group">
                      <label for="pwd">Password:</label>
                      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
                    </div>
                    
                    <button type="submit" class="btn btn-success">Submit</button>
                  </form>
              </div>
              <div class="col-md-4"></div>
            </div>
            </center>
          </div>

    