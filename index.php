<?php 
include "db.php";
include "config.php";
session_start();
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Amiko:regular,600,700" rel="stylesheet" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.3/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
  <header>
    <a href="#" id="logo"></a>
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
                    <a class="nav-link" href="#">
                        <span class="material-symbols-outlined icons-nav">person</span>
                        My Profiles
                    </a>
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
                <a class="nav-link" href="#">
                    <span class="material-symbols-outlined icons-nav">notifications</span>
                    Notifications
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                    <span class="material-symbols-outlined icons-nav">settings</span>
                    Settings
                </a>
              </li>
          </ul>
        </div>
      </div>
    </div>
    <ul class="nav nav-underline">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="#">My Profiles</a>
        </li>
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
        <a href="#" class="material-symbols-outlined" >
            <span class="material-symbols-outlined">notifications</span>
        </a>
        <a href="#" class="material-symbols-outlined" >
            <span class="material-symbols-outlined">settings</span>
        </a>
        <a href="#" id="circle"></a>
    </div>
</header>
  <main>
    <?php
    if (isset($_SESSION['id'])) {
      $query="SELECT * FROM tbl_203_patients WHERE UserID=".$_SESSION['id']."";
      $result=mysqli_query($connection,$query);
    } else {
      header('Location: ' .URL. 'login.php');
      
    }
    ?>

  
    <div class="container size-cf">
    <h1 id ="profiles_text">Profiles</h1>
    <h3 id ="List_text">List Of Your Patients</h3>
    <input type="text" class="form-control search" placeholder="  Search" width="40px">
    <div class="btn-div">
      <button class="btn btn-style" title="Add Profile" onclick="window.location.href = 'Add_Patient.html';">+ Add Profile</button>
    </div>
    <?php
    if(!empty($query))
    {
      while($row=mysqli_fetch_assoc($result))
      {
        echo  "<div class='small'>
        <div class='profile-small'>
          <div class='cover'>
              <img src=".$row['Img']." width='48' height='48' alt='' style='border-radius: 50%;'>
              <div class='data'>
                <span id='bold'>".$row['name']."</span>
                <div class='flex-data'>
                    <span>type ".$row['Type']."</span>
                    <span id='network-small'></span>
                    <span>".$row['Sugar_Level']." mg/dL</span>
                </div>
              </div>
            </div>
          <button class='btn btn-style'>Edit</button>
        </div>
      </div>";
      }
      
    }
    if (isset($_SESSION['id'])) {
      $query="SELECT * FROM tbl_203_patients WHERE UserID=".$_SESSION['id']."";
      $result=mysqli_query($connection,$query);
    
     
    } else {
      header('Location: ' .URL. 'login.php');
      
    }
   
    if(!empty($query))
    {
    echo "<div class='container big'>
        <div class='row'>
          <div class='col-1'>ID</div>
          <div class='col-3'>Name</div>
          <div class='col-1'>Type</div>
          <div class='col-2'>Measure</div>
          <div class='col-2'>Status</div>
          <div class='col-3'>Actions</div>
        </div>";
        while($row=mysqli_fetch_assoc($result))
        {
        echo
          "<div class='row row-profile' onclick=\'window.location.href = '2.html';'>
            <div class='col-1'>".$row['PatientID']."</div>
            <div class='col-3'>
              <img src=".$row['Img']." width='48' height='48' alt='' style='border-radius: 50%' onclick=\'window.location.href = '2.html';'>
              ".$row['name']."
            </div>            
            <div class='col-1'>".$row['Type']."</div>
            <div class='col-2'>".$row['Sugar_Level']." mg/dL</div>
            <div class='col-2'>
              <span id='network'></span>
            </div>
            <div class='col-3'>
              <button class='custom-bg-color' title='Select User' onclick=\'window.location.href = '2.html';'>Select</button>
              <button class='btn btn-secondary rounded-circle' data-toggle='tooltip' data-placement='top' title='Edit User'><i class='fas fa-pen'></i></button>
              <button class='btn btn-danger rounded-circle' data-toggle='tooltip' data-placement='top' title='Delete User'><i class='fas fa-times'></i></button>
            </div>
          </div>
        </div>
      </div>";
        }
      }
    ?>
    </main>
    <footer>
      <span>&copy; Copyright 2023 SmartSugar</span>   
    </footer id=footer>
    <script src="js/script.js"></script>
  </body>
</html>