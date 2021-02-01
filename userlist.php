<?php
require_once("config.php");
$query = "SELECT * FROM userlist WHERE id=$_GET[id]";
$usr = mysqli_query($dbcnx, $query);
if(!$usr) {
    exit("Klaida".mysqli_error($dbcnx));
}
while($user = mysqli_fetch_array($usr)) {
    echo "<p>Vartotojo vardas - $user[name]</p>";
    if(!empty($user['email'])){
        echo "<p>email - $user[email]</p>";
    }
    if(!empty($user['url'])) {
        echo "<p class='mb-3'>url - $user[url]</p>";
    }
}
?>