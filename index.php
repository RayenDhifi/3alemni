<?php
session_start();
require("./server/db.php");
if ((isset($_SESSION['user_id']) && session_id() === $_COOKIE['PHPSESSID'])) {
  $user_id= $_SESSION['user_id'];
  $sql1= "Select * from formation";
  $r1 = mysqli_query($db, $sql1);
  $r1_1 = mysqli_query($db, $sql1);
  $sql2 = "Select * from formation_etudiant where user_id='$user_id'";
  $r2 = mysqli_query($db, $sql2);
  $sql2 = "Select * from formation_etudiant where user_id='$user_id'";
  $r3 = mysqli_query($db, $sql2);
  $r4 = mysqli_query($db, $sql2);

  } 
else {
  header("Location: connexion.php");
  exit(); 
}
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/classes.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
  </head>
  <body>
    <aside class="sidebar-nav-wrapper">
      <div class="navbar-logo">
        <a href="index.html">
          <h2>3alemni</h2>
        </a>
      </div>
      <nav class="sidebar-nav">
        <ul>
        <li class="nav-item">
            <a href="#" id="MesFormationsbtn">
              <span class="icon">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M8.74999 18.3333C12.2376 18.3333 15.1364 15.8128 15.7244 12.4941C15.8448 11.8143 15.2737 11.25 14.5833 11.25H9.99999C9.30966 11.25 8.74999 10.6903 8.74999 10V5.41666C8.74999 4.7263 8.18563 4.15512 7.50586 4.27556C4.18711 4.86357 1.66666 7.76243 1.66666 11.25C1.66666 15.162 4.83797 18.3333 8.74999 18.3333Z" />
                  <path
                    d="M17.0833 10C17.7737 10 18.3432 9.43708 18.2408 8.75433C17.7005 5.14918 14.8508 2.29947 11.2457 1.75912C10.5629 1.6568 10 2.2263 10 2.91665V9.16666C10 9.62691 10.3731 10 10.8333 10H17.0833Z" />
                </svg>
              </span>
              <span class="text">Dashboard</span>
            </a>
          </li>
          <li class="nav-item nav-item-has-children">
            <a
              href="#0"
              class="collapsed"
              data-bs-toggle="collapse"
              data-bs-target="#ddmenu_2"
              aria-controls="ddmenu_2"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span class="icon">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M11.8097 1.66667C11.8315 1.66667 11.8533 1.6671 11.875 1.66796V4.16667C11.875 5.43232 12.901 6.45834 14.1667 6.45834H16.6654C16.6663 6.48007 16.6667 6.50186 16.6667 6.5237V16.6667C16.6667 17.5872 15.9205 18.3333 15 18.3333H5.00001C4.07954 18.3333 3.33334 17.5872 3.33334 16.6667V3.33334C3.33334 2.41286 4.07954 1.66667 5.00001 1.66667H11.8097ZM6.66668 7.70834C6.3215 7.70834 6.04168 7.98816 6.04168 8.33334C6.04168 8.67851 6.3215 8.95834 6.66668 8.95834H10C10.3452 8.95834 10.625 8.67851 10.625 8.33334C10.625 7.98816 10.3452 7.70834 10 7.70834H6.66668ZM6.04168 11.6667C6.04168 12.0118 6.3215 12.2917 6.66668 12.2917H13.3333C13.6785 12.2917 13.9583 12.0118 13.9583 11.6667C13.9583 11.3215 13.6785 11.0417 13.3333 11.0417H6.66668C6.3215 11.0417 6.04168 11.3215 6.04168 11.6667ZM6.66668 14.375C6.3215 14.375 6.04168 14.6548 6.04168 15C6.04168 15.3452 6.3215 15.625 6.66668 15.625H13.3333C13.6785 15.625 13.9583 15.3452 13.9583 15C13.9583 14.6548 13.6785 14.375 13.3333 14.375H6.66668Z" />
                  <path
                    d="M13.125 2.29167L16.0417 5.20834H14.1667C13.5913 5.20834 13.125 4.74197 13.125 4.16667V2.29167Z" />
                </svg>
              </span>
              <span class="text">Consulter votre formation</span>
            </a>
            <ul id="ddmenu_2" class="collapse dropdown-nav">
            <?php 
            while ($formations2 = mysqli_fetch_array($r2)) { 
              $formation_info = "SELECT titre, id FROM formation WHERE id='$formations2[1]'";
              $info = mysqli_query($db, $formation_info);
              $info1 = mysqli_fetch_array($info);
              
              echo "<li>
                      <a href='#' class='formation-btn' data-target='$info1[1]'>$info1[0]</a>
                    </li>";
            }
            ?>
          </ul>
             <span class="divider"><hr /></span>
          <li class="nav-item">
            <a href="#"  id="toutFormationsbtn">
              <span class="icon">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M1.66666 5.41669C1.66666 3.34562 3.34559 1.66669 5.41666 1.66669C7.48772 1.66669 9.16666 3.34562 9.16666 5.41669C9.16666 7.48775 7.48772 9.16669 5.41666 9.16669C3.34559 9.16669 1.66666 7.48775 1.66666 5.41669Z" />
                  <path
                    d="M1.66666 14.5834C1.66666 12.5123 3.34559 10.8334 5.41666 10.8334C7.48772 10.8334 9.16666 12.5123 9.16666 14.5834C9.16666 16.6545 7.48772 18.3334 5.41666 18.3334C3.34559 18.3334 1.66666 16.6545 1.66666 14.5834Z" />
                  <path
                    d="M10.8333 5.41669C10.8333 3.34562 12.5123 1.66669 14.5833 1.66669C16.6544 1.66669 18.3333 3.34562 18.3333 5.41669C18.3333 7.48775 16.6544 9.16669 14.5833 9.16669C12.5123 9.16669 10.8333 7.48775 10.8333 5.41669Z" />
                  <path
                    d="M10.8333 14.5834C10.8333 12.5123 12.5123 10.8334 14.5833 10.8334C16.6544 10.8334 18.3333 12.5123 18.3333 14.5834C18.3333 16.6545 16.6544 18.3334 14.5833 18.3334C12.5123 18.3334 10.8333 16.6545 10.8333 14.5834Z" />
                </svg>
              </span>
              <span class="text" >Tout les formations </span>    
            </a>
          </li>
      </nav>
    </aside>
    <div class="overlay"></div>
    <main class="main-wrapper">
      <header class="header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-5 col-md-5 col-6">
            </div>
            <div class="col-lg-7 col-md-7 col-6">
              <div class="header-right">
                <div class="profile-box ml-15">
                  <div class="profile-box ml-15">
                    <button class="dropdown-toggle bg-transparent border-0" type="button" id="profile"
                      data-bs-toggle="dropdown" aria-expanded="false">
                      <div class="profile-info">
                        <div class="info">
                          <div class="image">
                            <img src="assets/images/profile/profile-image.png" alt="" />
                          </div>
                          <div>
                            <h6 class="fw-500"> <?php echo"".$_SESSION['user_nom']; ?> </h6>
                            <p><?php echo"".$_SESSION['user_role']; ?></p>
                          </div>
                        </div>
                      </div>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profile">
                      <li>
                        <div class="author-info flex items-center !p-1">
                          <div class="image">
                            <img src="assets/images/profile/profile-image.png" alt="image">
                          </div>
                          <div class="content">
                            <h4 class="text-sm"><?php echo"".$_SESSION['user_nom']; ?></h4>
                            <a class="text-black/40 dark:text-white/40 hover:text-black dark:hover:text-white text-xs" href="#"><?php echo"".$_SESSION['user_email']; ?></a>
                          </div>
                        </div>
                      </li>
                      <li class="divider"></li>
                      <li>
                      <li>
                          <a href="./server/logout.php"> <i class="lni lni-exit"></i> Deconnexion </a>
                        </li>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </header>

  <?php
  $formation_info = "SELECT * FROM formation";
  $info = mysqli_query($db, $formation_info);
  while ($info1 = mysqli_fetch_array($info)) {
      echo "<section id='$info1[0]' style='display: none;'>
              <div class='container'>
                  <div class='row justify-content-center'>
                      <div class='col-lg-6'>
                          <div class='formation-wrapper text-center'>
                              <div class='formation-wrapper2'>
                                  <h2 class='mb-15'>$info1[1]</h2>
                                  <p class='text-sm mb-15'>$info1[2]</p>
                                  <div class='content'>
                                      <span class='text-green'>$info1[3]</span><br>
                                      <span class='text-gray'>$info1[5]</span><br>
                                      <span class='text-gray'>$info1[6]</span>
                                  </div>";
  
      $est_inscriper = "SELECT * FROM formation_etudiant WHERE formation_id='$info1[0]' AND user_id='$user_id'";
      $info_inscriper = mysqli_query($db, $est_inscriper);
  
      if (mysqli_num_rows($info_inscriper) == 0) {
          echo "<form method='POST' action='./server/inscrire.php'>
                  <input type='hidden' name='formation_id' value='$info1[0]'>
                  <input type='hidden' name='user_id' value='$user_id'>
                  <div class='button-group d-flex justify-content-center mt-25'>
                      <button class='main-btn primary-btn btn-hover w-100 text-center' type='submit'>
                          S'inscriper
                      </button>
                  </div>
                </form>";
      } else {
          echo "<div class='button-group d-flex justify-content-center mt-25'>
                  Deja inscrit (inserer resources pedagogiques)
                </div>";
      }
  
      echo "</div>
          </div>
      </div>
      </div>
      </section>";
  }
  ?>
  
    

      <section class="section" id="MesFormations">
        <div class="container-fluid">
          <div class="title-wrapper pt-30">
            <div class="row align-items-center">
              <div class="col-md-6">
                <div class="title">
                  <h2>Votre formation</h2>
                </div>
              </div>
              <div class="col-md-6">
                <div class="breadcrumb-wrapper">
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item">
                        <a href="#0">Platforme</a>
                      </li>
                      <li class="breadcrumb-item active" aria-current="page">
                        Mes Formations
                      </li>
                    </ol>
                  </nav>
                </div>
              </div>
            </div>
          </div>
          <?php 
              echo"<div class='row'>";

              while ($formations2 = mysqli_fetch_array($r3)) {
                    $sql3 = "select * from formation where id='$formations2[1]'";
                    $formation_info = mysqli_query($db, $sql3);
                    $formations= mysqli_fetch_array($formation_info);
                    if ($formations['type']== 'Fomation Diplomante') {
                echo"
                      <div class='col-xl-6 col-lg-6 col-sm-6'>
                        <a href='#' class='icon-card mb-30 formation-btn' data-target='$formations[0]'>
                          <div class='content'>
                            <h6 class='mb-10'>$formations[4]</h6>
                            <h3 class='text-bold mb-10'>$formations[1]</h3>
                            <span class='text-green'>$formations[3]</span><br>
                            <span class='text-gray'>$formations[5]</span><br>
                            <span class='text-gray'>$formations[6]</span>
                            </p>
                          </div>
                        </a>
                      </div>
                    ";
                    }}
                    echo"<span class='divider'><hr /></span>";
                    while ($formations3 = mysqli_fetch_array($r4)) {
                      $sql3 = "select * from formation where id='$formations3[1]'";
                      $formation_info2 = mysqli_query($db, $sql3);
                      $formations4= mysqli_fetch_array($formation_info2);
                      if ($formations4['type']== 'Formation ciblée') {
                  echo"
                        <div class='col-xl-6 col-lg-6 col-sm-6'>
                          <a href='#' class='icon-card mb-30 formation-btn' data-target='$formations4[0]'>
                            <div class='content'>
                              <h6 class='mb-10'>$formations4[4]</h6>
                              <h3 class='text-bold mb-10'>$formations4[1]</h3>
                              <span class='text-green'>$formations4[3]</span><br>
                              <span class='text-gray'>$formations4[5]</span><br>
                              <span class='text-gray'>$formations4[6]</span>
                              </p>
                            </div>
                          </a>
                        </div>
                      ";
                      }       
                    
              }   ?>
          
          <span class='divider'><hr /></span>
            <span class="text h2 mb-30">Vos séances cette semaine (pas encore liées à la base de données)</span>

            <div class="col-lg-14">
              <div class="card-style mb-30">
                <div class="title d-flex flex-wrap align-items-center justify-content-between">
                </div>
                <div class="table-responsive">
                  <table class="table top-selling-table">
                    <thead>
                      <tr>
                        <th>
                          <h6 class="text-sm text-medium">Formation</h6>
                        </th>
                        <th class="min-width">
                          <h6 class="text-sm text-medium">
                            Type</i>
                          </h6>
                        </th>
                        <th class="min-width">
                          <h6 class="text-sm text-medium">
                            Heure</i>
                          </h6>
                        </th>
                        <th class="min-width">
                          <h6 class="text-sm text-medium">
                            Status</i>
                          </h6>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          <div class="product">
                            <p class="text-sm">Python</p>
                          </div>
                        </td>
                        <td>
                          <p class="text-sm">En Ligne</p>
                        </td>
                        <td>
                          <p class="text-sm">Lundi 6pm</p>
                        </td>
                        <td>
                          <span class="status-btn close-btn">Retard</span>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="product">
                            <p class="text-sm">Francais</p>
                          </div>
                        </td>
                        <td>
                          <p class="text-sm">Presentielle</p>
                        </td>
                        <td>
                          <p class="text-sm">Mardi 1pm</p>
                        </td>
                        <td>
                          <span class="status-btn success-btn">Complet</span>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="product">
                            <p class="text-sm">Francais</p>
                          </div>
                        </td>
                        <td>
                          <p class="text-sm">Presentielle</p>
                        </td>
                        <td>
                          <p class="text-sm">vendredi 1pm</p>
                        </td>
                        <td>
                          <span class="status-btn warning-btn">En attendant</span>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

  <section id="toutFormations">
        <div class="container-fluid">
          <div class="title-wrapper pt-30">
            <div class="row align-items-center">
              <div class="col-md-6">
                <div class="title">
                  <h2>Toutes les formations</h2>
                </div>
              </div>
              <div class="col-md-6">
                <div class="breadcrumb-wrapper">
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item">
                        <a href="#0">Platforme</a>
                      </li>
                      <li class="breadcrumb-item active" aria-current="page">
                        Tout Formations
                      </li>
                    </ol>
                  </nav>
                </div>
              </div>
            </div>
          </div>
          <?php 
             echo"<div class='row'>";
              while ($formations = mysqli_fetch_array($r1)) {
                    if ($formations['type']== 'Fomation Diplomante') {
                echo"
                      <div class='col-xl-6 col-lg-6 col-sm-6'>
                        <a href='#' class='icon-card mb-30 formation-btn' data-target='$formations[0]'>
                          <div class='content'>
                            <h6 class='mb-10'>$formations[4]</h6>
                            <h3 class='text-bold mb-10'>$formations[1]</h3>
                            <span class='text-green'>$formations[3]</span><br>
                            <span class='text-gray'>$formations[5]</span><br>
                            <span class='text-gray'>$formations[6]</span>
                            </p>
                          </div>
                        </a>
                      </div>
                    ";
                    }}
                    echo"<span class='divider'><hr /></span>";

            while ($formations3 = mysqli_fetch_array($r1_1)) {
                      if ($formations3['type']== 'Formation ciblée') {
                  echo"
                        <div class='col-xl-6 col-lg-6 col-sm-6'>
                        <a href='#' class='icon-card mb-30 formation-btn' data-target='$formations3[0]'>
                            <div class='content'>
                              <h6 class='mb-10'>$formations3[4]</h6>
                              <h3 class='text-bold mb-10'>$formations3[1]</h3>
                              <span class='text-green'>$formations3[3]</span><br>
                              <span class='text-gray'>$formations3[5]</span><br>
                              <span class='text-gray'>$formations3[6]</span>
                              </p>
                            </div>
                          </a>
                        </div>
                      ";
                      }
                    
              }   ?>
  </section>

    </main>

        <script src="assets/js/bootstrap.bundle.min.js"></script>
      <script>
      document.querySelectorAll(".formation-btn").forEach(button => {
        button.addEventListener("click", function(event) {
          event.preventDefault();
          
          let targetId = this.getAttribute("data-target");

          
          document.querySelectorAll("section").forEach(section => {
            section.style.display = "none";
          });

          document.getElementById(targetId).style.display = "block";
        });
      });

      document.getElementById("toutFormationsbtn").addEventListener("click", function() {
        document.querySelectorAll("section").forEach(section => {
          section.style.display = "none"; 
        });

        document.getElementById("toutFormations").style.display = "block";
      });

      document.getElementById("MesFormationsbtn").addEventListener("click", function() {
        document.querySelectorAll("section").forEach(section => {
          section.style.display = "none"; 
        });

        document.getElementById("MesFormations").style.display = "block";
      });

      </script>
  </body>
  
</html>
