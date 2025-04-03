<!--
-->
<!DOCTYPE html>
<html>
<?php
include "php/connect.php";

$name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_STRING);
?>

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/wumpus.css">
</head>

<body>
</body>

</html>