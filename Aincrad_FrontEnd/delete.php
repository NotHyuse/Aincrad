<?php
session_start();
include("connect.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['selected_ids'])) {
    $selected_ids = $_POST['selected_ids'];

    // Sanitize input to prevent SQL injection
    $ids = array_map('intval', $selected_ids);
    $ids_list = implode(',', $ids);

    // Delete query
    $query = "DELETE FROM Customer WHERE Customer_ID_PK IN ($ids_list)";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $_SESSION['message'] = 'Selected accounts deleted successfully.';
    } else {
        $_SESSION['error'] = 'Failed to delete selected accounts: ' . mysqli_error($conn);
    }
}

// Redirect back to the main page
header('Location: delete_ui.php');
?>
