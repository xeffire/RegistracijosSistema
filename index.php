<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="css.css">
</head>
<body>
    <form method="POST">
    <label class="form-label">Vardas</label>
    <input type="text" name="name" class="form-control">
    <label class="form-label">Pass</label>
    <input type="password" name="password" class="form-control">
    <label class="form-label">Repeat</label>
    <input type="password" name="repeat" class="form-control">
    <label class="form-label">El Pastas</label>
    <input type="email" name="email" class="form-control">
    <label class="form-label">URL</label>
    <input type="text" name="url" class="form-control">
    <button class="btn btn-primary my-5">Registruotis</button>
    </form>

    <?php
    if(!empty($_POST['name'])) {
        $_POST['name'] = trim($_POST['name']);
    }
    if(!empty($_POST['password'])) {
        $_POST['password'] = trim($_POST['password']);
    }
    if(!empty($_POST['repeat'])) {
        $_POST['repeat'] = trim($_POST['repeat']);
    }

    if(empty($_POST['name'])) {exit();}

    if(empty($_POST['name']) || empty($_POST['password']) || empty($_POST['repeat'])) {
        exit("Ne visi privalomi laukai yra uzpildyti");
    }

    if($_POST['password'] != $_POST['repeat']) {
        exit("Slaptazodziai nesutampa");
    }

    require_once("config.php");

    $query = "SELECT COUNT(*) FROM userlist WHERE name='$_POST[name]'";
    $usr = mysqli_query($dbcnx, $query);
    if(!$usr) {
        exit("Klaida - ".mysqli_error($dbcnx));
    }
    $total = mysqli_fetch_array($usr);
    if($total[0] > 0) {
        exit("Sis vardas jau buvo uzregistruotas".$usr);
    }

    $query = "INSERT INTO userlist VALUES (NULL, '$_POST[name]', '$_POST[password]', '$_POST[email]', '$_POST[url]')";
    if(mysqli_query($dbcnx, $query)) {
        echo
        "<html><head>
        <meta http-equiv='Refresh' content='0;URL=$_SERVER[PHP_SELF]'>
        </head></html>";
    } else {
        exit("Klaida paildant duomenis - ".mysql_error());
    }




    // $filename = "text.txt";
    // $arr = file($fielname);
    // foreach($arr as $line) {
    //     $data = explode("::", $line);
    //     $temp[] = $data[0];
    // }
    // if(in_array($_POST['name'], $temp)) {
    //     exit("Vartotojo vardas jau egzistuoja");
    // }

    // $fd = fopen($filename, "a");
    // if(!$fd)
    //     exit("Failo atidarymo klaida");
    // $str = "$_POST[name]::$_POST[password]::$_POST[email]::$_POST[url]\r\n";
    // fwrite($fd, $str);
    // fclose($fd);

    // echo 
    // "<html>
    //     <head>
    //     <meta HTTP-EQUIV='Refresh' CONTENT='0;URL=$_SERVER[PHP_SELF]'>
    //     </head>
    // </html>";

    ?>
</body>
</html> 
