<?php
$con = new mysqli("localhost", "xamppwala", "Forxampp@42", "dbms_mini");

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM tlb_user WHERE id=$id";
    if (mysqli_query($con, $sql)) {
        echo "<script>";
        echo "alert('Record Deletd Sucessfully');";
        echo "</script>";
        ?>

<script>
        // Redirect to another page after 5 seconds
        setTimeout(function() {
            window.location.href = "view.php";
        }, 1000); // 5000 milliseconds = 5 seconds
    </script>
</body>
<?php
    } else {
        echo "<script>";
        echo "alert('Fail to delee recoirf');";
        echo "</script>";    }
}

mysqli_close($con);
?>
