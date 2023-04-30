<?php
// Loads the database and creates the pdo object
include("cred.php"); 
$host = "courses";
$dsn = "mysql:host=$host;dbname=$dbname";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try {
    $pdo = new PDO($dsn, $name, $pass, $options);
} catch (PDOException $e) {
    die("        <p>Connection to database failed: ${$e->getMessage()}</p>\n");
}

function print_table($arr) {
    // Turns a passed query into a html table
    // Assumes content is there

    echo "<table><tr>";
    foreach(array_keys($arr[0]) as $headings) {
        echo "<th>$headings</th>";
    }
    echo "</tr>";

    foreach($arr as $row) {
        echo "<tr class=\"item\">";
        foreach($row as $col) {
            echo "<td>$col</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}

function print_sortable_table($arr, $chosen_id="") {
    // Turns a passed query into a html table
    // Assumes content is there

    if ($chosen_id == "") {
        $chosen_id = "t" + uniqid();
    }
    echo "<table id=\"$chosen_id\" class=\"sortable\"><tr>";
    foreach(array_keys($arr[0]) as $headings) {
        echo "<th>$headings</th>";
    }
    echo "</tr>";
    
    foreach($arr as $y => $row) {
        echo "<tr class=\"item\">";
        $x = 0;
        foreach($row as $col) {
            echo "<td class=\"row$y col$x\">$col</td>";
            $x++;
        }
        echo "</tr>";
    }
    echo "</table>";
    echo "<script> var newTableObject = document.getElementById(\"$chosen_id\");sorttable.makeSortable(newTableObject);</script>";
}

function print_selectable_table($arr, $chosen_id="") {
    // Turns a passed query into a html table
    // Assumes content is there

    if ($chosen_id == "") {
        $chosen_id = "t" . uniqid();
    }
    echo "<table id=\"$chosen_id\" class=\"sortable\"><tr>";
    foreach(array_keys($arr[0]) as $headings) {
        echo "<th>$headings</th>";
    }
    echo "</tr>";
    
    foreach($arr as $y => $row) {
        echo "<tr class=\"item\">";
        $x = 0;
        foreach($row as $col) {
            echo "<td class=\"row$y col$x\" onclick=\"select_t_row('$chosen_id', $y)\">$col</td>";
            $x++;
        }
        echo "</tr>";
    }
    echo "</table>";
    echo "<script> var newTableObject = document.getElementById(\"$chosen_id\");sorttable.makeSortable(newTableObject);selected = [\"$chosen_id\", -1];</script>";
}
?>