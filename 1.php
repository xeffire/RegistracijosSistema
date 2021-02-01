<?php session_start();?>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="css.css">
</head>
<body>
    <form method="POST">
    <label class="form-label">Vardas:</label>
    <input class="form-control" type="text" name="name" value="<?= @$_SESSION['name']?>">
    <label class="form-label">Slaptazodis:</label>
    <input class="form-control" type="text" name="password" value="<?= @$_SESSION['password']?>">
    <button class="btn btn-primary my-5">Siusti</button>
    </form>
</body>
<?php

if(!empty($_POST['name']) && !empty($_POST['password'])) {
    require_once("config.php");

    // if(!get_magic_quotes_gpc()) {
    //     $_POST['name'] = mysql_escape_string($_POST['name']);
    //     $_POST['password'] = mysql_escape_string($_POST['password']);
    // }

    $query = "SELECT COUNT(*) FROM userlist WHERE name='$_POST[name]' AND pass='$_POST[password]'";
    $usr = mysqli_query($dbcnx, $query);
    if(!$usr) {
        exit("Klaida autorizacijoje");
    }

    $total = count(mysqli_fetch_all($usr));

    if(@$total > 0) {
        $_SESSION['name'] = $_POST['name'];
        $_SESSION['password'] = $_POST['password'];
    }

    if(isset($_SESSION['name'])) {
        require_once("config.php");

        echo 
        "<p>Labas, $_SESSION[name]!</p>
        <p>Prieiga prie Jusu slaptu duomenu</p>";

        $query = "SELECT * FROM userlist WHERE name='$_SESSION[name]'";
        $usr = mysqli_query($dbcnx, $query);
        if(!$usr) {
            exit("Klaida");
        }
        $user = mysqli_fetch_array($usr);
        echo "<p>Jusu el. pastas: $user[email]</p>
        <p>Jusu URL: $user[url]</p>";
    }

}

?>

<!-- if(!empty($_POST)) {
    require_once("config.php");
    
    $query = "SELECT id FROM userlist WHERE name='$_POST[name]' AND pass='$_POST[password]'";
    
    $usr = mysqli_query($dbcnx, $query);
    if(!$usr){
        exit("DB klaida");
    }
    $user = mysqli_fetch_array($usr);
    if(count($user) > 0) {
        setcookie("user", urlencode($_POST['name']), time() + 3600*24);
        echo
        "<html><head>
        <meta http-equiv='Refresh' content='0;URL=$_SERVER[PHP_SELF]'>
        </head></html>";
    }
} -->
<!-- ?> -->

<!-- //  else {
//     $arr = file($filename);
//     $i = 0;
//     $temp = array();
//     foreach($arr as $line) {
//         $data = explode("::", $line);

//         $temp['name'][$i] = $data[0];
//         $temp['password'][$i] = $data[1];
//         $temp['email'][$i] = $data[2];
//         $temp['url'][$i] = $data[3];
//         $i++;
//     }
    
//     if(!in_array($_POST['name'], $temp['name'])) {
//         exit("Vartotojo su tokiu vardu nera");
//     }
    
//     $index = array_search($_POST['name'], $temp['name']);
//     if($_POST['password'] != $temp['password'][$index]) {
//         exit("Slaptazodis neatitinka vardo");
//     }
    -->
<?php
// if(!) {
//     require_once("config.php");
    
//     $query = "SELECT * FROM userlist WHERE name='$_COOKIE[user]'";
    
//     $usr = mysqli_query($dbcnx, $query);
//     if(!$usr){
//         exit("DB klaida");
//     }
//     $user = mysqli_fetch_array($usr); 
//     echo 
//     "<p>Labas, $_COOKIE[user]</p> 
//     <p>Prieiga prie jusu slaptu duomenu</p>
//     <p>Jusu el pastas: $user[email]</p>
//     <p>Jusu URL: $user[url]</p>";
// }

?>