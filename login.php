<?php
session_start();
$_SESSION["lastpage"] = $_SERVER["REQUEST_URI"];
function UnsetLogin()
{
   unset($_SESSION["loggedIn"]); 
}
if (empty($_POST["logout"]) != true) {
   UnsetLogin();
   $_POST["logout"] = "";
}
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <?php
      if ((empty($_POST["optieInlog"]) == true) || ($_POST["optieInlog"] == "2")) { ?>
         <title>Registratie</title>
         <?php
      } else { ?>
         <title>Login</title>
         <?php
      }
      ?>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" href="css/stylesimport.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
   </head>
   <!-- body -->
   <body class="main-layout inner_page">
      <!-- loader  -->
      <!-- <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#"/></div>
      </div> -->
      <!-- end loader -->
      <!-- header -->
      <header class="full_bg">
         <!-- header inner -->
         <div class="header">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                     <div class="full">
                        <div class="center-desk">
                           <div class="logo">
                              <a href="index.html"><img src="images/logo.png" alt="#" /></a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                     <nav class="navigation navbar navbar-expand-md navbar-dark ">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarsExample04">
                           <ul class="navbar-nav mr-auto">
                              <li class="nav-item ">
                                 <a class="nav-link" href="index.php">Home</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="about.php">About</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="product.php">Ons Product</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="galerij.php">Galerij</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="stock.php">Stock</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="bestelformulier.php">Bestelformulier</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="contact.php">Contacteer Ons</a>
                              </li>
                              <li class="nav-item active">
                                 <?php
                                 if (empty($_SESSION["loggedIn"]) == true || $_SESSION["loggedIn"] != true) { ?>
                                    <a class="nav-link" href="login_page.php">Login</a>
                                    <?php
                                 } else { ?>
                                    <form method="post">
                                    <button class="nav-link" name="logout" type="submit" value="1"
                                    formtarget="_self" onclick="UnsetLogin()">Logout</button>
                                    </form>
                                    <?php
                                 }
                                 ?>
                              </li>
                           </ul>
                        </div>
                     </nav>
                  </div>
               </div>
            </div>
         </div>
         <!-- end header inner -->
         <!-- end header -->
         <!-- banner -->
     
      </header>
      <!-- end banner -->
      <div class="back_re">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="title">
                     <?php
                     if ((empty($_POST["optieInlog"]) == true) || ($_POST["optieInlog"] == "2")) { ?>
                        <h2>Registratie</h2>
                        <?php
                     } else { ?>
                        <h2>Login</h2>
                        <?php
                     }
                     ?>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- about -->
      <div id="about" class="about">
         <div class="container">
            <div class="row">
               <div class="col-md-6 offset-md-3">
                  <div class="titlepage">
                     <span>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptu </span>
                  </div>
               </div>
               <div class="col-md-12 offset-md-1">
                  <div class="about_img">
                     <?php
                     if ((empty($_POST["optieInlog"]) == true) || ($_POST["optieInlog"] == "2")) {
                        //$_SESSION["optieInlog"] = "2";
                        ?>
                        <form action="verwerken.php" method="post">
                           <div class="inputStyle">
                              <div class="container">
                                  Welkom tot de registratie pagina, hier kunt u zich een account registreren.<br><br>
                                  Gebruikersnaam :<br>
                                  <input type="text" name="eName" pattern="[A-z0-9À-ž\s]{2,}" title="Drie of meer characters"
                                      required><br>
                              </div>
                           </div>
                           <div class="inputStyle">
                              <div class="container">
                                  Paswoord :<br>
                                  <input type="password" name="pass" pattern=".{8,}" title="Acht of meer characters"
                                      required><br>
                              </div>
                           </div>
                           
                           <div class="registerbtn">
                               <button name="registreren" type="submit" value="1">Registreren</button><br><br>
                           </div>
                        </form>
                        <form method="post">
                           <div class="containerImport">
                              Bent u al een gebruiker?<br>
                              <button name="optieInlog" type="submit" value="1" formtarget="_self">Login</button>
                           </div>
                        </form>
                     <?php } else if ($_POST["optieInlog"] == "1") {
                        //$_SESSION["optieInlog"] = "1";
                        ?>
                        <form action="verwerken.php" method="post">
                           <div class="containerImport">
                               Welkom tot de inlog pagina, hier kunt u zich inloggen.<br><br>
                               Gebruikersnaam :<br>
                               <input type="text" name="eName" pattern="[A-z0-9À-ž\s]{2,}" title="Drie of meer characters"
                                   required><br>
                           </div>

                           <div class="containerImport">
                               Paswoord :<br>
                               <input type="password" name="pass" pattern=".{8,}" title="Acht of meer characters"
                                   required><br><br>
                           </div>

                           <div class="registerbtn">
                               <button name="registreren" type="submit" value="0">Inloggen</button><br><br>
                           </div>
                        </form>
                        <form method="post">
                           <div class="containerImport">
                              Heeft u nog geen account?<br>
                              <button name="optieInlog" type="submit" value="2" formtarget="_self">Registreer</button>
                           </div>
                        </form>
                     <?php }
                     ?>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end about -->
     
      <!--  footer -->
      <footer>
         <div class="footer">
            <div class="container">
               <div class="row">
                  <div class="col-md-8 offset-md-2">
                     <div class="newslatter">
                        <h4>Subscribe Our Newsletter</h4>
                        <form class="bottom_form">
                           <input class="enter" placeholder="Enter your email" type="text" name="Enter your email">
                           <button class="sub_btn">subscribe</button>
                        </form>
                     </div>
                  </div>
                  <div class="col-sm-12">
                     <div class=" border_top1"></div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-4">
                     <h3>menu LINKS</h3>
                     <ul class="link_menu">
                        <li><a href="#">Home</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="product.php">Ons Product</a></li>
                        <li><a href="galerij.php">Galerij</a></li>
                        <li><a href="bestelformulier.php">Bestelformulier</a></li>
                        <li><a href="stock.php">Stock</a></li>
                        <li><a href="contact.php">Contacteer Ons</a></li>
                     </ul>
                  </div>
                  <div class=" col-md-3">
                     <h3>TOP food</h3>
                     <p class="many">
                        There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected
                     </p>
                  </div>
                  <div class="col-lg-3 offset-mdlg-2     col-md-4 offset-md-1">
                     <h3>Contact </h3>
                     <ul class="conta">
                        <li><i class="fa fa-map-marker" aria-hidden="true"></i> Location</li>
                        <li> <i class="fa fa-envelope" aria-hidden="true"></i><a href="#"> demo@gmail.com</a></li>
                        <li><i class="fa fa-mobile" aria-hidden="true"></i> Call : +01 1234567890</li>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="copyright">
               <div class="container">
                  <div class="row">
                     <div class="col-md-10 offset-md-1">
                        <p>© 2019 All Rights Reserved. Design by <a href="https://html.design/"> Free Html Templates</a></p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <!-- end footer -->
      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
   </body>
</html>