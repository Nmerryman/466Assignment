<html>
<head>
	<title> Hi </title>
</head>
<body>
    <h5>Welcome User!</h5>
    <label for="query_text">Query</label>
    <input name="query_text" id=input_text>
    <input type="button" value="Run" onclick="user_query()">
    <br>
    <span id="text"></span>

    <script src="utils.js"></script>
    <script>
        fetcher("basic_query", "text");

        function user_query() {
            name = document.getElementById("input_text").value;
            if (name != "") {
                fetcher("user_query_name", "text", name);
            } else {
                fetcher("basic_query", "text");
            }
        }
    </script>
</body>
</html>
