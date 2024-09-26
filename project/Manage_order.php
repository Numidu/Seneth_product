<?php 
include('connection.php'); 
session_start(); 
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

        /* Ensure the container allows for wide content */
        .full-table{
            width: 100%; /* Full width of container */
            max-width: none; /* Remove any width limits */
            border-collapse: collapse;
            margin: 20px 0px;
            font-size: 1rem;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            padding:10px 0px;
        }
        .table-container{
            padding: 20px;
            background-color: #fefefe;
            border-radius: 8px;
            overflow-x: auto; /* Enable horizontal scrolling if needed */
        }

        /* Table styling */
        .tbl-full {
            width: 100%; /* Full width of container */
            max-width: none; /* Remove any width limits */
            min-width: 1500px; /* Ensure the table is wide */
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 1rem;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
        }

        .tbl-full th, .tbl-full td {
            padding: 12px 15px;
            border: 1px solid #ddd;
        }

        .tbl-full th {
            background-color: #4CAF50; /* Header background */
            color: #ffffff;
            text-align: left;
        }

        .tbl-full td {
            background-color: #f9f9f9; /* Row background */
        }

        /* Hover effect on rows */
        .tbl-full tr:hover {
            background-color: #f1f1f1;
        }

        /* Zebra striping */
        .tbl-full tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .tbl-full td:nth-last-child(2) {
            font-weight: bold;
            color: #e74c3c;
        }

        /* Responsive table: make it scrollable */
        @media (max-width: 768px) {
            .table-container {
                overflow-x: scroll; /* Horizontal scroll for small screens */
            }
        }

        /* Heading styling */
        .table-container h2 {
            margin-bottom: 20px;
            font-size: 1.5rem;
            color: #333;
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
    
    <div class="container-fluid my-5 full-table">
        <h2 class="mt-4 fw-bold mx-2">Customer Enquiries Details</h2>
        <div class="table-container">
            
            <table class="tbl-full">
                <tr>
                    <th>#</th>
                    <th>Order Date</th>
                    <th>Customer FName</th>
                    <th>Customer LName</th>
                    <th>Customer Contact No.</th>
                    <th>Customer Email</th>
                    <th>Customer Address</th>
                    <th>Country</th>
                    <th>Enquiry</th>
                    <th>Status</th> <!-- New column -->
                    <th>Action</th> <!-- Add this header -->

                </tr>
                
                <?php
                $sql = "SELECT * FROM enquiries ORDER BY id DESC;";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);
                $sn = 1;

                if ($count > 0) {
                    while ($row = mysqli_fetch_assoc($res)) {
                        $id = $row['id'];
                        $fname = $row['fname'];
                        $sname = $row['sname'];
                        $customer_contact = $row['contact'];
                        $customer_email = $row['email'];
                        $customer_address = $row['address'];
                        $country = $row['country'];
                        $enquiry = $row['enquiry'];
                        $order_date = $row['date'];

                        // Truncate long descriptions
                        $truncated_enquiry = strlen($enquiry) > 50 ? substr($enquiry, 0, 50) . '...' : $enquiry;

                        // Determine if the order is new (within the last 24 hours)
                        $current_date = date("Y-m-d H:i:s");
                        $time_difference = strtotime($current_date) - strtotime($order_date);
                        $is_new_order = ($time_difference <= 86400); // 86400 seconds = 24 hours
                        ?>

                        <tr>
                            <td><?php echo $sn++; ?></td>
                            <td><?php echo $order_date; ?></td>
                            <td><?php echo $fname; ?></td>
                            <td><?php echo $sname; ?></td>
                            <td><?php echo $customer_contact; ?></td>
                            <td><?php echo $customer_email; ?></td>
                            <td><?php echo $customer_address; ?></td>
                            <td><?php echo $country; ?></td>
                            <td><?php echo $truncated_enquiry; ?></td>
                            <td><?php echo $is_new_order ? 'New' : ''; ?></td> <!-- Display "New Order" -->
                            <td>
                                <a href="view_details.php?id=<?php echo $id; ?>" class="btn btn-info btn-sm">View</a>
                            </td>

                        </tr>

                        <?php
                    }
                } else {
                    echo "<tr><td colspan='10'>No orders found.</td></tr>"; // Updated colspan to 10
                }
                ?>
            </table>
        </div>
    </div>

<?php include('Menu/footer.php'); ?>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXlG0uFO2zXr2NXFoLgrjIKaLDFJ6XT1t3QcKt69R3NXFf6bM038C47iL6X" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhG81r6tZqWgnQJR5f7KKg2vvoC2EohFVvYQxjwXoPs+VxKf5fkWue5Hj9HG" crossorigin="anonymous"></script>
</body>
</html>

