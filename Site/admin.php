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

    <script src="utils.js"></script>
    <script>
        function rebuild() {
            fetcher("rebuild", "text");
        }
    
        function clearing() {
            fetcher("clear", "text");
            
        }
    </script>
</body>
</html>
