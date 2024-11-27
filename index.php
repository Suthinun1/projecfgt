<?php
session_start();
if (!isset($_SESSION['sess_id'])) {
    header('Location: checklog.php'); 
    exit();
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าแรก</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="my-div">
        <?php 
            if (isset($_REQUEST['p'])) {
                include $_REQUEST['p'] . ".php";
            } else {
                include "dashboard.php";
            }
        ?>
        </div>
</body>
</html>
