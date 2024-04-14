<?php 
include('header.php'); 
if(isset($_SESSION['addrequest'])) //Checking whether the SEssion is Set of Not
{
    echo $_SESSION['addrequest']; //Display the SEssion Message if SEt
    unset($_SESSION['addrequest']); //Remove Session Message
}
?>
<div class="main-content">
    <div class="container">
        <h1>Request a leave</h1>
        <form action="" method="POST">
            <textarea name="description" cols="30" rows="5" placeholder="Reason for leave."></textarea>
            <input type="hidden" name="uid" value="<?php echo $userId; ?>">
            <input type="text" name="date" placeholder="Date" required>
            <input type="submit" name="submit" class="btn btn-danger" value="Request">
        </form>
    </div>
</div>
<?php 

//CHeck whether the button is clicked or not
if(isset($_POST['submit'])) {
    //Add the Leave request to the Database
    //1. Get the Data from Form
    $description = $_POST['description'];
    $uid = $_POST['uid'];
    $date = $_POST['date'];

    //2. Insert Into Database

    // Create a SQL Query to Save the leave request
    $sqlleave2 = "INSERT INTO tbl_leave (uid, reason, date) VALUES ('$uid', '$description', '$date')";

    // Execute the Query
    $resleave2 = mysqli_query($conn, $sqlleave2);

    // Check whether data inserted or not
    //3. Redirect with Message to the appropriate page
    if($resleave2) {
        //Data inserted successfully
        $_SESSION['addrequest'] = "<div class='success'><div class='container'>Request has been sent for approval.</div></div>";
    } else {
        //Failed to Insert Data
        $_SESSION['addrequest'] = "<div class='error'><div class='container'>Failed to send request.</div></div>";
    }
}


?>