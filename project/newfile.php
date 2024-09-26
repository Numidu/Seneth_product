<?php
include('connection.php'); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collecting form data
    $name = $_POST['name'];
    $category = $_POST['category'];
    $appearance = htmlspecialchars($_POST['appearance']);
    $flavour = htmlspecialchars($_POST['flavour']);
    $texture = htmlspecialchars($_POST['texture']);
    $ingredient = htmlspecialchars($_POST['ingredient']);
    $tags = htmlspecialchars($_POST['tags']);
    $detail1 = htmlspecialchars($_POST['detail1']);
    $detail2 = htmlspecialchars($_POST['detail2']);
    $detail3 = htmlspecialchars($_POST['detail3']);
    $selectedTable = $_POST['selected_table']; // Dropdown-selected table

    // Handling the image upload
    $targetDir = "image/";  
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true); // Create the directory if it doesn't exist
    }

    $uniqueFileName = uniqid() . "-" . basename($_FILES["image"]["name"]);
    $targetFile = $targetDir . $uniqueFileName;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if image file is an actual image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check === false) {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check file size (500KB limit)
    if ($_FILES["image"]["size"] > 600000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    $allowedFormats = ['jpg', 'jpeg', 'png', 'gif'];
    if (!in_array($imageFileType, $allowedFormats)) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Proceed if file upload checks pass
    if ($uploadOk == 1 && move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
        // Start transaction
        $conn->begin_transaction();
        try {
            // Insert data into selected table (Frozen, Nutritional, Organic)
            if ($selectedTable == 'frozen') {
                $stmt = $conn->prepare("INSERT INTO Frozen (name, image) VALUES (?, ?)");
                $stmtDetails = $conn->prepare("INSERT INTO FrozenDetails (name, image, appearance, flavour, texture, ingredient, category, tags) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
                $stmtNewTable = $conn->prepare("INSERT INTO NewTable (name, detail1, detail2, detail3) VALUES (?, ?, ?, ?)");
            } elseif ($selectedTable == 'nutrition') {
                $stmt = $conn->prepare("INSERT INTO Nutritional (name, image) VALUES (?, ?)");
                $stmtDetails = $conn->prepare("INSERT INTO NutritionalDetails (name, image, appearance, flavour, texture, ingredient, category, tags) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
                $stmtNewTable = $conn->prepare("INSERT INTO NewTable2 (name, detail1, detail2, detail3) VALUES (?, ?, ?, ?)");
            } elseif ($selectedTable == 'organic') {
                $stmt = $conn->prepare("INSERT INTO Organic (name, image) VALUES (?, ?)");
                $stmtDetails = $conn->prepare("INSERT INTO OrganicDetails (name, image, appearance, flavour, texture, ingredient, category, tags) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
                $stmtNewTable = $conn->prepare("INSERT INTO NewTable3 (name, detail1, detail2, detail3) VALUES (?, ?, ?, ?)");
            } else {
                throw new Exception("Invalid table selected.");
            }

            // Binding parameters for insertion into the main table
            $stmt->bind_param("ss", $name, $targetFile);
            if (!$stmt->execute()) {
                throw new Exception("Error inserting data: " . $stmt->error);
            }

            // Binding parameters for insertion into details table
            $stmtDetails->bind_param("ssssssss", $name, $targetFile, $appearance, $flavour, $texture, $ingredient, $category, $tags);
            if (!$stmtDetails->execute()) {
                throw new Exception("Error inserting data into details table: " . $stmtDetails->error);
            }

            // Binding parameters for insertion into the additional details table
            $stmtNewTable->bind_param("ssss", $name, $detail1, $detail2, $detail3);
            if (!$stmtNewTable->execute()) {
                throw new Exception("Error inserting data into new table: " . $stmtNewTable->error);
            }

            // Commit transaction
            $conn->commit();
            echo "<div class='alert alert-success'>The file " . basename($_FILES["image"]["name"]) . " has been uploaded, and product information has been saved.</div>";

            // Redirect after successful upload
            echo "<script>alert('Update Successful');window.location.href = 'newfile.php';</script>";

        } catch (Exception $e) {
            // Rollback transaction if any error occurs
            $conn->rollback();
            echo "<div class='alert alert-danger'>Transaction failed: " . $e->getMessage() . "</div>";
        }

        $stmt->close();
        $stmtDetails->close();
        $stmtNewTable->close();
    } else {
        echo "<div class='alert alert-danger'>Sorry, your file was not uploaded.</div>";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Product Details</title>
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
        h1 {
            margin-bottom: 30px;
            font-size: 2rem;
            color: #343a40;
        }
        .form-control {
            border-radius: 0.375rem;
            box-shadow: none;
        }
        .alert {
            margin-top: 20px;
        }
        textarea.form-control {
            resize: vertical;
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
    <div class="container mb-5 shadow p-4 rounded">
        <h1 class="fw-bold mb-4">Enter Product Details</h1>
        <form method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="selected_table" class="form-label">Select Product Category:</label>
                <select name="selected_table" id="selected_table" class="form-select" required>
                    <option value="frozen">Frozen No Preservatives</option>
                    <option value="nutrition">No Preservatives Nutritional Confectionaries</option>
                    <option value="organic">Organic No Preservatives</option>
                </select>
            </div>

            <h3>Product Information,</h3>

            <div class="row">
                <div class="mb-3 col-12 col-sm-6">
                    <label for="name" class="form-label">Product Name:</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>

                <div class="mb-3 col-12 col-sm-6">
                    <label for="appearance" class="form-label">Appearance:</label>
                    <input type="text" name="appearance" id="appearance" class="form-control" required>
                </div>

                <div class="mb-3 col-12 col-sm-6">
                    <label for="flavour" class="form-label">Flavour:</label>
                    <input type="text" name="flavour" id="flavour" class="form-control" required>
                </div>

                <div class="mb-3 col-12 col-sm-6">
                    <label for="texture" class="form-label">Texture:</label>
                    <input type="text" name="texture" id="texture" class="form-control" required>
                </div>

                <div class="mb-3 col-12 col-sm-6">
                    <label for="ingredient" class="form-label">Ingredient:</label>
                    <input type="text" name="ingredient" id="ingredient" class="form-control" required>
                </div>

                <div class="mb-3 col-12 col-sm-6">
                    <label for="category" class="form-label">Category:</label>
                    <select name="category" id="category" class="form-select" required>
                        <option value="Frozen No Preservatives">Frozen No Preservatives</option>
                        <option value="No Preservatives Nutritional Confectionaries">No Preservatives Nutritional Confectionaries</option>
                        <option value="Organic No Preservatives">Organic No Preservatives</option>
                    </select>
                </div>

                <div class="mb-3 col-12">
                    <label for="tags" class="form-label">Tags:</label>
                    <input type="text" name="tags" id="tags" class="form-control">
                </div>

            </div>

            <h3>Description Details,</h3>

            <div class="row">
                <div class="mb-3">
                    <label for="detail1" class="form-label">Product Description:</label>
                    <input type="text" name="detail1" id="detail1" class="form-control" required>
                </div>

                <div class="mb- col-12 col-sm-6">
                    <label for="detail2" class="form-label">Shelf life:</label>
                    <input type="text" name="detail2" id="detail2" class="form-control">
                </div>

                <div class="mb-3 col-12 col-sm-6">
                    <label for="detail3" class="form-label">Packing:</label>
                    <input type="text" name="detail3" id="detail3" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Upload Product Image:</label>
                    <input type="file" name="image" id="image" class="form-control" required>
                </div>

                <div class="mb-3 mt-4">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="delete_food.php" class="btn btn-danger mx-3">Delete Product</a>
                </div>
            </div>
            
        </form>
        
    </div>

    <?php include('Menu/footer.php'); ?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXlG0uFO2zXr2NXFoLgrjIKaLDFJ6XT1t3QcKt69R3NXFf6bM038C47iL6X" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhG81r6tZqWgnQJR5f7KKg2vvoC2EohFVvYQxjwXoPs+VxKf5fkWue5Hj9HG" crossorigin="anonymous"></script></body>
</html>
