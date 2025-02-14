<?php
ob_start();
session_start();
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
      <title>Verwerken</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="css/style.css">
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
    <div class="loader_bg">
        <div class="loader"><img src="images/loading.gif" alt="#"/></div>
    </div>
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
                              <li class="nav-item">
                                 <?php
                                 if (empty($_SESSION["loggedIn"]) == true || $_SESSION["loggedIn"] != true) { ?>
                                    <a class="nav-link" href="login_page.php">Login</a>
                                    <?php
                                 } else { ?>
                                    <a class="nav-link" href="login_page.php">Logout</a>
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
                          <h2>Info</h2>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <?php
      // Hulp van : https://stackoverflow.com/questions/36240145/how-to-use-serverhttp-referer-correctly-in-php
      // Als de laatste pagina /contact.php is :
      if($_SESSION['lastpage'] == "/sunshine-html/sunshine-html/contact.php")
      {
         echo $_REQUEST["Name"], "<br><br>";
         echo $_REQUEST["Phone"], "<br><br>";
         echo $_REQUEST["Email"], "<br><br>";
         echo $_REQUEST["Message"], "<br><br>";
      } // Als de laatste pagina /login_page.php is; als er nog niet ingelogd is; als er aangeduid werd dat er word geregistreerd :
      else if (($_SESSION['lastpage'] == "/sunshine-html/sunshine-html/login_page.php") && (empty($_SESSION["loggedIn"]) == true || $_SESSION["loggedIn"] != true)) {
         // Hulp van : https://www.tutorialrepublic.com/php-tutorial/php-mysql-login-system.php
         // En : https://www.geeksforgeeks.org/how-to-insert-form-data-into-database-using-php/
         
         // Gebruikersnaam word gedeclareerd voor verder gebruik
         if (isset($_REQUEST["eName"]) === true) {
             $_SESSION["gbr"] = trim($_REQUEST["eName"]);
         } else {
            echo "Volgens ons is er geen gebruikersnaam ingegeven.<br>
            U zal worden herleidt naar de registratie pagina.<br>";
            header("Refresh: 4; url=login_page.php", true, 0);
            exit();
         }
         
         // Paswoord word gedeclareerd voor verder gebruik
         if (isset($_REQUEST["pass"]) === true) {
             $_SESSION["pwd"] = trim($_REQUEST["pass"]);
         } else {
             echo "Volgens ons is er geen paswoord ingegeven.<br>
             U zal worden herleidt naar de registratie pagina.<br>";
             header("Refresh: 4; url=login_page.php", true, 0);
             exit();
         }

         // Connectie creëeren
         $conn = new mysqli("localhost", "root", "", "gip_database"); 
         // Connectie checken
         if ($conn->connect_errno) {
            die("Connectie mislukt: " . $conn->connect_error);
         }

         // Als de gebruiker heeft aangeduid dat die wilt registreren (default optie)
         if ($_REQUEST["registreren"] == "1") {
            // Een insert statement declareren
            $sql = "SELECT id_gebruiker FROM gebruikers WHERE gebruikers_naam = ?";
            // Een insert statement voorbereiden
            if ($stmt = $conn->prepare($sql)) {
               // Variabelen binden aan de voorbereidde insert als parameters
               $stmt->bind_param("s", $param_username);

               // Parameters bepalen
               $param_username = trim($_SESSION["gbr"]);

               // Proberen de voorbereidde statement uit te voeren
               if ($stmt->execute()) {
                     // Resultaat bewaren
                     $stmt->store_result();
                     // Als het resultaat al één of meerdere keren voorkomt
                     if ($stmt->num_rows >= 1) {
                        echo "Deze gebruikersnaam is al in gebruik.111<br>
                        U zal worden herleidt naar de registratie pagina.<br>";
                        header("Refresh: 4; url=login_page.php", true, 0);
                        exit();
                     }
               } else {
                  echo "Oops! Iets ging mis met het controleren van de gebruikersnaam, u word terug gestuurd.";
                  header("Refresh: 4; url=login_page.php", true, 0);
                  exit();
               } 
               // Statement sluiten
               $stmt->close();
            }

            // Zien als het paswoord leeg is of niet
            if (empty($_SESSION["pwd"])) {
               echo "U heeft geen passwoord ingegeven.<br>
               U zal worden herleidt naar de registratie pagina.<br>";
               header("Refresh: 4; url=login_page.php", true, 0);
               exit();
            }

            // Zien als er input errors zijn voordat we iets in de database steken
            if (!(empty($_SESSION["pwd"]) && empty($_SESSION["gbr"]))) {   
               // Een insert statement declareren
               $sql = "INSERT INTO gebruikers (gebruikers_naam, pass) VALUES (?, ?)";
               // Een insert statement voorbereiden
               if ($stmt = $conn->prepare($sql)) {
                  // Variabelen binden aan de voorbereidde insert als parameters
                  $stmt->bind_param("ss", $param_username, $param_password);

                  // Parameters declareren
                  $param_username = $_SESSION["gbr"];
                  $param_password = password_hash($_SESSION["pwd"], PASSWORD_DEFAULT); // Creëert een paswoord hash
               
                  // Proberen de voorbereidde statement uit te voeren
                  if ($stmt->execute()) {
                     echo "Bedankt om te registreren.<br>
                     U zal worden herleidt naar de registratie pagina.<br>";
                     header("Refresh: 4; url=login_page.php", true, 0);
                     exit();
                     
                  } else {
                     echo "Oops! Iets ging fout bij het registreren.<br>
                     U zal worden herleidt naar de registratie pagina.<br>";
                     header("Refresh: 4; url=login_page.php", true, 0);
                     exit();
                  }  
                  // Statement sluiten
                  $stmt->close();
               }
            } else {
               echo "Oops! Ofwel is er geen paswoord, ofwel geen gebruikersnaam ingegeven.<br>
               U zal worden herleidt naar de registratie pagina.<br>";
               header("Refresh: 4; url=login_page.php", true, 0);
               exit();
            }  
            // Connectie beëindigen
            $conn->close();
         } // Als de gebruiker heeft aangeduid dat die wilt niet wilt registreren
         else if ($_REQUEST["registreren"] == "0") {
            // Een insert statement declareren
            $sql = "SELECT pass FROM gebruikers WHERE gebruikers_naam = ?";
            // Een insert statement voorbereiden
            if ($stmt = $conn->prepare($sql)) {
               // Variabelen binden aan de voorbereidde insert als 'parameters'
               $stmt->bind_param("s", $param_username);

               // Parameters bepalen
               $param_username = trim($_REQUEST["eName"]);

               // Proberen de voorbereidde statement uit te voeren
               if ($stmt->execute()) {
                  // Resultaat bewaren
                  $stmt->store_result();

                  // Resultaat binden (voor tijdelijke 'opslag')
                  $stmt->bind_result($result);

                  // Als de 'fetch' lukt, bepalen we de te vergelijken met hash
                  if ($stmt->fetch()){
                     $hash = $result;
                  }

                  // Resultaat vrij laten
                  $stmt->free_result();
               } else {
                   echo "Oops! Iets ging mis met het controleren van het passwoord, u word terug gestuurd.";
                   header("Refresh: 4; url=login_page.php", true, 0);
                   exit();
               } 
               // Statement sluiten
               $stmt->close();
            }

            // De $_REQUEST["pass"] vergelijken we nu met onze hash
            if (password_verify($_REQUEST["pass"], $hash) == true) {
               echo "Bedankt om in te loggen.<br>";
               echo 'Last page: '.$_SESSION['lastpage'];
               // De gebruiker zijn session word aangeduid als ingelogged
               $_SESSION["loggedIn"] = true;
               ?>
               <div>
                  <a class='read_more' href='index.php' role='button'>Home</a>
               </div>
               <?php
            } else {
               echo "Sorry, maar iets ging fout bij de paswoord verificatie.<br>
               U zal worden herleidt naar de registratie pagina.<br>";
               header("Refresh: 4; url=login_page.php", true, 0);
               exit();
            }
            // Connectie beëindigen
            $conn->close();
         }
            
      } // Als de laatste pagina niet /login_page.php is :
      else if ($_SESSION['lastpage'] != "/sunshine-html/sunshine-html/login_page.php") {
         // From https://stackoverflow.com/questions/768431/how-do-i-make-a-redirect-in-php?page=1&tab=scoredesc#tab-top
         // User Hammad Khan
         // Learn output buffering dammit: https://stackoverflow.com/questions/2832010/what-is-output-buffering
         // http://web.archive.org/web/20101216035343/http://dev-tips.com/featured/output-buffering-for-web-developers-a-beginners-guide

         echo "Sorry, maar dit mag niet.<br>";
         header("Refresh: 4; url=login_page.php", true, 0);
         exit();
      } else {
         echo "seems ya did it.<br>"; //////////////////
      }
      ?>
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
        <!-- Javascript files-->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/jquery-3.0.0.min.js"></script>
        <!-- sidebar -->
        <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
        <script src="js/custom.js"></script>
    </body>
</html>
<?php ob_end_flush(); ?>