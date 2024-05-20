<?php
if (isset($_POST['countryId'])) {
    $countryId = $_POST['countryId'];

    // Assuming you have a 'tblstate' table with columns 'ID', 'StateName', and 'CountryID'
    $query = mysqli_query($con, "SELECT * FROM tblstate WHERE CountryID = $countryId");

    $options = "<option value=''>Select State</option>";

    while ($row = mysqli_fetch_array($query)) {
        $options .= "<option value='" . $row['CountryID'] . "'>" . $row['StateName'] . "</option>";
    }

    echo $options;
}
?>
