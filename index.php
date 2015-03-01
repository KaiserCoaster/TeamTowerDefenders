<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Team Tower Defenders</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <link href="css/style.css" type="text/css">
</head>
<body>

    <div id="join-game" class="game-window">
        <h1>Join a Game</h1>
        <div>
            <input type="text" id="username" placeholder="Username" />
            <br />
            <input type="number" id="digit1" size="1" />
            <input type="number" id="digit2" size="1" />
            <input type="number" id="digit3" size="1" />
            <input type="number" id="digit4" size="1" />
        </div>
        <div>
            <input type="submit" id="join" value="Join" />
        </div>
    </div>
    
    <div id="game" class="game-window">
        <div id="battlefield"></div>
    </div>
    
</body>
</html>