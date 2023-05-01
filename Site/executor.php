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
        $statement = $pdo->prepare("SELECT s.SongID AS \"Song ID\", s.Title AS \"Song Name\", s.BandName as \"Artist Name\", GROUP_CONCAT(CONCAT(c.Name, ' (', sc.Role, ')') SEPARATOR '<br>') AS Contributors
        FROM Songs s
        LEFT JOIN SongContributors sc ON s.SongID = sc.SongID
        LEFT JOIN Contributors c ON sc.ContributorID = c.ContributorID
        GROUP BY s.SongID;");
        $statement->execute();
        print_selectable_table($statement->fetchAll());
    } catch (Exception $e) {
        echo "<h1>$e</h1>";
    }
} else if (isset($_GET["user_query_name"])) {  // Search by a name of some sort
    $name = $_GET["arg0"];
    try {
        $soft = "%$name%";
        $statement = $pdo->prepare("SELECT s.SongID AS \"Song ID\", s.Title AS \"Song Name\", s.BandName AS \"Artist Name\", GROUP_CONCAT(CONCAT(c.Name, ' (', sc.Role, ')') SEPARATOR '<br>') AS Contributors
        FROM Songs s
        JOIN SongContributors sc ON s.SongID = sc.SongID
        JOIN Contributors c ON sc.ContributorID = c.ContributorID
        WHERE LOWER(s.Title) like ? or LOWER(s.BANDName) like ? or LOWER(c.Name) like ?
        GROUP BY s.SongID;");
        $statement->execute([$soft, $soft, $soft]);
        $values = $statement->fetchAll();
        if (!empty($values)) {
            print_selectable_table($values);
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
        $statement = $pdo->prepare("INSERT INTO RequestQueue (VersionID, UserID, Time, AmountPaid, Played, QueueType) VALUES (?, ?, ?, ?, 0, ?);");
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
        $statement = $pdo->prepare("SELECT r.RequestID as 'Request ID', s.Title as 'Song Name', s.BandName as 'Artist Name, u.Name as 'Requested by, r.Time as 'Request Time' FROM RequestQueue r
        JOIN SongVersions sv on sv.VersionID = r.VersionID
        JOIN Songs s on s.SongID = sv.SongID
        JOIN Users u on u.UserID = r.UserID
        WHERE r.QueueType = \"free\"
        ORDER BY r.RequestID;");
        $statement->execute();
        $values = $statement->fetchAll();
        if (!empty($values)) {
            print_selectable_table($values, "t" . uniqid(), "true");
        } else {
            echo "<h3>No songs in the free queue.<h3>";
        }
    } catch (Exception $e) {
        echo "<h1>$e</h1>";
    }
} else if (isset($_GET["paid_queue"])) {  // Print all songs in the priority queue
    try {
        $statement = $pdo->prepare("SELECT r.RequestID as 'Request ID', s.Title as 'Song Name', s.BandName as 'Artist Name, u.Name as 'Requested by, r.Time as 'Request Time', r.AmountPaid as 'Amount Paid' FROM RequestQueue r
        JOIN SongVersions sv on sv.VersionID = r.VersionID
        JOIN Songs s on s.SongID = sv.SongID
        JOIN Users u on u.UserID = r.UserID
        WHERE r.QueueType = \"priority\"
        ORDER BY r.RequestID;");
        $statement->execute();
        $values = $statement->fetchAll();
        if (!empty($values)) {
            print_selectable_table($values, "t" . uniqid(), "true");
        } else {
            echo "<h3>No songs in the priority queue.<h3>";
        }
    } catch (Exception $e) {
        echo "<h1>$e</h1>";
    }
} else if (isset($_GET["request_id"])) {
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
} else if (isset($_GET["get_playing"])) {
    try {
        $statement = $pdo->prepare("SELECT r.RequestID as 'Request ID', s.Title as 'Song Name', s.BandName as 'Artist Name, u.Name as 'Requested by, r.Time as 'Request Time', r.AmountPaid as 'Amount Paid' FROM RequestQueue r
        JOIN SongVersions sv on sv.VersionID = r.VersionID
        JOIN Songs s on s.SongID = sv.SongID
        JOIN Users u on u.UserID = r.UserID
        WHERE r.QueueType = \"playing\"
        ORDER BY r.RequestID;");
        $statement->execute();
        
        $now_playing = $statement->fetchAll();
        if (!empty($now_playing)) {
            print_table($now_playing);
        } else {
            echo "<h2>No song playing</h2>";
        }
    } catch (Exception $e) {
        echo "<h1>$e</h1>";
    }
} else if (isset($_GET["user_login_options"])) {
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
} else if (isset($_GET["basic_error"])) {
    try {
        $val = $_GET['arg0'];
        echo "Error: $val";
    } catch (Exception $e) {
        echo "<h1>$e</h1>";
    }
} else if (isset($_GET["get_song_versions"])) {
    try {
        // Fixme injection possible
        $id = $_GET["arg0"];
        $statement = $pdo->prepare("SELECT VersionID, Description, FileName
        FROM SongVersions
        WHERE \"$id\" = SongID;");
        $statement->execute();
        
        $now_playing = $statement->fetchAll();
        if (!empty($now_playing)) {
            print_selectable_table($now_playing);
            echo "<label for=\"queue_money\">Payment</label>
            <input type=\"number\" value=\"0\" step=\"0.01\" min=\"0\" id=\"queue_money\">
            <input type=\"button\" value=\"send\" onclick=\"add_to_queue()\">
            <div id=\"send_status\"></div> ";
        } else {
            echo "<h2>No files found!->$id</h2>";
        }
    } catch (Exception $e) {
        echo "<h1>$e</h1>";
    }
}
?>