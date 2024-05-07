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
    <?php 
    
    $con = new mysqli("localhost", "xamppwala", "Forxampp@42", "dbms_mini");
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
$id = $_GET['id'];
$sql = "SELECT * FROM tlb_user WHERE id=$id";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
extract($row);
//print_r($row);
?>

<div class="container">
    <h2>Hospital Patient Details</h2>
    <form action="#" method="POST">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $name; ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $email; ?>" required>
        </div>
        <div class="form-group">
            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="dob" min="2000-01-01" max="2024-04-26" value="<?php echo $dob; ?>" required>
        </div>
        <div class="form-group">
            <label for="gender">Gender:</label>
            <select id="gender" name="gender" required>
                <option value="">Select</option>
                <option value="male"<?php
                if($gender=="male"){
                echo "selected";}
                ?>>Male</option>
                <option value="female" <?php
                if($gender=="female"){
                echo "selected";}
                ?>>Female</option>
                <option value="other">Other</option>
            </select>
        </div>
        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone" value="<?php echo $mob_no; ?>" required>
        </div>
        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" rows="3" value="<?php echo $address; ?>" required></textarea>
        </div>
        <div class="form-group">
            <label for="symptoms">Symptoms:</label>
            <input type="text" id="symptoms" name="symptoms" rows="3"  value="<?php echo $symptoms; ?>"required></textarea>
        </div>
        <div class="form-group"><center>
        <input type="Submit" name="btn_submit" value="Update Data">

        </center>
        </div>

    </form>

</div>
</body>
</html>

<?php


if(isset($_POST['btn_submit'])){  
  //  print_r($_POST);
    extract($_POST);
    $sql = "UPDATE `tlb_user` SET `name` = '$name', `email` = '$email', 
    `dob` = '$dob', `gender` = '$gender', `mob_no` = '$phone', `address` = '$address',
     `symptoms` = '$symptoms' WHERE `tlb_user`.`id` = $id";
    if(mysqli_query($con,$sql)){
        echo "<script>";
        echo "alert('Record Updated Sucessfully');";
        echo "</script>";
        ?>

<script>
        setTimeout(function() {
            window.location.href = "view.php";
        }, 1000);
    </script>
<?php
    }else{
       echo "Record Not update"; }

}

$con->close();
?>
