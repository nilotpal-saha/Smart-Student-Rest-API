<?php

//Connect to the database

$servername = "localhost";
$username = "root";  //username
$password = "";    //password
$dbname = "smart_student";

/*
 * Following code will create a new product row
 * All product details are read from HTTP Post Request
 */

// array for JSON response
$response = array();

// check for required fields
if (isset($_POST['query'])) {

    $query = $_POST['query'];

// Create connection
$db = mysqli_connect($servername, $username, $password, $dbname) or die(mysql_error());
// Check connection
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

    // mysql inserting a new row
    $result = mysqli_query($db,"INSERT INTO forum(query) VALUES('$query')");

    // check if row inserted or not
    if ($result) {
        // successfully inserted into database
        $response["success"] = 1;
        $response["message"] = "Query successfully updated.";

        // echoing JSON response
        echo json_encode($response);
    } else {
        // failed to insert row
        $response["success"] = 0;
        $response["message"] = "Oops! An error occurred.";

        // echoing JSON response
        echo json_encode($response);
    }
} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";

    // echoing JSON response
    echo json_encode($response);
}
?>
