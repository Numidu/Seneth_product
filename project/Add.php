<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa; /* Light background for the page */
            color: #495057; /* Dark text color */
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
        .main-content {
            margin-top: 50px;
        }
        .wrapper {
            background-color: #ffffff; /* White background for the form */
            padding: 30px;
            border-radius: 8px;
            box-shadow: 6px 6px 6px 6px rgba(0,0,0,0.4);
        }
        h1 {
            margin-bottom: 20px;
            font-size: 2rem;
            color: #343a40; /* Darker text color for the heading */
        }
        .tbl-30 {
            width: 100%; /* Make table full-width */
        }
        .tbl-30 td {
            padding: 10px;
        }
        .form-control {
            border-radius: 4px;
            box-shadow: none;
        }
        .success {
            color: #28a745; /* Green color for success messages */
            margin-bottom: 20px;
        }
        .error {
            color: #dc3545; /* Red color for error messages */
            margin-bottom: 20px;
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
                        <a class="nav-link " aria-current="page" href="Dashbord.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="Manage_order.php">Order Section</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="manageAdmin.php">Manage Admin</a>
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
    <!-- Main Content -->
    <div class="container main-content mb-5">
        <div class="wrapper">
            <h1>Add Admin</h1>

            <?php 
                if(isset($_SESSION['add'])) {
                    echo $_SESSION['add']; 
                    unset($_SESSION['add']); 
                }
            ?>

            <form action="" method="POST">
                <table class="tbl-30">
                    <tr>
                        <td><label for="full_name">Full Name: </label></td>
                        <td>
                            <input type="text" name="full_name" id="full_name" class="form-control" placeholder="Enter Your Name" required>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="username">Username: </label></td>
                        <td>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Your Username" required>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="password">Password: </label></td>
                        <td>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Your Password" required>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" name="submit" value="Add Admin" class="btn btn-primary">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>

    <?php include('Menu/footer.php'); ?>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXlG0uFO2zXr2NXFoLgrjIKaLDFJ6XT1t3QcKt69R3NXFf6bM038C47iL6X" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhG81r6tZqWgnQJR5f7KKg2vvoC2EohFVvYQxjwXoPs+VxKf5fkWue5Hj9HG" crossorigin="anonymous"></script></body>
</html>

<?php 
    include ('connection.php'); 
    if(isset($_POST['submit'])) {
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = $_POST['password']; 

        $sql = "INSERT INTO admin SET 
            full_name='$full_name',
            username='$username',
            password='$password'
        ";
 
        $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

        if($res == TRUE) {
            $_SESSION['add'] = "<div class='success'>Admin Added Successfully.</div>";
            echo "<script>location.href='manageAdmin.php';
             </script>";
            exit();
        } else {
            $_SESSION['add'] = "<div class='error'>Failed to Add Admin.</div>";
            echo "<script>location.href='Add.php';</script>";
        }
    }
?>
