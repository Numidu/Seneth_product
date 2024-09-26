<?php
// Start session for login tracking
session_start();

// Include the database connection
include ('connection.php'); 

// Check if form is submitted using POST method
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve the username and password from the form
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Prepare SQL statement to select user with matching username
    $stmt = $conn->prepare("SELECT * FROM admin WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    
    // Check if user exists and password matches
    if ($user && $password == $user['password']) {
        // Store login state in session and redirect to dashboard
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_id'] = $user['id'];
        header('Location: Dashbord.php');
        exit();
    } else {
        // Display error message if credentials are incorrect
        $error = "Invalid login credentials!";
    }
}
?>

<!-- HTML for the login form with Bootstrap and styling -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700;900&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom styles for the login form */
        body {
            background-color: #DEE5D4; /* Blue background */
            color: white; /* White text */
            margin: 0%;
            top: 50%;
        }
        .login-container {
            margin-top: 250px;
            
        }
        .login-box {
            background-color: white;
            color: #007bff; /* Blue text for form */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.2);
            font-family: 'Roboto',Arial, Helvetica, sans-serif;
        }
        .login-box input {
            margin-bottom: 15px;
        }
        .login-box h1{
            font-weight: 700;
            color: black;
        }
    </style>
</head>
<body>

<div class="container login-container ">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="login-box">
                <h1 class="text-center">Admin Login</h1>
                <form method="POST" action="">
                    <!-- Username input -->
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" required>
                    </div>
                    <!-- Password input -->
                    <div class="form-group mb-4">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
                    </div>
                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary w-100 justify-content-center m-auto">Login</button>
                    <!-- Display error message if exists -->
                    <?php if (isset($error)) echo "<p class='text-danger '>$error</p>"; ?>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
