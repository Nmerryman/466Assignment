<?php
include("helpers.php");
if (isset($_GET["rebuild"])){  // admin command to rebuild the whole database
    try {
        $file = file_get_contents("../SQL Scripts/SQL Create Table Script.sql");
        $pdo->exec($file);
        echo "<h2>Done!</h2>";
    } catch (Exception $e) {
        echo "<h1>$e</h1>";
    }

} else if (isset($_GET["clear"])) {  // Clear all queue data
    try {
        $statement = $pdo->prepare("Delete from RequestQueue");
        $statement->execute();
        echo "<h2>Cleared!</h2>";
    } catch (Exception $e) {
        echo "<h1>$e</h1>";
    }

} else if (isset($_GET["insert_song_info"])) {  // Load all session data
    try {
        $file = file_get_contents("../SQL Scripts/Add Data.sql");
        $pdo->exec($file);
        echo "<h2>Done!</h2>";
    } catch (Exception $e) {
        echo "<h1>$e</h1>";
    }

} else if (isset($_GET["basic_query"])) {  // Print all songs in database
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
} else if (isset($_GET["user_query_name"])) {  // Search by a name of some sort
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
} else if (isset($_GET["user_send_queue"])) {  // Send a song to the request queue
    $song_id = $_GET["arg0"];
    $val = $_GET["arg1"];
    $username = $_GET["arg2"];
    $time = date('Y-m-d H:i:s');
    // echo "aoeu";
    // echo $val;
    // echo "aoeu";
    if ($val == "0") {
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
} else if (isset($_GET["alert"])) {  // Javascript test execution
    echo "<h2>text</h2><script>alert(1);</script>";
} else if (isset($_GET["free_queue"])) {  // Print all songs in the free queue
    try {
        $statement = $pdo->prepare("SELECT s.Title, u.Name, r.Time FROM RequestQueue r
        JOIN Songs s on s.SongID = r.SongID
        JOIN Users u on u.UserID = r.UserID
        WHERE r.QueueType = \"free\";");
        $statement->execute();
        $values = $statement->fetchAll();
        if (!empty($values)) {
            print_sortable_table($values);
        } else {
            echo "<h3>No songs in the free queue.<h3>";
        }
    } catch (Exception $e) {
        echo "<h1>$e</h1>";
    }
} else if (isset($_GET["paid_queue"])) {  // Print all songs in the priority queue
    try {
        $statement = $pdo->prepare("SELECT s.Title, u.Name, r.Time, r.AmountPaid FROM RequestQueue r
        JOIN Songs s on s.SongID = r.SongID
        JOIN Users u on u.UserID = r.UserID
        WHERE r.QueueType = \"priority\";");
        $statement->execute();
        $values = $statement->fetchAll();
        if (!empty($values)) {
            print_sortable_table($values);
        } else {
            echo "<h3>No songs in the priority queue.<h3>";
        }
    } catch (Exception $e) {
        echo "<h1>$e</h1>";
    }
} else if (isset($_GET["request_id"])) {  // Print all songs in the priority queue
    try {
        $id = $_GET["arg0"];
        $statement = $pdo->prepare("UPDATE RequestQueue SET QueueType = \"history\", Played=1 where QueueType=\"playing\";");
        $statement->execute();

        $statement = $pdo->prepare("UPDATE RequestQueue set QueueType = \"playing\" where RequestID = ?;");
        $statement->execute([$id]);
        
        echo "<h3>Playing Song</h3>";
    } catch (Exception $e) {
        echo "<h1>$e</h1>";
    }
} else if (isset($_GET["get_playing"])) {  // Print all songs in the priority queue
    try {
        $statement = $pdo->prepare("SELECT s.Title, u.Name, r.Time, r.AmountPaid FROM RequestQueue r
        JOIN Songs s on s.SongID = r.SongID
        JOIN Users u on u.UserID = r.UserID
        WHERE r.QueueType = \"playing\";");
        $statement->execute();
        
        echo "<h3>Playing Song</h3>";
    } catch (Exception $e) {
        echo "<h1>$e</h1>";
    }
}
?>