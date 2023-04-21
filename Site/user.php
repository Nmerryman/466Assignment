<html>
<head>
	<title> Hi </title>
</head>
<body>
    <h5>Welcome User!</h5>
    <label for="query_text">Query</label>
    <input name="query_text" id="input_text">
    <input type="button" value="Run" onclick="user_query()">
    <br>
    <span id="text"></span>

    <br>
    <label for="username">User ID</label>
    <input id="username">
    <br>
    <label for="queue_id">Song ID</label>
    <input type="number" id="queue_id">
    <label for="queue_money">Payment</label>
    <input type="number" value="0" step="0.01" min="0" id="queue_money">
    <input type="button" value="send" onclick="add_to_queue()">
    <span id="send_status"></span> 

    <script src="utils.js"></script>
    <script>
        fetcher("basic_query", "text");

        function user_query() {
            name = document.getElementById("input_text").value;
            if (name != "") {
                fetcher("user_query_name", "text", [name]);
            } else {
                fetcher("basic_query", "text");
            }
        }

        input_area = document.getElementById("input_text").addEventListener(
            "keypress", function (e) {
                if (e.key === "Enter") {
                    user_query();
                }
            }
        );

        function add_to_queue() {
            id = document.getElementById("queue_id").value;
            val = document.getElementById("queue_money").value;
            user_name = document.getElementById("username").value;
            if (id != "") {
                fetcher("user_send_queue", "send_status", [id, val, user_name]);
            }
        }
    </script>
</body>
</html>
