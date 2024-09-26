<?php 
include('connection.php'); 

// Get the ID from the URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Fetch data from the database
$sql = "SELECT * FROM enquiries WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

if (!$data) {
    echo "<div class='container mt-5'><div class='alert alert-danger'>No data found for ID: " . htmlspecialchars($id) . "</div></div>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">    
    
    <style>
        .navbar {
            background-color: #8EACCD; /* Custom background color */
        }

        .navbar .logo {
            width: 200px;
        }

        .navbar .nav-link {
            color: #fff !important;
            font-size: 1.1rem;
            font-weight: 500;
            transition: color 0.3s ease-in-out;
        }

        .navbar .nav-link:hover {
            color: #DEE5D4 !important; /* Change color on hover */
        }

        .navbar .nav-link.active {
            color: #FEF9D9 !important;
            font-weight: bold; /* Make active link more visible */
        }

        .navbar .navbar-toggler {
            border: none;
        }

        /* Custom container width */
        .navbar .container-fluid {
            max-width: 1200px;
        }

        /* Ensure consistency across the navbar */
        @media (max-width: 992px) {
            .navbar .navbar-nav {
                text-align: center;
            }
            .navbar.nav-item {
                margin-bottom: 10px;
            }
        }

        body {
            background-color: #f1f1f1;
            font-family: Arial, sans-serif;
        }
        .details-container {
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 800px;
        }
        .details-container h2 {
            margin-bottom: 20px;
            font-size: 1.75rem;
            color: #333;
        }
        .details-container p {
            margin-bottom: 10px;
            font-size: 1.1rem;
        }
        .details-container p strong {
            color: #555;
        }
        .details-container .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .details-container .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
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
                        <a class="nav-link active" href="Manage_order.php">Order Section</a>
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

    <div class="container details-container mt-5">
        <h2>Order Details</h2>
        <p><strong>Order Date:</strong> <?php echo htmlspecialchars($data['date']); ?></p>
        <p><strong>Customer First Name:</strong> <?php echo htmlspecialchars($data['fname']); ?></p>
        <p><strong>Customer Last Name:</strong> <?php echo htmlspecialchars($data['sname']); ?></p>
        <p><strong>Contact Number:</strong> <?php echo htmlspecialchars($data['contact']); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($data['email']); ?></p>
        <p><strong>Address:</strong> <?php echo htmlspecialchars($data['address']); ?></p>
        <p><strong>Country:</strong> <?php echo htmlspecialchars($data['country']); ?></p>
        <p><strong>Enquiry:</strong> <?php echo htmlspecialchars($data['enquiry']); ?></p>
        <a href="Manage_order.php" class="btn btn-primary">Back to Orders</a>
        <a href="download_details.php?id=<?php echo htmlspecialchars($id); ?>" class="btn btn-success">Download Details as CSV</a>

    </div>
    <?php include('Menu/footer.php'); ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXlG0uFO2zXr2NXFoLgrjIKaLDFJ6XT1t3QcKt69R3NXFf6bM038C47iL6X" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhG81r6tZqWgnQJR5f7KKg2vvoC2EohFVvYQxjwXoPs+VxKf5fkWue5Hj9HG" crossorigin="anonymous"></script>
</body>
</html>
