<?php
/**
 * Include this to connect. Change the dbname to match your database,
 * and make sure your login information is correct after you upload 
 * to csunix or your app will stop working.
 * 
 * Sam Scott, McMaster University, 2025
 */
try {
    $dbh = new PDO(
        "mysql:host=localhost;dbname=zhengq42_db",
        "zhengq42_local",
        "7CnN},Uj"
    );
} catch (Exception $e) {
    die("ERROR: Couldn't connect. {$e->getMessage()}");
}
