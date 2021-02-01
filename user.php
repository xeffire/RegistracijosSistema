<?php
require_once("config.php");
$query = "SELECT * FROM userlist ORDER BY name";
$usr = mysqli_query($dbcnx, $query);
if(!$usr) {
    exit("Klaida".mysqli_error($dbcnx));
}
while($user = mysqli_fetch_array($usr)) {
    echo "<a class='d-block' href='userlist.php?id=$user[id]'>$user[name]</a>";
}
?>