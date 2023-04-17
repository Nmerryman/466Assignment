<html>
<head>
	<title> Hi </title>
</head>
<body>
    <h5>Welcome Admin!</h5>
    <form>
        <label for="Struct">Rebuild structure</label>
        <input type="button" name="Struct" onclick="rebuild()" value="do">
        <label for="Clear">Clear queue info</label>
        <input type="button" name="Clear" onclick="clear()" value="do">
    </form>
    <span id="text"></span>

<script>
    function rebuild() {
        var xhttp = new XMLHttpRequest;
        xhttp.open("GET", "admin.php?do=rebuild");
        xhttp.send();
        while (xhttp.readyState != 4) {
            document.getElementById("text").innerText = "Working";
        }
        document.getElementById("text").innerText = "Done";
    }

    function rebuild() {
        var xhttp = new XMLHttpRequest;
        xhttp.open("GET", "admin.php?do=clear");
        xhttp.send();
        while (xhttp.readyState != 4) {
            document.getElementById("text").innerText = "Working";
        }
        document.getElementById("text").innerText = "Done";
        
    }

</script>
<?php
if (isset($_GET["do"])){
    include("helpers.php");
    if ($_GET["do"] == "rebuild") {
        try {
            $file = file_get_contents("SQL Create Table Script.sql");
            $pdo->exec($file);
        } catch (Exception $e) {
            echo "<h1>$e</h1>";
        }
    } else if ($_GET["do"] == "clear") {
        try {
            $file = file_get_contents(".sql");
            $pdo->exec($file);
        } catch (Exception $e) {
            echo "<h1>$e</h1>";
        }
    }
}
?>
</body>
</html>
