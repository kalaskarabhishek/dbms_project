<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Hospital Patient Details Form</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }
    .container {
        max-width: 800px;
        margin: 50px auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }
    h2 {
        margin-top: 0;
    }
    .form-group {
        margin-bottom: 15px;
    }
    label {
        display: block;
        margin-bottom: 5px;
    }
    input[type="text"], input[type="email"], select, textarea {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 3px;
    }
    input[type="submit"] {
        background-color: #4caf50;
        color: #fff;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        border-radius: 3px;
    } input[type="button"] {
        background-color: #4188fa;
        color: #fff;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        border-radius: 3px;
    }

    }
    input[type="submit"]:hover {
        background-color: #45a049;
    }
</style>
</head>
<body>
<div class="container">
    <h2>Hospital Patient Details</h2>
    <form action="#" method="POST">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="dob" min="2000-01-01" max="2024-04-26" required>
        </div>
        <div class="form-group">
            <label for="gender">Gender:</label>
            <select id="gender" name="gender" required>
                <option value="">Select</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>
        </div>
        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone" required>
        </div>
        <div class="form-group">
            <label for="address">Address:</label>
            <textarea id="address" name="address" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label for="symptoms">Symptoms:</label>
            <textarea id="symptoms" name="symptoms" rows="3" required></textarea>
        </div>
        <div class="form-group"><center>
        <input type="Submit" name="btn_submit" value="Submit">
        <a href="view.php">
            <input type="button" value="Show Record">
        </a>
        </center>
        </div>

    </form>

</div>
</body>
</html>

<?php

$con = new mysqli("localhost", "xamppwala", "Forxampp@42", "dbms_mini");

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
if(isset($_POST['btn_submit'])){
    // echo "Button is click";    
    //print_r($_POST);
    extract($_POST);
    $sql = "INSERT INTO `tlb_user` (`id`, `name`, `email`, `dob`, `gender`, `mob_no`, `address`, `symptoms`) 
    VALUES (NULL, '$name', '$email', '$dob', '$gender', '$phone', '$address', '$symptoms')";
    if(mysqli_query($con,$sql)){
        echo "<script>";
        echo "alert('Reored Insert Sucessfully');";
        echo "</script>";
        }else{
            echo "<script>";
            echo "alert('Not Submited or Email and Moile no Aldready Taken ');";
            echo "</script>";    }
}

$con->close();
?>
 