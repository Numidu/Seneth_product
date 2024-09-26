<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Admin Panel</title>
    <style>
        /* Professional Styling */
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
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <!-- Logo -->
            <!--<a class="navbar-brand text-white" href="#">Logo</a>-->
            <a href="index.php" class=" d-flex align-items-center me-auto me-xl-0 my-2">
                <img src="image/logo/logo.png"  class="logo">
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
                        <a class="nav-link" href="Manage_order.php">Order Section</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="manageAdmin.php">Manage Admin</a>
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

    <!-- Optional Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXlPILFyFXgK6rRL1h6fk9yDN5hfI1Pvj0zj3iwvVHm0v8ABC9f4p5p2EkT0" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGfH7L3v1SFA2xuxn0fI4oCSZotfwOjv1pNQDjcu5p4p6n0fEnqHo1kB7yS" crossorigin="anonymous"></script>
</body>
</html>
