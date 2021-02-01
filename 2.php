<?php

if(isset($_COOKIE['user'])) {
    echo "prieiga prie jusu slaptu duomenu";
} else {
    echo
    "<html><head>
    <meta http-equiv='Refresh' content='0;URL=$_SERVER[PHP_SELF]'>
    </head></html>";
}
// if(!defined('FIRST')) {
//     exit();
// }

// if(isset($_POST['edit'])) {
//     $_POST['name'] = trim($_POST['name']);
//     $_POST['password'] = trim($_POST['password']);
//     $_POST['repeat'] = trim($_POST['repeat']);

//     if(empty($_POST['name'])) {
//         exit();
//     }
//     if(empty($_POST['password']) || empty($_POST['repeat'])) {
//         exit("Vienas is slaptazodzio lauku neuzpildytas");
//     }
//     if($_POST['password'] != $_POST['repeat']) {
//         exit("Slaptazodziai nesutampa");
//     }
    
//     $arr = file($filename);
//     $linefile = array();
//     foreach($arr as $line) {
//         $data = explode("::", $line);
//         if($data[0] == $temp['name'][$index]) {
//             $linefile[] = "$_POST[name]::$_POST[password]::$_POST[email]::$_POST[url]";
//             $temp['password'][$index] = $_POST['password'];
//             $temp['email'][$index] = $_POST['email'];
//             $temp['url'][$index] = $_POST['url'];
//         } else {
//             $linefile[] = trim($line);
//         }
//     }

//     $fd = fopen($filename, "w");
//     if(!$fd) {
//         exit("Ivyko klalida, irasant i faila");
//     }

//     fwrite($fd, implode("\r\n", $linefile));
//     fclose($fd);
// }
// ?>