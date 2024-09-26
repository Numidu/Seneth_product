<?php 
    include('connection.php'); 
    session_start();

    if (isset($_GET['id']) && isset($_GET['enteredPassword']) && is_numeric($_GET['id'])) {
        $id = $_GET['id'];
        $enteredPassword = $_GET['enteredPassword'];

        // Retrieve the actual password from the database
        $sql = "SELECT password FROM admin WHERE id = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($res)) {
            $storedPassword = $row['password'];

            // Check if entered password matches the stored password
            if ($enteredPassword === $storedPassword) {
                // Proceed to delete the admin
                $sql2 = "DELETE FROM admin WHERE id = ?";
                $stmt2 = mysqli_prepare($conn, $sql2);
                mysqli_stmt_bind_param($stmt2, "i", $id);
                $res2 = mysqli_stmt_execute($stmt2);

                if ($res2) {
                    $_SESSION['delete'] = "<div class='success'>Admin deleted successfully.</div>";
                } else {
                    $_SESSION['delete'] = "<div class='error'>Error deleting admin.</div>";
                }
            } else {
                // Incorrect password
                echo "<script>alert('Incorrect password.'); window.location.href = 'manageAdmin.php';</script>";
                exit();
            }
        } else {
            echo "<script>alert('Admin not found.'); window.location.href = 'manageAdmin.php';</script>";
            exit();
        }

        // Redirect back to manageAdmin.php after deletion or error
        header('location: manageAdmin.php');
    } else {
        $_SESSION['delete'] = "<div class='error'>Invalid request.</div>";
        header('location: manageAdmin.php');
    }
?>
