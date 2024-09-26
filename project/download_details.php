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
    echo "No data found for ID: " . htmlspecialchars($id);
    exit;
}

// Create CSV file
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="order_details_' . $id . '.csv"');

// Output CSV
$output = fopen('php://output', 'w');

// Column headers without the Status section
fputcsv($output, [
    'Order Date',
    'Customer First Name',
    'Customer Last Name',
    'Contact Number',
    'Email',
    'Address',
    'Country',
    'Enquiry'
]);

// Data without the Status section
fputcsv($output, [
    $data['date'],
    $data['fname'],
    $data['sname'],
    $data['contact'],
    $data['email'],
    $data['address'],
    $data['country'],
    $data['enquiry']
]);

// Close output
fclose($output);
exit;
?>
