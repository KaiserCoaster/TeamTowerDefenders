<?php

include_once("../src/Config.php");
include_once("../src/DB.php");
include_once("../src/Game.php");
include_once("../src/Player.php");

$joined = false;

$username = $_GET['username'];
$roomCode = $_GET['roomCode'];

$p = Player::create($username, 0);
$g = Game::joinGame($roomCode, $p);
if($g) {
    $joined = true;
}
echo json_encode(array("joined"=>$joined));