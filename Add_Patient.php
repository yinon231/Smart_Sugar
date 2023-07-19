<?php
include "db.php";
include "config.php";
session_start();
if(!isset($_SESSION['id']))
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
    <link href="https://fonts.googleapis.com/css?family=Amiko:regular,600,700" rel="stylesheet" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
</head>
<body>
    <header>
        <a href="index.php" id="logo"></a>
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
                        <a class="nav-link" href="index.php">
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
              <a class="nav-link" aria-current="page" href="index.php">My Profiles</a>
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
  <div class="container-fluid add">
  <h1>Add Profile</h1>
  <form action="" method="post" enctype="multipart/form-data" id="Add">
        <div class="avatar-upload">
          <div class="avatar-preview">
            <div class="avatar-edit">
              <label id="pencil" for="imageUpload"></label>
              <input name="image" type='file' id="imageUpload" accept=".png, .jpg, .jpeg"/>
            </div>
              <div id="imagePreview"></div>
          </div>
        </div>
        <div class="mb-3">
            <label class="form-label">Full Name</label>
            <input type="text" name="fullName" class="form-control" id="fullName" pattern="^[A-Za-z]+(?:\s[A-Za-z]+)+$" required title="Please enter a valid name (letters and spaces only)" required>
        </div> 
        <div class="mb-3">
            <label class="form-label">Height</label>
            <input type="number" name="height" class="form-control" required min="70" max="250">
        </div>
        <div class="mb-3">
          <label class="form-label">Weight</label>
          <input type="number" name="weight" class="form-control" required min="20" max="300">
        </div>
        <div class="mb-3">
          <label class="form-label">Age</label>
          <input type="number" name="age" class="form-control" required min="0" max="120">
        </div>
        <select name="type" class="form-select mb-3-top" aria-label="Default select example">
          <option selected disabled>Choose diabetes type</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="Pre-Diabetes">Pre-Diabetes</option>
        </select>
          <div class="mb-3">
          <label class="form-label">Blood Pressure</label>
          <input type="number" name="blood" class="form-control" required min="10" max="440">
        </div>
        <div class="mb-3 center">
              <input type="submit" class="btn btn-outline-secondary" value="Add Profile" id="btn-form">
        </div>
        <?php
        if(!empty($_POST['fullName']))
        {
         $id=$_SESSION['id'];
         $targetDirectory = 'uploads/';
         if(!isset($_POST['image']))
         {
             $targetFile = $targetDirectory . 'default.png';
         }
         else{
             $targetFile = $targetDirectory . basename($_FILES['image']['name']);
             move_uploaded_file($_FILES['image']['tmp_name'], $targetFile); 
         } 
        
       
         $name=$_POST['fullName'];
         $height=$_POST['height'];
         $weight=$_POST['weight'];
         $age=$_POST['age'];
         $type=$_POST['type'];
         $blood_pressure=$_POST['blood'];
         $sugar_level=100;
         $prediction_sugar=100;
         $sensor=100;
         $query = "INSERT INTO tbl_203_patients (UserID,name,Type,Height,Weight,Age,Blood_Pressure,Img,Sugar_Level,Prediction_Level,Sensor) VALUES ('$id', '$name','$type','$height','$weight', '$age', '$blood_pressure', '$targetFile','$sugar_level','$prediction_sugar','$sensor')";
         $result = mysqli_query($connection, $query);
       
         if ($result && mysqli_affected_rows($connection) > 0) 
         {
         
            echo "<div class='alert alert-success' role='alert'>Add Patient Successfully!</div>";
            echo "<script>setTimeout(function(){ window.location.href = '".URL."index.php'; }, 2000);</script>";
            mysqli_close($connection);
           
            exit();
          } else if(mysqli_affected_rows($connection) == 0) {
            die ("Error inserting data: " . mysqli_error($connection));
          }
        }
        ?>
       
    </form>
    </div>
  </main> 
  <footer class="footernoabs">
    <span>&copy; Copyright 2023 SmartSugar</span>   
  </footer>
  <script src="js/Add.js"></script>
</body>
</html>