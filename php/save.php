<!--
-->
<!DOCTYPE html>
<html>
<?php
include "php/connect.php";

$name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
$password = 
$email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_STRING);
$status = filter_input(INPUT_POST, "has_a_wumpus", FILTER_SANITIZE_NUMBER_INT);
$date = date('Y-m-d');

$existence_check = "SELECT COUNT(*) FROM players WHERE email = ?";
$stmt = $dbh->prepare($existence_check);
$email_exists = [$email];
$stmt->execute($email_exists);
$exists = $stmt->fetchColumn();

if ($exists) {
    $command = "SELECT wins, losses FROM players WHERE email = ?";
    $stmt = $dbh->prepare($command);
    $params = [$email];
    $success = $stmt->execute($params);
    $row = $stmt->fetch();
    $player_wins = $row['wins'];
    $player_losses = $row['losses'];

    if ($status == 1) {
        $wins = $player_wins + 1;
        $losses = $player_losses;
    } else {
        $wins = $player_wins;
        $losses = $player_losses + 1;
    }

    $command = "UPDATE players SET wins=?, losses=?, last_played=? WHERE email=?";
    $stmt = $dbh->prepare($command);
    $params = [$wins, $losses, $date, $email];
    $success = $stmt->execute($params);
} else {
    if ($name !== null && $email !== null) {
        $command = "INSERT INTO players (email, name, wins, losses, last_played) VALUES (?, ?, ?, ?, ?)";
        $stmt = $dbh->prepare($command);

        if ($status == 1) {
            $wins = 1;
            $losses = 0;
        } else {
            $wins = 0;
            $losses = 1;
        }
        // use the parameters to execute the command
        $args = [$email, $name, $wins, $losses, $date];
        $success = $stmt->execute($args);
    }
}
?>

<head>
    <title>Hunt the Wumpus</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/wumpus.css">
</head>

<body>
    <div id="container">
        <h1>Hunt the Wumpus!</h1>
        <?php
        $command = "SELECT name, wins, losses FROM players WHERE email=?";
        $stmt = $dbh->prepare($command);
        $args = [$email];
        $sucess = $stmt->execute($args);
        $row = $stmt->fetch();
        echo "<div id=\"message\"> <p>Your attempt has been recorded.</p><p>Thanks for playing $row[name]! Your score to date: $row[wins] wins and $row[losses] losses.</p></div>";

        ?>
        <p><strong>Leaderboard:</strong></p>
        <div id="leaderboard">
            <?php
            $command = "SELECT name, wins, losses, last_played FROM players WHERE wins>0 ORDER BY wins DESC";
            $stmt = $dbh->prepare($command);
            $success = $stmt->execute();
            $counter = 0;
            while ($row = $stmt->fetch()) {
                if ($counter >= 10) break;
                echo "<p><strong>$row[name]:</strong> $row[wins] wins | $row[losses] losses | Last played: $row[last_played]</p>";
                $counter++;
            }
            ?>
        </div>
        <br>
        <a href="index.php">Play Again</a>
    </div>
</body>

</html>