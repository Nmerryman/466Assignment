<!-- Connect to database + setup -->
<?php
include("cred.php"); 
$host = "courses";
$dbname = "z1963771";
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
    // Assumes content is there

    echo "<table><tr>";
    foreach(array_keys($arr[0]) as $headings) {
        echo "<td><strong>$headings</strong></td>";
    }
    echo "</tr>";
    
    foreach($arr as $row) {
        echo "<tr>";
        foreach($row as $col) {
            echo "<td>$col</td>";
        }
        echo "</tr>";
    }
    echo "</table>";

}
?>