<?php 
    include('connection.php'); 
    session_start();

    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = $_GET['id'];

        // Retrieve the password of the admin before attempting to delete
        $sql1 = "SELECT password FROM admin WHERE id = ?";
        $stmt1 = mysqli_prepare($conn, $sql1);
        mysqli_stmt_bind_param($stmt1, "i", $id);
        mysqli_stmt_execute($stmt1);
        $res1 = mysqli_stmt_get_result($stmt1);

        if ($row = mysqli_fetch_assoc($res1)) {
            $pwd = $row['password'];
        } else {
            echo "<script>alert('Admin not found.'); window.location.href = 'manageAdmin.php';</script>";
            exit();
        }

        // Prompt for password using JavaScript
        echo "<script>
            var enteredPassword = prompt('Enter password');
            if (enteredPassword) {
                // Redirect to password validation and deletion logic
                window.location.href = 'deleteAdmin.php?id=$id&enteredPassword=' + enteredPassword;
            } else {
                alert('No password entered.');
                window.location.href = 'manageAdmin.php';
            }
        </script>";
    } else {
        $_SESSION['delete'] = "<div class='error'>Invalid ID provided.</div>";
        header('location: manageAdmin.php');
        exit();
    }
?>
