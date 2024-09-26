<?php
include('connection.php'); 
$selected_category = isset($_POST['category']) ? $_POST['category'] : 'frozen';

$sql = "SELECT * FROM $selected_category";
$res = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Filter</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #495057;
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

        .container {
            margin-top: 50px;
        }
        .form-control, .form-select {
            border-radius: 0.375rem;
            box-shadow: none;
        }
        .table {
            margin-top: 20px;
        }
        .table img {
            max-width: 100px;
            height: auto;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
        .alert {
            margin-top: 20px;
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
                    <li class="nav-item ">
                        <a class="nav-link " aria-current="page" href="Dashbord.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="Manage_order.php">Order Section</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="manageAdmin.php">Manage Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="newfile.php">Manage Food</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav> 

    <div class="container mb-5">
        <h1 class="mb-4">Product List</h1>

        <!-- HTML Form to select category -->
        <form method="POST" action="" class="mb-4">
            <div class="mb-3">
                <label for="category" class="form-label">Select Product Category:</label>
                <select name="category" id="category" class="form-select" required>
                    <option value="frozen" <?php if($selected_category == 'frozen') echo 'selected'; ?>>Frozen No Preservatives</option>
                    <option value="nutritional" <?php if($selected_category == 'nutritional') echo 'selected'; ?>>No Preservatives Nutritional Confectionaries</option>
                    <option value="organic" <?php if($selected_category == 'organic') echo 'selected'; ?>>Organic No Preservatives</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Filter</button>
        </form>

        <!-- Display data in a table -->
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>SN</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($res == TRUE) {
                    $sn = 1;
                    $count = mysqli_num_rows($res);

                    if ($count > 0) {
                        while ($rows = mysqli_fetch_assoc($res)) {
                            $id = $rows['id'];
                            $name = $rows['name'];
                            $image = $rows['image'];
                            
                            ?>
                            <tr>
                                <td><?php echo $sn++; ?></td>
                                <td><?php echo htmlspecialchars($name); ?></td>
                                <td><img src="<?php echo htmlspecialchars($image); ?>" alt="<?php echo htmlspecialchars($name); ?>"></td>
                                <td>
                                    <a href="deletefood.php?id=<?php echo $id; ?>&category=<?php echo urlencode($selected_category); ?>" 
                                       class="btn btn-danger btn-sm" 
                                       onclick="return confirm('Are you sure you want to delete this food?');">Delete</a>
                                </td>
                            </tr>
                            <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="5" class="text-center">No Items Found in Selected Category</td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </tbody>
        </table>

        <a href="Dashbord.php" class="btn btn-secondary">Back to Home</a>
    </div>
    <?php include('Menu/footer.php'); ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXlG0uFO2zXr2NXFoLgrjIKaLDFJ6XT1t3QcKt69R3NXFf6bM038C47iL6X" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhG81r6tZqWgnQJR5f7KKg2vvoC2EohFVvYQxjwXoPs+VxKf5fkWue5Hj9HG" crossorigin="anonymous"></script></body>
</html>
