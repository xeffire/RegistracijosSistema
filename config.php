<?php

$dbcnx = mysqli_connect("localhost", "goislt", "bhfjuHWfzG", "goislt_goislt");
if(!$dbcnx) {
    exit("DB serveris nepasiekiamas: ".mysqli_error($dbcnx));
}

// if(!@mysqli_select_db("goislt_goislt", $dbcnx)) {
//     exit("DB nepasiekiamas: ".mysqli_error($dbcnx));
// }

?>