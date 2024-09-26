<?php 
include('connection.php'); 
session_start(); // Ensure session is started
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        
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

        /* Main container for the page */
        .container {
            margin-top: 50px;
        }

        /* Table styles */
        .tbl-full {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            font-size: 1rem;
        }

        .tbl-full th, .tbl-full td {
            padding: 12px 15px;
            text-align: left;
            border: 1px solid #ddd;
        }

        .tbl-full th {
            background-color: #343a40; /* Dark header */
            color: #ffffff;
            font-weight: bold;
        }

        .tbl-full td {
            background-color: #f9f9f9;
        }

        .tbl-full tr:hover {
            background-color: #f1f1f1; /* Hover effect */
        }

        /* Button styles */
        .btn-primary {
            background-color: #28a745;
            border: none;
            padding: 10px 15px;
            margin-bottom: 15px;
            text-decoration: none;
            color: #fff;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #218838;
        }

        .btn-danger {
            background-color: #dc3545;
            border: none;
            padding: 5px 10px;
            text-decoration: none;
            color: #fff;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        /* Session message styling */
        .session-message {
            margin-bottom: 20px;
            padding: 10px;
            background-color: #e7f5ff;
            border-left: 4px solid #007bff;
            font-size: 1rem;
        }

        h1 {
            margin-bottom: 20px;
        }

        /* Mobile responsiveness */
        @media (max-width: 768px) {
            .tbl-full th, .tbl-full td {
                font-size: 0.9rem;
            }
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

<div class="container">
    <h1 class="my-4">Manage Admin</h1>

    <?php
    // Display session messages
    if(isset($_SESSION['add'])) {
        echo "<div class='session-message'>" . $_SESSION['add'] . "</div>"; 
        unset($_SESSION['add']); 
    }
    if(isset($_SESSION['delete'])) {
        echo "<div class='session-message'>" . $_SESSION['delete'] . "</div>"; 
        unset($_SESSION['delete']); 
    }
    if(isset($_SESSION['update'])) {
        echo "<div class='session-message'>" . $_SESSION['update'] . "</div>"; 
        unset($_SESSION['update']); 
    }
    ?>

    <!-- Add Admin Button -->
    <a href="Add.php" class="btn-primary">Add Admin</a>

    <!-- Admin Table -->
    <table class="tbl-full">
        <tr>
            <th>Admin Number</th>
            <th>Full Name</th>
            <th>Username</th>
            <th>Actions</th>
        </tr>

        <?php
        // Fetch all admins from the database
        $sql = "SELECT * FROM admin";
        $res = mysqli_query($conn, $sql);

        if($res == TRUE) {
            $sn = 1; // Serial number
            $count = mysqli_num_rows($res);

            if($count > 0) {
                // Display admins
                while($rows = mysqli_fetch_assoc($res)) {
                    $id = $rows['id'];
                    $full_name = $rows['full_name'];
                    $username = $rows['username'];
                    ?>
                    <tr>
                        <td><?php echo $sn++; ?></td>
                        <td><?php echo $full_name; ?></td>
                        <td><?php echo $username; ?></td>
                        <td>
                            <a href="delete.php?id=<?php echo $id; ?>" class="btn-danger" onclick="return confirm('Are you sure you want to delete this admin?');">Delete</a>
                        </td>
                    </tr>
                    <?php
                }
            } else {
                // No admins found
                ?>
                <tr>
                    <td colspan="4">No Admins Found</td>
                </tr>
                <?php
            }
        }
        ?>
    </table>
</div>
<?php include('Menu/footer.php'); ?>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXlG0uFO2zXr2NXFoLgrjIKaLDFJ6XT1t3QcKt69R3NXFf6bM038C47iL6X" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhG81r6tZqWgnQJR5f7KKg2vvoC2EohFVvYQxjwXoPs+VxKf5fkWue5Hj9HG" crossorigin="anonymous"></script>
</body>
</html>
