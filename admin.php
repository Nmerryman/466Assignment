<!DOCTYPE html>
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
        <input type="button" name="Clear" onclick="clearing()" value="do">
    </form>
    <span id="text"></span>

<script>
    function rebuild() {
        var xhttp = new XMLHttpRequest;
        xhttp.open("GET", "executor.php?rebuild=true");
        document.getElementById("text").innerText = "Working";
        xhttp.onload = function() {
            document.getElementById("text").innerHTML = xhttp.responseText;
            console.log(xhttp.responseText);
        }
        xhttp.send();
    }

    function clearing() {
        var xhttp = new XMLHttpRequest;
        xhttp.open("GET", "executor.php?clear=true");
        document.getElementById("text").innerText = "Working";
        xhttp.onload = function() {
            document.getElementById("text").innerHTML = xhttp.responseText;
            console.log(xhttp.responseText);
        }
        xhttp.send();
        // console.log("clearing");
        
    }
</script>
</body>
</html>
