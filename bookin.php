<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

// Check if Confirm button is clicked and booking number and user ID are provided
if (isset($_POST['confirm_button']) && isset($_POST['booking_number'])) {
    // Assuming you have sanitized and validated the input
 

    // Update the status in the tblbooking table
    $sql = "UPDATE tblbooking SET Status = 1 WHERE BookingNumber = $bookingNumber";

    if ($con->query($sql) === TRUE) {
        echo "Status updated successfully";
    } else {
        echo "Error updating status: " . $conn->error;
    }

    // Redirect back to the same page
    header("Location: $_SERVER[PHP_SELF]");
    exit();
}

?>