<?php
include("helpers.php");
if (isset($_GET["rebuild"])){
    try {
        $file = file_get_contents("SQL Create Table Script.sql");
        $pdo->exec($file);
        echo "<h2>Done!</h2>";
    } catch (Exception $e) {
        echo "<h1>$e</h1>";
    }
} else if (isset($_GET["clear"])) {
    try {
        $statement = $pdo->prepare("Delete from * from Requests");
        $pdo->exec($file);
        echo "<h2>Cleared!</h2>";
    } catch (Exception $e) {
        echo "<h1>$e</h1>";
    }
    }
?>