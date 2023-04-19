<!DOCTYPE html>
<html>
<head>
        <title>Hi</title>
<style>
                body {
                        font-family: Arial, sans-serif;
                        text-align: center;
                        margin: 0;
                        padding: 0;
                        background-color: #f2f2f2;
                        color: #333;
                        transition: background-color 0.3s ease;
                }

                .container {
                        max-width: 600px;
                        margin: 0 auto;
                        padding: 20px;
                        background-color: #fff;
                        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                        transition: background-color 0.3s ease;
                }

                .button {
                        display: inline-block;
                        padding: 10px 20px;
                        margin: 10px;
                        border-radius: 5px;
                        text-decoration: none;
                        color: #fff;
                        background-color: #007bff;
                        transition: background-color 0.3s ease;
                }

                .button:hover {
                        background-color: #0062cc;
                }

                .switch {
                        position: relative;
                        display: inline-block;
                        width: 60px;
                        height: 34px;
                        margin: 10px;
                }

                .switch input {
                        opacity: 0;
                        width: 0;
                        height: 0;
                }

                .slider {
                        position: absolute;
                        cursor: pointer;
                        top: 0;
                        left: 0;
                        right: 0;
                        bottom: 0;
                        background-color: #ccc;
                        transition: 0.3s;
                }

                .slider:before {
                        position: absolute;
                        content: "";
                        height: 26px;
                        width: 26px;
                        left: 4px;
                        bottom: 4px;
                        background-color: white;
                        transition: 0.3s;
                }

                input:checked + .slider {
                        background-color: #2196F3;
                }

                input:focus + .slider {
                        box-shadow: 0 0 1px #2196F3;
 		}

                input:checked + .slider:before {
                        transform: translateX(26px);
                }

                .dark-mode {
                        background-color: #333;
                        color: #fff;
                }

                .dark-mode .container {
                        background-color: #444;
                }

                .dark-mode .button {
                        background-color: #333;
                }

                .dark-mode .button:hover {
                        background-color: #222;
                }

                .dark-mode .slider {
                        background-color: #999;
                }

                .dark-mode input:checked + .slider {
                        background-color: #7abcf9;
                }

                .dark-mode input:focus + .slider {
                        box-shadow: 0 0 1px #7abcf9;
                }

                .dark-mode input:checked + .slider:before {
                        background-color: #333;
                }
        </style>
</head>
<body>
        <div class="container">
                <a class="button" href="Site/user.php">I'm a user</a>
                <a class="button" href="Site/dj.php">I'm a dj</a>
                <br>
                <a class="button" href="Site/admin.php">I'm an admin</a>
                <button class="button dark" onclick="toggleDarkMode()">Dark Mode</button>
        </div>

        <script>
                function toggleDarkMode() {
                        document.body.classList.toggle('dark-mode');
                }
        </script>
</body>
</html>

