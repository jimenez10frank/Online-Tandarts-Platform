<?php
if (isset($_SERVER['HTTP_X_SESSION_ID'])) {
    session_id($_SERVER['HTTP_X_SESSION_ID']);
}
session_start();


//vertraging van 5 seconden en dan doorsturen naar securedPage.php
header("refresh:5;url=securedPage.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Loading...</title>
    <style>
        body {
            background-color: #f1f1f1;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: Arial, sans-serif;
        }
        .loading {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .loading h1 {
            font-size: 24px;
            margin-bottom: 10px;
        }
        .loading p {
            font-size: 16px;
            margin-bottom: 10px;
        }
        .loading img {
            width: 100px;
            height: 100px;
        }
    </style>'
</head>
<body>
    <div class="loading">
        <h1>Loading...</h1>
        <p>Even geduld aub</p>
        <img src="https://media.giphy.com/media/3oEjI6SIIHBdRxXI40/giphy.gif" alt="Loading...">
    </div>

</body>
</html>