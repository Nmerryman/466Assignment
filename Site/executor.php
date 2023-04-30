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
        $statement = $pdo->prepare("SELECT s.SongID, s.Title, s.BandName as \"Band Name\", GROUP_CONCAT(CONCAT(c.Name, ' (', sc.Role, ')') SEPARATOR '<br>') AS Contributors
        FROM Songs s
        LEFT JOIN SongContributors sc ON s.SongID = sc.SongID
        LEFT JOIN Contributors c ON sc.ContributorID = c.ContributorID
        GROUP BY s.SongID;");
        $statement->execute();
        print_sortable_table($statement->fetchAll());
    } catch (Exception $e) {
        echo "<h1>$e</h1>";
    }
} else if (isset($_GET["user_query_name"])) {  // Search by a name of some sort
    $name = $_GET["arg0"];
    try {
        $soft = "%$name%";
        $statement = $pdo->prepare("SELECT s.SongID, s.Title, s.BandName AS \"Band Name\", GROUP_CONCAT(CONCAT(c.Name, ' (', sc.Role, ')') SEPARATOR '<br>') AS Contributors
        FROM Songs s
        JOIN SongContributors sc ON s.SongID = sc.SongID
        JOIN Contributors c ON sc.ContributorID = c.ContributorID
        WHERE LOWER(s.Title) like ? or LOWER(s.BANDName) like ? or LOWER(c.Name) like ?
        GROUP BY s.SongID;");
        $statement->execute([$soft, $soft, $soft]);
        $values = $statement->fetchAll();
        if (!empty($values)) {
            print_sortable_table($values);
        } else {
            echo "<h3>No results for $name found.<h3>";
        }
    } catch (Exception $e) {
        echo "<h1>$e</h1>";
    }
} else if (isset($_GET["user_send_queue"])) {  // Send a song to the request queue
    $song_id = $_GET["arg0"];
    $val = $_GET["arg1"];
    $uid = $_GET["arg2"];
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
        $statement->execute([$song_id, $uid, $time, $val, $queue_type]);
        $values = $statement->fetchAll();
        echo "<p>Sent to queue</p>";
    } catch (Exception $e) {
        echo "<h1>$e</h1>";
    }
} else if (isset($_GET["alert"])) {  // Javascript test execution
    echo "<h2>text</h2><script>alert(1);</script>";
} else if (isset($_GET["free_queue"])) {  // Print all songs in the free queue
    try {
        $statement = $pdo->prepare("SELECT RequestQueue.RequestID, Songs.Title, Songs.BandName, Users.Name AS RequestedBy, RequestQueue.Time
        FROM RequestQueue
        INNER JOIN Songs ON RequestQueue.SongID = Songs.SongID
        INNER JOIN Users ON RequestQueue.UserID = Users.UserID
        WHERE RequestQueue.QueueType = 'free'
        ORDER BY RequestQueue.RequestID;");
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
        $statement = $pdo->prepare("SELECT RequestQueue.RequestID, Songs.Title, Songs.BandName, Users.Name AS RequestedBy, RequestQueue.AmountPaid, RequestQueue.Time
        FROM RequestQueue
        INNER JOIN Songs ON RequestQueue.SongID = Songs.SongID
        INNER JOIN Users ON RequestQueue.UserID = Users.UserID
        WHERE RequestQueue.QueueType = 'priority'
        ORDER BY RequestID;");
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
        $statement = $pdo->prepare("SELECT RequestQueue.RequestID, Songs.Title, Songs.BandName, Users.Name AS RequestedBy, RequestQueue.AmountPaid, RequestQueue.Time
        FROM RequestQueue
        INNER JOIN Songs ON RequestQueue.SongID = Songs.SongID
        INNER JOIN Users ON RequestQueue.UserID = Users.UserID
        WHERE RequestQueue.QueueType = 'playing'
        ORDER BY RequestID;");
        $statement->execute();
        
        echo "<h3>Playing Song</h3>";
        $now_playing = $statement->fetchAll();
        if (!empty($now_playing)) {
            print_table($now_playing);
        } else {
            echo "<h2>No song playing</h2>";
        }
    } catch (Exception $e) {
        echo "<h1>$e</h1>";
    }
} else if (isset($_GET["user_login_options"])) {  // Print all songs in the priority queue
    try {
        $statement = $pdo->prepare("SELECT UserID, Name FROM Users");
        $statement->execute();
        
        $data = $statement->fetchAll();
        if (!empty($data)) {
            echo "<select id=\"user_select\">";
            foreach($data as $part) {
                $id = $part["UserID"];
                $name = $part["Name"];
                echo "<option value=\"$id\">$name</option>";
            }
            echo "</select>";
        } else {
            echo "<h2>No Users found</h2>";
        }
    } catch (Exception $e) {
        echo "<h1>$e</h1>";
    }
} else if (isset($_GET["basic_error"])) {  // Print all songs in the priority queue
    try {
        $val = $_GET['arg0'];
        echo "Error: $val";
    } catch (Exception $e) {
        echo "<h1>$e</h1>";
    }
}
?>