<?php
include("connection.php");
$cid = $_GET["cid"];
$result = mysqli_query($con, "select * from sub_category where cid=$cid") or die(mysqli_error($con));
while ($row = mysqli_fetch_row($result)) {
    echo "<option value='$row[0]'>$row[2]</option>";
}
?>