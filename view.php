<button><a href="index.php">Back to Form
</a></button>

<table border="1">
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Date of Birth</th>
    <th>Gender</th>
    <th>Mobile Number</th>
    <th>Address</th>
    <th>Symptoms</th>
    <th>Opertions</th>
</tr>
<?php

$con = new mysqli("localhost", "xamppwala", "Forxampp@42", "dbms_mini");

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
$sql = "SELECT * FROM `tlb_user`";
$result = mysqli_query($con,$sql);
    if($result){
    }else{
        echo "Error in fetching";
    }

    while($data = mysqli_fetch_assoc($result)){
        //print_r($data);
        extract($data);
?>
<tr>
<td><?php echo $id; ?></td>
<td><?php echo $name; ?></td>
<td><?php echo $email; ?></td>
<td><?php echo $dob; ?></td>
<td><?php echo $gender; ?></td>
<td><?php echo $mob_no; ?></td>
<td><?php echo $address; ?></td>
<td><?php echo $symptoms; ?></td>
<td>
<a href='update.php?id=<?php echo $id; ?>'>Update</a> 
    
    |<a href='delete.php?id=<?php echo $id; ?>'>Delete</a> 
    
    </td>
</tr>

<?php
    }    
    //print_r($_POST);
    extract($_POST);
$con->close();
?>
</table>