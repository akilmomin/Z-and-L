
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Z & L Enterprises</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
<!--     <link href="css/grayscale.min.css" rel="stylesheet">
 -->    <link href="css/grayscale.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Z & L Enterprises</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#projects">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#signup">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Header -->
    <header class="masthead">
      <div class="container d-flex h-100 align-items-center">
        <div class="mx-auto text-center">
          <h1 class="mx-auto my-0 text-uppercase">Z & L Enterprise</h1>
          <h2 class="text-white-50 mx-auto mt-2 mb-5">Distributor of Package Drinking Water</h2>
          <a href="#contact" class="btn btn-primary js-scroll-trigger">Call Us Now</a>
        </div>
      </div>
    </header>

    <!-- About Section -->
    <section id="about" class="about-section text-center">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 mx-auto">
            <h2 class="text-white mb-4">About Us</h2>
            <p class="text-white-50">Z and L Enterprise is bottle water distributor based in Mira road. We have been providing local businesses and homes with the finest water and outstanding customer service. Locally owned and operated. Our small staff enjoys getting to know each of our customers by name and provide best service. We provide services in mira bhayandar area only. We also take party order. Our products are 200ml, 500ml.1 liter, and 20 liter. We also sell 10 liter plastic water pot.  </p>
            <p class="text-white-50">Z and L Enterprise provide <strong class="text-white">FREE HOME DELIVERY</strong>. </p>
          </div>
          <div class="col-lg-6">
          <img src="img/about4.png" class="img-fluid" alt="" style="width: 85%; height: 70%;">
          </div>
        </div>
        <!--  -->
      </div>
    </section>

    <!-- Projects Section -->
    <section id="projects" class="projects-section bg-light">
      <div class="container">

        <!-- Featured Project Row -->
        <div class="row align-items-center no-gutters mb-4 mb-lg-5">
          <div class="col-xl-8 col-lg-7">
            <img class="img-fluid mb-3 mb-lg-0" src="img/jar.jpg" alt="">
          </div>
          <div class="col-xl-4 col-lg-5">
            <div class="featured-text text-center text-lg-left">
              <h4>20 liters jar</h4>
              <p class="text-black-50 mb-0">Fresh Bottles are ready to deliver at your busniesses and homes. We also take party order. For more info <a href="#signup">contact us.</a></p>
            </div>
          </div>
        </div>

        <!-- Project One Row -->
        <div class="row justify-content-center no-gutters mb-5 mb-lg-0">
          <div class="col-lg-6">
            <img class="img-fluid" src="img/small-bottle1.jpg" alt="">
          </div>
          <div class="col-lg-6">
            <div class="bg-black text-center h-100 project">
              <div class="d-flex h-100">
                <div class="project-text w-100 my-auto text-center text-lg-left">
                  <h4 class="text-white">Small Bottled Water</h4>
                  <p class="mb-0 text-white-50">
                  We provide veriety of bottled water. We have 200ml, 500ml, and 1 liter for sale. Pre order is required for these products. For more info <a href="#signup">contact us.</a></p>
                  <hr class="d-none d-lg-block mb-0 ml-0">
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Project Two Row -->
        <div class="row justify-content-center no-gutters">
          <div class="col-lg-6">
            <img class="img-fluid" src="img/dispenser1.png" alt="">
          </div>
          <div class="col-lg-6 order-lg-first">
            <div class="bg-black text-center h-100 project">
              <div class="d-flex h-100">
                <div class="project-text w-100 my-auto text-center text-lg-right">
                  <h4 class="text-white">Plastic Water Pot</h4>
                  <p class="mb-0 text-white-50">We sell water pot at very convenient price. For more info <a href="#signup">contact us.</a></p>
                  <hr class="d-none d-lg-block mb-0 mr-0">
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>

    <!-- Signup Section -->
    <section id="signup" class="signup-section">
    <?php include 'myAdmin/model/db_conn.php'; include 'myAdmin/model/database.php'; ?>

    <?php 
     if (isset($_POST["submit"])){
     $name = $_POST['name'];
     $phone = $_POST['phone'];
     $comment = $_POST['comment'];
        $insert_query="INSERT INTO contact(name,phone,comment) VALUES(:name,:phone,:comment)";
        $user_info=[$name,$phone,$comment];
        $database->insert($insert_query,$user_info);
     }   
  ?>
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-lg-8 mx-auto text-center">

            <i class="far fa-paper-plane fa-2x mb-2 text-white"></i>
            <h2 class="text-white mb-5">Contact Us</h2>

              <form method="post" action="index.php" onsubmit="myFunction()">
      
                <div class="form-group">
                  <label for="name">Name:</label>
                  <input type="text" class="form-control" id="name" placeholder="Enter your Name" name="name" required>
                </div>
                <div class="form-group">
                  <label for="phone">Phone Number:</label>
                  <input type="tel" class="form-control" id="phone" placeholder="Enter Phone Number" name="phone" maxlength="10" required>
                </div>

                <div class="form-group">
                            <label for="comment">Comment:</label>
                <textarea class="form-control" id="comments" name="comment" placeholder="Comment" rows="5"></textarea><br>
                </div>
                 <button type="submit" class="btn btn-primary mx-auto" name="submit">Submit</button>
  
            </form>
          </div>
        </div>
      </div>
      <script type="text/javascript">

        function myFunction() {
          alert("Your Message has been sent!! Thank You!");
        }

      </script>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact-section bg-black">
      <div class="container">

        <div class="row">

          <div class="col-md-4 mb-3 mb-md-0">
            <div class="card py-4 h-100">
            <a href="https://www.google.co.in/maps/dir/19.2741376,72.8686592/z+and+l/@19.2767295,72.8659877,17z/data=!3m1!4b1!4m9!4m8!1m1!4e1!1m5!1m1!1s0x3be7b05b34240985:0x34c3b42dbd57f7e9!2m2!1d72.867541!2d19.279254" target="_blank">
              <div class="card-body text-center">
                <i class="fas fa-map-marked-alt text-primary mb-2"></i>
                <h4 class="text-uppercase m-0">Address</h4>
                <hr class="my-4">
                <div class="small text-black-50">Shop No 8, Bldg 38/30, Unique Vihar, Near Gokul village, Shanti Park, Mira Road (E) Thane-401107</div>
              </div>
              </a>
            </div>
          </div>

          <div class="col-md-4 mb-3 mb-md-0">
            <div class="card py-4 h-100">
              <div class="card-body text-center">
                <i class="fas fa-clock text-primary mb-2"></i>
                <h4 class="text-uppercase m-0">Time</h4>
                <hr class="my-4">
                <div class="small text-black-50">
                Everyday <br> 9 AM to 7 PM
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4 mb-3 mb-md-0">
            <div class="card py-4 h-100">
              <div class="card-body text-center">
                <i class="fas fa-mobile-alt text-primary mb-2"></i>
                <h4 class="text-uppercase m-0">Phone</h4>
                <hr class="my-4">
                <div class="small text-black-50">8828158338</div>
                <div class="small text-black-50">9029232286</div>
              </div>
            </div>
          </div>
        </div>

       <!--  <div class="social d-flex justify-content-center">
          <a href="#" class="mx-2">
            <i class="fab fa-twitter"></i>
          </a>
          <a href="#" class="mx-2">
            <i class="fab fa-facebook-f"></i>
          </a>
          <a href="#" class="mx-2">
            <i class="fab fa-github"></i>
          </a>
        </div> -->

      </div>
    </section>

    <!-- Footer -->
    <footer class="bg-black small text-center text-white-50">
      <div class="container">
        Copyright &copy; zandlenterprise 2018
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/grayscale.min.js"></script>

  </body>

</html>
