<?php
include "db.php";
include "config.php";
session_start();
if(isset($_SESSION['id']))
{
  $query="SELECT tbl_203_patients.*, tbl_203_Diabetes_Type.Recommended FROM tbl_203_patients INNER JOIN tbl_203_Diabetes_Type ON tbl_203_patients.Type = tbl_203_Diabetes_Type.Type WHERE PatientID = ".$_GET['id'].""; 
  $result=mysqli_query($connection,$query);
  $row=mysqli_fetch_assoc($result);
} 
else 
{
  header('Location: ' .URL. 'login.php'); 
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/2.css">
    <link rel="stylesheet" href="css/stylecanvas.scss">

    <link href="https://fonts.googleapis.com/css?family=Amiko:regular,600,700" rel="stylesheet" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <script src="https://kit.fontawesome.com/d3946a3283.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</head>


<body>
  <header>
    <?php
     if($_SESSION['user_type']=="admin")
     {
      echo "<a href='index.php' id='logo'></a>";
     }
     else
     {
      echo "<a href='#' id='logo'></a>";
     }
    ?>
 
  
    <button class="navbar-toggler" type="button" id="btn-hamburger" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
        <span class="material-symbols-outlined">menu</span>
      </button>
      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
              <li class="nav-item">
                <?php 
              if($_SESSION['user_type']=="admin")
                {
                    echo "<a class='nav-link' href='index.php'>
                        <span class='material-symbols-outlined icons-nav'>person</span>
                        My Profiles
                    </a>";
                }
                    ?>
              </li>
              <li class="nav-item">
                    <a class="nav-link" href="#">
                        <span class="material-symbols-outlined icons-nav">article</span>
                        News&Update
                    </a>
              </li>
              <li class="nav-item">
                    <a class="nav-link" href="#">
                        <span class="material-symbols-outlined icons-nav">mode_comment</span>
                        FAQ   
                    </a>
              </li>
              <li class="nav-item">
                    <a class="nav-link" href="#">
                        <span class="material-symbols-outlined icons-nav">call</span>
                        Contact   
                    </a>
             </li> 
              <a class="horizontal-line" href="#"></a>
              <li class="nav-item">
                <a class="nav-link" href="Update_User.php">
                    <span class="material-symbols-outlined icons-nav">settings</span>
                    Settings
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="logout.php">
                    <span class="material-symbols-outlined icons-nav">logout</span>
                    Logout
                </a>
              </li>
          </ul>
        </div>
      </div>
    </div>
    <ul class="nav nav-underline">
      <?php
      if($_SESSION['user_type']=="admin")
      {
       echo "<li class='nav-item'>
        <a class='nav-link' aria-current='page' href='index.html'>My Profiles</a>
       </li>";
      }

      ?>
     
        <li class="nav-item">
          <a class="nav-link" href="#">News&Update</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">FAQ</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
      </ul>
      <div id="flex-icons">
        <a href="Update_User.php" class="material-symbols-outlined" >
            <span class="material-symbols-outlined">settings</span>
        </a>
        <a href="logout.php" class="material-symbols-outlined" >
        <span class="material-symbols-outlined">logout</span>
        </a>
        <a href="#" id="circle" <?php if(isset($_SESSION['img'])) echo "style='background-image:url(".$_SESSION['img'].")'"; else echo 'style=\'background-image:url("images/default.png")\'';?>></a>
    </div>
</header>
<main>
        <div class="wrapper">
         <div class="container">
          <h1>Dashboard</h1>
          <h3>Track your patient</h3>
            <div class="rectangle">
                <h1 class="title"><?php echo $row['name'] ?></h1>
                <div id="header">
                  <span class="type">Type</span>
                  <span class="recommended">Recommended</span>
                  <span class="sensor">Sensor Status</span>
                  <span class="networkse">Network</span>
                </div>
                <div class="sub-rectangle">
                    <span class="subject1 subject_Type"><?php echo $row['Type'] ?></span>
                    <span class="subject1"><?php echo $row['Recommended'] ?> mg/dL</span>
                    <span class="subject1"><?php echo $row['Sensor'] ?> %</span>
                    <span class="subject1"><i class="fa-sharp fa-solid fa-circle-check" style="color: #52eb00;"></i></span>
                </div>
                <img src=<?php echo "".$row['Img']."";?> alt="Example Image" width="48" height="48" class="photo">
                <p class="text_realtime">Real-Time</p>
                <div class="flex">
                  <div class="circle_madad">
                      <span class="text"><?php echo $row['Sugar_Level'] ?></span>
                      <span class="units">mg/dL</span>
                  </div>
                </div>
            </div>
            <div id="flex2">
            <div class="menuinside">
                <ul class="nav flex-row">
                  <li class="nav-item">
                    <a href="#" class="nav-link active " onclick="toggleActive(this)">
                        <i class="fa-solid fa-bars-progress"></i>Time at target destination</a></li>
                  <li class="nav-item">
                    <a href="#" class="nav-link" onclick="toggleActive(this)">
                        <i class="fa-solid fa-angles-up" style="color: #ffffff;"></i>
                       High Glucose Events
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link" onclick="toggleActive(this)">
                        <i class="fa-solid fa-angles-down" style="color: #ffffff;"></i>
                       Low Glucose Events
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link" onclick="toggleActive(this)">
                        <i class="fa-solid fa-list-check"></i>
                       Recommendation
                    </a>
                  </li>
                </ul>
              </div>
              <div class="change">
                <br>
                <div class="text-center">
                    <span class="text_time">Time at target destination</a>
                </div>
                <div class="m-4">
                  <ul class="nav nav-pills justify-content-center " id="myTab">
                      <li class="nav-item">
                          <a href="#" class="nav-link active  my-nav-link"><i class="fa-regular fa-calendar"><br></i>7 Days</a>
                      </li>
                      <li class="nav-item">
                          <a href="#" class="nav-link  my-nav-link"><i class="fa-regular fa-calendar"><br></i>14 Days</a>
                      </li>
                      <li class="nav-item">
                          <a href="#" class="nav-link  my-nav-link"><i class="fa-regular fa-calendar"><br></i>30 Days</a>
                      </li>
                      <li class="nav-item">
                        <a href="#" class="nav-link  my-nav-link"><i class="fa-regular fa-calendar"><br></i>90 Days</a>
                    </li><br>
                    <li class="nav-item">
                      <a href="#" class="nav-link  my-nav-linkk"><i class="fa-regular fa-calendar"><br></i>19/6-26/6</a>
                  </li>
                  </ul>
              </div>
              </div>
            <div>
          <div>
      </div>

      <script src="script.js"></script>
    </main>
    <footer>
      <span>&copy; Copyright 2023 SmartSugar</span>   
    </footer id=footer>
  </body>
</html>