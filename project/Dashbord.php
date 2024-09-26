<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700;900&display=swap" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa; /* Light background for the entire page */
            font-style: 'Roboto',Arial, Helvetica, sans-serif;
        }
        .navbar {
            background-color: #8EACCD; /* Custom background color */
        }

        .logo {
            width: 200px;
        }

        .nav-link {
            color: #fff !important;
            font-size: 1.1rem;
            font-weight: 500;
            transition: color 0.3s ease-in-out;
        }

        .nav-link:hover {
            color: #DEE5D4 !important; /* Change color on hover */
        }

        .nav-link.active {
            color: #FEF9D9 !important;
            font-weight: bold; /* Make active link more visible */
        }

        .navbar-toggler {
            border: none;
        }

        /* Custom container width */
        .container-fluid {
            max-width: 1200px;
        }

        /* Ensure consistency across the navbar */
        @media (max-width: 992px) {
            .navbar-nav {
                text-align: center;
            }
            .nav-item {
                margin-bottom: 10px;
            }
        }
        .card {
            border-radius: 10px; /* Rounded corners for a softer look */
            transition: transform 0.2s ease-in-out; /* Smooth hover effect */
        }
        .card:hover {
            transform: scale(1.05); /* Slight zoom on hover */
        }
        .card-title {
            font-size: 1.5rem; /* Larger, readable text */
            font-weight: bold;
            text-transform: uppercase; /* Professional touch with uppercase titles */
        }
        .container {
            max-width: 1200px; /* Limit the width for a centered, contained layout */
        }
        .admin-title {
            font-weight: 700;
        }
        .card-body .odersNo{
            color:#ff0000;
        }
        .card-body h1{
            font-size:3.5rem;
        }
    </style>
</head>
<body>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <!-- Logo -->
            <!--<a class="navbar-brand text-white" href="#">Logo</a>-->
            <a href="Dashbord.php" class=" d-flex align-items-center me-auto me-xl-0 my-2">
                <img src="image/logo/logo -1.png"  class="logo">
            </a>

            <!-- Toggler for mobile view -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navigation Links -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="Dashbord.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="Manage_order.php">Order Section</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="manageAdmin.php">Manage Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="newfile.php">Manage Food</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
 
  <?php 
  include('connection.php'); 
   $sql="select * from  admin";
   $res=mysqli_query($conn,$sql);
   $count=mysqli_num_rows($res);
   

   $sql1="select * from  enquiries";
   $res1=mysqli_query($conn,$sql1);
   $count1=mysqli_num_rows($res1);
   
   $sql2 = "SELECT * FROM frozen 
         UNION ALL 
         SELECT * FROM nutritional 
         UNION ALL 
         SELECT * FROM organic";
$res2 = mysqli_query($conn, $sql2);
$count2 = mysqli_num_rows($res2);


   ?>



<!-- Admin Dashboard Container -->
<div class="container mt-5 mb-5">
    <h1 class=" text-center my-5 admin-title">Admin Dashboard</h1>
    
    <!-- First Row of Cards -->
    <div class="row">
        <!-- Food Category Card -->
        <div class="col-md-6 mb-2 p-3">
            <div class="card shadow-sm" style="background-color: #D2E0FB; height: 12rem;">
                <div class="card-body d-flex flex-column justify-content-center align-items-center">
                    <h5 class="card-title">Food Category</h5>
                    <h1>3</h1>
                </div>
            </div>
        </div>
        
        <!-- Food Item Card -->
        <div class="col-md-6 mb-2 p-3">
            <div class="card shadow-sm" style="background-color: #FEF9D9; height: 12rem;">
                <div class="card-body d-flex flex-column justify-content-center align-items-center">
                    <h5 class="card-title">Food Items</h5>
                    <h1><?php echo $count2 ?></h1>
                </div>
            </div>
        </div>

    </div>

    <!-- Second Row of Cards -->
    <div class="row">

        <!-- Admin Card -->
        <div class="col-md-6 mb-2 p-3">
            <div class="card shadow-sm" style="background-color: #DEE5D4; height: 12rem;">
                <div class="card-body flex-column d-flex justify-content-center align-items-center">
                    <h5 class="card-title">Admins</h5>
                    <h1><?php echo $count ?></h1>
                </div>
            </div>
        </div>

        <!-- Orders Card -->
        <div class="col-md-6 mb-2 p-3">
            <div class="card shadow-sm" style="background-color: #8EACCD; height: 12rem;">
                <div class="card-body d-flex flex-column justify-content-center align-items-center">
                    <h5 class="card-title">No.of Enquiries</h5>
                    <h1 class="odersNo"><?php echo $count1?></h1>
                </div>
            </div>
        </div>

        
    </div>
</div>

<?php include('Menu/footer.php'); ?>

<!-- Optional Bootstrap JS and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXlG0uFO2zXr2NXFoLgrjIKaLDFJ6XT1t3QcKt69R3NXFf6bM038C47iL6X" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhG81r6tZqWgnQJR5f7KKg2vvoC2EohFVvYQxjwXoPs+VxKf5fkWue5Hj9HG" crossorigin="anonymous"></script>

</body>
</html>