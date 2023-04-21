<?php
include("helpers.php");
if (isset($_GET["rebuild"])){
    try {
        $file = file_get_contents("../SQL Scripts/SQL Create Table Script.sql");
        $pdo->exec($file);
        echo "<h2>Done!</h2>";
    } catch (Exception $e) {
        echo "<h1>$e</h1>";
    }

} else if (isset($_GET["clear"])) {
    try {
        $statement = $pdo->prepare("Delete from RequestQueue");
        $statement->execute();
        echo "<h2>Cleared!</h2>";
    } catch (Exception $e) {
        echo "<h1>$e</h1>";
    }

} else if (isset($_GET["insert_song_info"])) {
    try {
        $file = file_get_contents("../SQL Scripts/Add Data.sql");
        $pdo->exec($file);
        $file = file_get_contents("../SQL Scripts/add scdata.sql");
        $pdo->exec($file);
        echo "<h2>Done!</h2>";
    } catch (Exception $e) {
        echo "<h1>$e</h1>";
    }

} else if (isset($_GET["basic_query"])) {
    try {
        $statement = $pdo->prepare("SELECT s.Title, s.BandName, GROUP_CONCAT(c.Name SEPARATOR ', ') AS Contributors
        FROM Songs s
        LEFT JOIN SongContributors sc ON s.SongID = sc.SongID
        LEFT JOIN Contributors c ON sc.ContributorID = c.ContributorID
        GROUP BY s.SongID;");
        $statement->execute();
        print_table($statement->fetchAll());
    } catch (Exception $e) {
        echo "<h1>$e</h1>";
    }
} else if (isset($_GET["user_query_name"])) {
    $name = $_GET["arg0"];
    try {
        $statement = $pdo->prepare("SELECT s.SongID, s.Title, s.BandName, GROUP_CONCAT(c.Name SEPARATOR ', ') AS Contributors
        FROM Songs s
        JOIN SongContributors sc ON s.SongID = sc.SongID
        JOIN Contributors c ON sc.ContributorID = c.ContributorID
        WHERE SOUNDEX(s.Title) = SOUNDEX(\"$name\") or SOUNDEX(s.BANDName) = SOUNDEX(\"$name\") or LOWER(c.Name) like \"%$name%\"
        GROUP BY s.SongID;");
        $statement->execute();
        $values = $statement->fetchAll();
        if (!empty($values)) {
            print_table($values);
        } else {
            echo "<h3>No results for $name found.<h3>";
        }
    } catch (Exception $e) {
        echo "<h1>$e</h1>";
    }
} else if (isset($_GET["user_send_queue"])) {
    $song_id = $_GET["arg0"];
    $val = $_GET["arg1"];
    $username = $_GET["arg2"];
    $time = date('Y-m-d H:i:s');
    if ($val == "") {
        $queue_type = "free";
    } else {
        $queue_type = "priority";
    }
    try {
        $statement = $pdo->prepare("INSERT INTO RequestQueue (SongID, UserID, Time, AmountPaid, Played, QueueType) VALUES (?, ?, ?, ?, 0, ?);");
        $statement->execute([$song_id, $username, $time, $val, $queue_type]);
        $values = $statement->fetchAll();
        echo "<p>Sent to queue</p>";
    } catch (Exception $e) {
        echo "<h1>$e</h1>";
    }
}
?>