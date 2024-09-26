<?php
include('connection.php'); 

if (isset($_GET['id']) && is_numeric($_GET['id']) && isset($_GET['category'])) {
    $id = $_GET['id'];
    $category = $_GET['category']; 

    // Initialize the success and error messages
    $successMessage = '';
    $errorMessage = '';

    switch ($category) {
        case 'frozen':
            // Delete from 'frozen' table
            $sql1 = "DELETE FROM frozen WHERE id=$id";
            $res1 = mysqli_query($conn, $sql1);

            if ($res1) {
                // Delete from 'frozendetails'
                $sql2 = "DELETE FROM frozendetails WHERE id=$id";
                $res2 = mysqli_query($conn, $sql2);

                // Delete from 'newtable'
                $sql3 = "DELETE FROM newtable WHERE id=$id";
                $res3 = mysqli_query($conn, $sql3);

                if ($res2 && $res3) {
                    $successMessage = "<div class='success'>Item Deleted Successfully from Frozen Category.</div>";
                } else {
                    $errorMessage = "<div class='error'>Failed to Delete Item from Frozen Details or New Table. Try Again Later.</div>";
                }
            } else {
                $errorMessage = "<div class='error'>Failed to Delete Item from Frozen Category. Try Again Later.</div>";
            }
            break;

        case 'nutritional':
            // Delete from 'nutrition' table
            $sql1 = "DELETE FROM nutritional WHERE id=$id";
            $res1 = mysqli_query($conn, $sql1);

            if ($res1) {
                // Delete from 'nutritionaldetails'
                $sql2 = "DELETE FROM nutritionaldetails WHERE id=$id";
                $res2 = mysqli_query($conn, $sql2);

                // Delete from 'newtable2'
                $sql3 = "DELETE FROM newtable2 WHERE id=$id";
                $res3 = mysqli_query($conn, $sql3);

                if ($res2 && $res3) {
                    $successMessage = "<div class='success'>Item Deleted Successfully from Nutrition Category.</div>";
                } else {
                    $errorMessage = "<div class='error'>Failed to Delete Item from Nutritional Details or New Table 2. Try Again Later.</div>";
                }
            } else {
                $errorMessage = "<div class='error'>Failed to Delete Item from Nutrition Category. Try Again Later.</div>";
            }
            break;

        case 'organic':
            // Delete from 'organic' table
            $sql1 = "DELETE FROM organic WHERE id=$id";
            $res1 = mysqli_query($conn, $sql1);

            if ($res1) {
                // Delete from 'organicdetails'
                $sql2 = "DELETE FROM organicdetails WHERE id=$id";
                $res2 = mysqli_query($conn, $sql2);

                // Delete from 'newtable3'
                $sql3 = "DELETE FROM newtable3 WHERE id=$id";
                $res3 = mysqli_query($conn, $sql3);

                if ($res2 && $res3) {
                    $successMessage = "<div class='success'>Item Deleted Successfully from Organic Category.</div>";
                } else {
                    $errorMessage = "<div class='error'>Failed to Delete Item from Organic Details or New Table 3. Try Again Later.</div>";
                }
            } else {
                $errorMessage = "<div class='error'>Failed to Delete Item from Organic Category. Try Again Later.</div>";
            }
            break;

        default:
            $errorMessage = "<div class='error'>Invalid Category Provided.</div>";
            break;
    }

    if ($successMessage) {
        $_SESSION['delete'] = $successMessage;
    } else {
        $_SESSION['delete'] = $errorMessage;
    }

    header('Location: delete_food.php'); 
    exit();
} else {
    $_SESSION['delete'] = "<div class='error'>Invalid ID or category provided.</div>";
    header('Location: delete_food.php');
    exit();
}
?>
