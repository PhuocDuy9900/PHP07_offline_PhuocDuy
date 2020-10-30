<?php require_once('conn.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP SQL</title>
</head>

<body>
    <form action="#" method="POST">
        <table>
            <tr>
                <td>Name:</td>
                <td><input type="text" name="e_name" placeholder="Enter your name"></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input type="text" name="e_email" placeholder="Enter your email"></td>
            </tr>
            <tr>
                <td>Phone :</td>
                <td><input type="text" name="e_phone" placeholder="Enter your phone"></td>
            </tr>
            <tr>
                <td><input type="submit" name="e_add" value="Submit"></td>
            </tr>
        </table>
    </form>
<?php
if(isset($_POST['e_add'])) {
    $e_name  = $_POST['e_name'];
    $e_email = $_POST['e_email'];
    $e_phone = $_POST['e_phone'];
    
    $sql     = "INSERT INTO employees (e_name, e_email, e_phone) VALUES ('$e_name', '$e_email', '$e_phone')";
    
    if(mysqli_query($conn,$sql)) {
        echo "<script>alert('New record created successful');</script>";
    }
}
?>
</body>

</html>