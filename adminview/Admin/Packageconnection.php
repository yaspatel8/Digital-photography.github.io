<!DOCTYPE html>
<html>
 
<head>
    <title>Insert page</title>
</head>
 
<body>
    <center>
        <?php
 
        // servername => localhost
        // username => root
        // password => empty
        // database name => staff
        $conn = mysqli_connect("localhost", "root", "", "pdf");
         
        // Check connection
        if($conn === false){
            die("ERROR: Could not connect. "
                . mysqli_connect_error());
        }
         
        // Taking all 5 values from the form data(input)
        $first_name =  $_REQUEST['first_name'];
        $last_name = $_REQUEST['last_name'];
        $address =  $_REQUEST['address'];
        $phonenumber = $_REQUEST['phonenumber'];
        $email = $_REQUEST['email'];
         
        // Performing insert query execution
        // here our table name is college
        $sql = "INSERT INTO bbm VALUES ('$first_name', 
            '$last_name','$address','$phonenumber','$email')";
         
        if(mysqli_query($conn, $sql)){
            echo "<h3>data stored in a database successfully."
                . " Please browse your localhost php my admin"
                . " to view the updated data</h3>"; 
 
            echo nl2br("\n$first_name\n $last_name\n "
                . "$address\n $phonenumber\n $email");
        } else{
            echo "ERROR: Hush! Sorry $sql. "
                . mysqli_error($conn);
        }
         
        // Close connection
        mysqli_close($conn);
        header('location:packagedisplay.php');
        ?>
    </center>
</body>
 
</html>