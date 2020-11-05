<?php
require_once('conn.php');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT e_id, e_name, e_email FROM employees";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        
    }
} else {
    echo "0 results";
}
