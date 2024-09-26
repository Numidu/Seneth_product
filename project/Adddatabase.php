<?php
include ('connection.php'); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve and sanitize form data
    $name = $conn->real_escape_string(trim($_POST['fname']));
    $sname = $conn->real_escape_string(trim($_POST['sname']));
    $tel = $conn->real_escape_string(trim($_POST['tel']));
    $email = $conn->real_escape_string(trim($_POST['email']));
    $address = $conn->real_escape_string(trim($_POST['address']));
    $country = $conn->real_escape_string(trim($_POST['country']));
    $enquiry = $conn->real_escape_string(trim($_POST['enquiry']));

    // SQL query to insert data into the database with current date and time
    $sql = "INSERT INTO enquiries (fname, sname, contact, email, address, country, enquiry, date) 
            VALUES ('$name', '$sname', '$tel', '$email', '$address', '$country', '$enquiry', NOW())";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
        alert('New record created successfully');
        window.location.href = '../index.php';
    </script>";
    
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the connection
$conn->close();
?>



